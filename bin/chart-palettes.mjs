#!/usr/bin/env node
/**
 * Palettes de charts des thèmes Flexiwind.
 *
 *   node bin/chart-palettes.mjs                 calcule et écrit --chart-1..5 de chaque thème
 *   node bin/chart-palettes.mjs theme-ocean     un seul thème (nouveau ou modifié)
 *   node bin/chart-palettes.mjs --check         vérifie les palettes enregistrées, n'écrit rien
 *
 * Règle : --chart-1 est la couleur primaire du thème (un chart à une série
 * reste à la marque) ; --chart-2..5 sont des teintes distinctes, prises dans
 * une réserve fixe de huit, jamais de la même famille que la primaire.
 *
 * Une palette n'est retenue que si elle passe, en clair ET en sombre, sur le
 * vrai fond du thème :
 *
 *   - luminance OKLCH dans la bande du mode, chroma >= 0.10 (sinon grisâtre) ;
 *   - séparation daltonisme : ΔE OKLab ×100 >= 8 entre voisines, sous
 *     protanopie et deutéranopie simulées (Machado, Oliveira & Fernandes 2009,
 *     sévérité 1.0) ;
 *   - vision normale : ΔE >= 15 entre voisines ;
 *   - voisines = couleurs consécutives, plus la paire dernière/première
 *     (dans un pie, la dernière part touche la première).
 *
 * Le contraste 3:1 sur le fond est mesuré et minimisé, sans être bloquant :
 * pour une primaire chaude, il ne reste pas assez de teintes contrastées.
 */

import { readdirSync, readFileSync, writeFileSync } from "node:fs";
import { dirname, join } from "node:path";
import { fileURLToPath } from "node:url";

const REGISTRIES = join(dirname(fileURLToPath(import.meta.url)), "..", "registries");

// ---- réserve de teintes : même teinte, pas clair / pas sombre ----------------
const POOL = [
    ["blue", "#2a78d6", "#3987e5"],
    ["orange", "#eb6834", "#d95926"],
    ["aqua", "#1baf7a", "#199e70"],
    ["yellow", "#eda100", "#c98500"],
    ["magenta", "#e87ba4", "#d55181"],
    ["green", "#008300", "#008300"],
    ["violet", "#4a3aa7", "#9085e9"],
    ["red", "#e34948", "#e66767"],
];

const BAND = { light: [0.43, 0.77], dark: [0.48, 0.67] };
const CHROMA_FLOOR = 0.1;
const CVD_TARGET = 8;
const NORMAL_FLOOR = 15;
const CONTRAST_MIN = 3;
const SAME_FAMILY_DEGREES = 35;

// Machado, Oliveira & Fernandes (2009), sévérité 1.0, en RGB linéaire.
const MACHADO = {
    protan: [[0.152286, 1.052583, -0.204868], [0.114503, 0.786281, 0.099216], [-0.003882, -0.048116, 1.051998]],
    deutan: [[0.367322, 0.860646, -0.227968], [0.280085, 0.672501, 0.047413], [-0.01182, 0.04294, 0.968881]],
};

// ---- conversions --------------------------------------------------------------
const toLinear = (c) => (c <= 0.04045 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4);
const toGamma = (c) => {
    c = Math.max(0, Math.min(1, c));
    return c <= 0.0031308 ? 12.92 * c : 1.055 * c ** (1 / 2.4) - 0.055;
};
const hexToRgb = (hex) => [1, 3, 5].map((i) => parseInt(hex.slice(i, i + 2), 16) / 255);
const rgbToHex = (rgb) => "#" + rgb.map((v) => Math.round(Math.max(0, Math.min(1, v)) * 255).toString(16).padStart(2, "0")).join("");
const linear = (hex) => hexToRgb(hex).map(toLinear);

function oklabFromLinear([r, g, b]) {
    const l = Math.cbrt(0.4122214708 * r + 0.5363325363 * g + 0.0514459929 * b);
    const m = Math.cbrt(0.2119034982 * r + 0.6806995451 * g + 0.1073969566 * b);
    const s = Math.cbrt(0.0883024619 * r + 0.2817188376 * g + 0.6299787005 * b);

    return [
        0.2104542553 * l + 0.793617785 * m - 0.0040720468 * s,
        1.9779984951 * l - 2.428592205 * m + 0.4505937099 * s,
        0.0259040371 * l + 0.7827717662 * m - 0.808675766 * s,
    ];
}

function oklch(hex) {
    const [L, a, b] = oklabFromLinear(linear(hex));
    return [L, Math.hypot(a, b), ((Math.atan2(b, a) * 180) / Math.PI + 360) % 360];
}

function oklchToHex(L, C, H) {
    const a = C * Math.cos((H * Math.PI) / 180);
    const b = C * Math.sin((H * Math.PI) / 180);
    const l = (L + 0.3963377774 * a + 0.2158037573 * b) ** 3;
    const m = (L - 0.1055613458 * a - 0.0638541728 * b) ** 3;
    const s = (L - 0.0894841775 * a - 1.291485548 * b) ** 3;

    return rgbToHex([
        toGamma(4.0767416621 * l - 3.3077115913 * m + 0.2309699292 * s),
        toGamma(-1.2684380046 * l + 2.6097574011 * m - 0.3413193965 * s),
        toGamma(-0.0041960863 * l - 0.7034186147 * m + 1.707614701 * s),
    ]);
}

function hslToHex(h, s, l) {
    s /= 100;
    l /= 100;
    const k = (n) => (n + h / 30) % 12;
    const a = s * Math.min(l, 1 - l);
    const f = (n) => l - a * Math.max(-1, Math.min(k(n) - 3, Math.min(9 - k(n), 1)));

    return rgbToHex([f(0), f(8), f(4)]);
}

/** hsl(), oklch() ou #hex, tels qu'écrits dans les thèmes. */
function cssToHex(value) {
    value = value.trim();

    if (/^#[0-9a-f]{6}$/i.test(value)) {
        return value.toLowerCase();
    }

    const numbers = value.replace(/,/g, " ").match(/-?[\d.]+|none/g)?.map((x) => (x === "none" ? 0 : parseFloat(x)));

    if (value.startsWith("hsl") && numbers?.length >= 3) {
        return hslToHex(numbers[0], numbers[1], numbers[2]);
    }

    if (value.startsWith("oklch") && numbers?.length >= 3) {
        const lightness = /^oklch\(\s*[\d.]+%/.test(value) ? numbers[0] / 100 : numbers[0];

        return oklchToHex(lightness, numbers[1], numbers[2]);
    }

    throw new Error(`Unsupported color: ${value}`);
}

// ---- mesures --------------------------------------------------------------------
function simulate(hex, kind) {
    const [r, g, b] = linear(hex);

    return MACHADO[kind].map(([x, y, z]) => Math.max(0, Math.min(1, x * r + y * g + z * b)));
}

function deltaE(a, b, kind = null) {
    const la = oklabFromLinear(kind ? simulate(a, kind) : linear(a));
    const lb = oklabFromLinear(kind ? simulate(b, kind) : linear(b));

    return 100 * Math.hypot(la[0] - lb[0], la[1] - lb[1], la[2] - lb[2]);
}

function luminance(hex) {
    const [r, g, b] = linear(hex);

    return 0.2126 * r + 0.7152 * g + 0.0722 * b;
}

const contrast = (a, b) => {
    const [hi, lo] = [luminance(a), luminance(b)].sort((x, y) => y - x);

    return (hi + 0.05) / (lo + 0.05);
};

/** Mesure une palette ; `ok` est faux dès qu'un contrôle bloquant échoue. */
function measure(palette, mode, surface) {
    const [lo, hi] = BAND[mode];
    const pairs = palette.map((color, i) => [color, palette[(i + 1) % palette.length]]);
    const cvd = Math.min(...pairs.flatMap(([a, b]) => [deltaE(a, b, "protan"), deltaE(a, b, "deutan")]));
    const normal = Math.min(...pairs.map(([a, b]) => deltaE(a, b)));
    const outOfBand = palette.filter((c) => oklch(c)[0] < lo || oklch(c)[0] > hi);
    const grayish = palette.filter((c) => oklch(c)[1] < CHROMA_FLOOR);
    const lowContrast = palette.filter((c) => contrast(c, surface) < CONTRAST_MIN);

    return {
        ok: outOfBand.length === 0 && grayish.length === 0 && cvd >= CVD_TARGET && normal >= NORMAL_FLOOR,
        cvd,
        normal,
        outOfBand,
        grayish,
        lowContrast,
    };
}

/** Ramène une couleur dans la bande du mode, teinte gardée. */
function snap(hex, mode) {
    const [lo, hi] = BAND[mode];
    const [L, C, H] = oklch(hex);

    if (L >= lo && L <= hi && C >= CHROMA_FLOOR) {
        return hex;
    }

    const target = L < lo ? lo + 0.01 : L > hi ? hi - 0.01 : L;

    return oklchToHex(target, Math.max(C, CHROMA_FLOOR + 0.01), H);
}

const hueGap = (a, b) => {
    const d = Math.abs(oklch(a)[2] - oklch(b)[2]) % 360;

    return Math.min(d, 360 - d);
};

function* arrangements(size, count, prefix = []) {
    if (prefix.length === count) {
        yield prefix;

        return;
    }

    for (let i = 0; i < size; i++) {
        if (!prefix.includes(i)) {
            yield* arrangements(size, count, [...prefix, i]);
        }
    }
}

// ---- thèmes -------------------------------------------------------------------
function readTheme(name) {
    const file = join(REGISTRIES, `${name}.json`);
    const theme = JSON.parse(readFileSync(file, "utf8"));

    return { file, theme, light: theme.cssVars.light, dark: theme.cssVars.dark };
}

const surfacesOf = ({ light, dark }) => ({ light: cssToHex(light["--background"]), dark: cssToHex(dark["--background"]) });

/** Cherche la meilleure palette qui passe dans les deux modes. */
function solve(name) {
    const entry = readTheme(name);
    const surfaces = surfacesOf(entry);
    const primary = {
        light: cssToHex(entry.light["--primary"]),
        dark: cssToHex(entry.dark["--primary"] ?? entry.light["--primary"]),
    };
    const first = { light: snap(primary.light, "light"), dark: snap(primary.dark, "dark") };
    const pool = POOL.filter(([, light]) => hueGap(light, first.light) >= SAME_FAMILY_DEGREES);
    let best = null;

    for (const picks of arrangements(pool.length, 4)) {
        const light = [first.light, ...picks.map((i) => pool[i][1])];
        const dark = [first.dark, ...picks.map((i) => pool[i][2])];
        const ml = measure(light, "light", surfaces.light);
        const md = measure(dark, "dark", surfaces.dark);

        if (!ml.ok || !md.ok) {
            continue;
        }

        // Préférence : le moins de couleurs sous 3:1, puis la meilleure marge.
        const rank = [-(ml.lowContrast.length + md.lowContrast.length), Math.min(ml.cvd, md.cvd, 14) + Math.min(ml.normal, md.normal, 30) / 10];

        if (!best || rank[0] > best.rank[0] || (rank[0] === best.rank[0] && rank[1] > best.rank[1])) {
            best = { rank, light, dark, names: picks.map((i) => pool[i][0]), ml, md };
        }
    }

    if (!best) {
        throw new Error(`${name}: no palette passes every check. Try another --primary.`);
    }

    // Slot 1 reste `var(--primary)` tant que la primaire passe telle quelle :
    // changer la primaire du thème recolore alors ses charts.
    const keep = (mode) => first[mode] === primary[mode];

    for (const mode of ["light", "dark"]) {
        best[mode].forEach((color, i) => {
            entry[mode][`--chart-${i + 1}`] = i === 0 && keep(mode) ? "var(--primary)" : color;
        });
    }

    writeFileSync(entry.file, JSON.stringify(entry.theme, null, 4) + "\n");

    return best;
}

/** Vérifie la palette enregistrée d'un thème, sans rien écrire. */
function check(name) {
    const entry = readTheme(name);
    const surfaces = surfacesOf(entry);
    const problems = [];

    for (const mode of ["light", "dark"]) {
        const vars = entry[mode];
        const resolve = (value) => {
            const match = value?.match(/^var\((--[\w-]+)\)$/);

            return cssToHex(match ? vars[match[1]] ?? entry.light[match[1]] : value);
        };

        let palette;

        try {
            palette = [1, 2, 3, 4, 5].map((i) => resolve(vars[`--chart-${i}`]));
        } catch (error) {
            problems.push(`${mode}: ${error.message}`);
            continue;
        }

        const m = measure(palette, mode, surfaces[mode]);

        if (!m.ok) {
            problems.push(
                `${mode}: ` +
                    [
                        m.outOfBand.length && `lightness out of band ${m.outOfBand.join(" ")}`,
                        m.grayish.length && `too gray ${m.grayish.join(" ")}`,
                        m.cvd < CVD_TARGET && `neighbors too close for color blindness (ΔE ${m.cvd.toFixed(1)} < ${CVD_TARGET})`,
                        m.normal < NORMAL_FLOOR && `neighbors too close (ΔE ${m.normal.toFixed(1)} < ${NORMAL_FLOOR})`,
                    ]
                        .filter(Boolean)
                        .join("; "),
            );
        }
    }

    return problems;
}

// ---- entrée -------------------------------------------------------------------
const args = process.argv.slice(2);
const checkOnly = args.includes("--check");
const requested = args.filter((a) => !a.startsWith("--")).map((a) => (a.startsWith("theme-") ? a : `theme-${a}`));
const themes = requested.length
    ? requested
    : readdirSync(REGISTRIES)
          .filter((f) => /^theme-.+\.json$/.test(f))
          .map((f) => f.slice(0, -5))
          .sort();

let failed = false;

for (const name of themes) {
    if (checkOnly) {
        const problems = check(name);
        failed ||= problems.length > 0;
        console.log(problems.length ? `✗ ${name}\n    ${problems.join("\n    ")}` : `✓ ${name}`);
        continue;
    }

    try {
        const best = solve(name);
        console.log(
            `✓ ${name.padEnd(16)} ${best.names.join(", ").padEnd(34)} ΔE daltonisme ${Math.min(best.ml.cvd, best.md.cvd).toFixed(1)} · normal ${Math.min(best.ml.normal, best.md.normal).toFixed(1)}`,
        );
    } catch (error) {
        failed = true;
        console.log(`✗ ${error.message}`);
    }
}

process.exit(failed ? 1 : 0);
