/**
 * Comportement des charts Flexiwind.
 *
 * Le chart est dessiné par Blade ; ce fichier ajoute ce que le HTML seul ne
 * peut pas faire. Sur tous les charts en barres, lignes ou aires :
 *
 *  - l'infobulle : un seul panneau par chart, rempli au survol à partir du
 *    tableau de données (celui des lecteurs d'écran). Le DOM ne grossit pas
 *    avec le nombre de catégories ;
 *  - le toucher : taper une catégorie affiche son infobulle.
 *
 * Et sur les charts marqués `interactive` :
 *
 *  - le clavier : flèches, Début, Fin, Échap, avec annonce vocale ;
 *  - la légende cliquable : masquer ou afficher une série ;
 *  - l'export CSV : `data-chart-export` sur n'importe quel bouton ;
 *  - la sélection d'une plage (`brush`) : glisser, ou Maj + flèches puis
 *    Entrée. Le chart émet `chart-range` avec { start, end, from, to } ;
 *    un double-clic émet la même chose à null, pour revenir en arrière.
 *
 * Tout passe par des écouteurs délégués sur le document : rien à
 * initialiser par chart, et un chart remplacé par Livewire fonctionne
 * aussitôt.
 */

const CHART = '[data-slot="chart"]';
const INTERACTIVE = "[data-chart-interactive]";
const LAYER = '[data-slot="chart-tooltip"]';
const BRUSH = "[data-chart-brush]";

let started = false;

/** Glisser en cours : { chart, anchor, current, pointerId, moved }. */
let drag = null;

/** Le calque survolé par la souris, pour le refermer en sortant. */
let hovered = null;

/** Branche les écouteurs une seule fois, quel que soit le nombre d'appels. */
export function initChartInteractions(root = document) {
    if (started) {
        return;
    }

    started = true;
    root.addEventListener("keydown", onKeydown);
    root.addEventListener("pointerdown", onPointerDown);
    root.addEventListener("pointermove", onPointerMove);
    root.addEventListener("pointerup", onPointerUp);
    root.addEventListener("pointercancel", () => (drag = null));
    root.addEventListener("pointerout", onPointerOut);
    root.addEventListener("focusout", onFocusOut);
    root.addEventListener("click", onClick);
    root.addEventListener("dblclick", onDoubleClick);
}

/** Forme plugin Alpine, comme les autres plugins Flexiwind. */
export function ChartPlugin() {
    initChartInteractions();
}

// ------------------------------------------------------------- géométrie

/** Ce que Blade a écrit sur le calque : même calcul que ChartHelper. */
function geometry(layer) {
    return {
        count: Number(layer.dataset.count) || 0,
        point: layer.dataset.layout === "point",
        horizontal: layer.hasAttribute("data-horizontal"),
        min: Number(layer.dataset.scaleMin),
        max: Number(layer.dataset.scaleMax),
    };
}

/** Centre d'une catégorie, en % (ChartHelper::x). */
function center(index, { count, point }) {
    if (point) {
        return count <= 1 ? 50 : (index / (count - 1)) * 100;
    }

    return ((index + 0.5) / Math.max(1, count)) * 100;
}

/** La tranche d'une catégorie, en % (ChartHelper::slot). */
function slot(index, g) {
    if (g.point && g.count > 1) {
        const width = 100 / (g.count - 1);
        const left = Math.max(0, center(index, g) - width / 2);
        const right = Math.min(100, center(index, g) + width / 2);

        return { left, width: right - left };
    }

    const width = 100 / Math.max(1, g.count);

    return { left: index * width, width };
}

/** Position d'une valeur sur l'axe des valeurs, en % depuis le bas ou la gauche. */
const along = (value, { min, max }) => ((value - min) / (max - min || 1)) * 100;

/** La catégorie sous le pointeur ; au-delà des bords, la première ou la dernière. */
function indexAt(layer, x, y) {
    const g = geometry(layer);
    const rect = layer.getBoundingClientRect();
    const size = g.horizontal ? rect.height : rect.width;
    const ratio = Math.min(1, Math.max(0, ((g.horizontal ? y - rect.top : x - rect.left) / (size || 1))));

    if (g.point && g.count > 1) {
        return Math.round(ratio * (g.count - 1));
    }

    return Math.min(g.count - 1, Math.floor(ratio * g.count));
}

// -------------------------------------------------------------- infobulle

const layerOf = (chart) => chart?.querySelector(LAYER) ?? null;

const rowsOf = (chart) => [...(chart?.querySelector("table")?.tBodies[0]?.rows ?? [])];

const countOf = (chart) => {
    const layer = layerOf(chart);

    return layer ? geometry(layer).count : 0;
};

/** Le libellé d'une catégorie, lu dans le tableau de données. */
const categoryOf = (chart, index) => rowsOf(chart)[index]?.cells[0]?.textContent.trim() ?? null;

/**
 * Affiche l'infobulle de la catégorie `index`, ou la ferme (null). Les
 * valeurs viennent du tableau de données, déjà mises en forme par Blade ;
 * textContent seulement : rien n'est interprété comme du HTML.
 */
function show(layer, index) {
    const chart = layer.closest(CHART);
    const row = index === null ? null : rowsOf(chart)[index];

    if (!row) {
        layer.removeAttribute("data-open");
        delete layer.dataset.index;

        return;
    }

    if (layer.dataset.index === String(index)) {
        return;
    }

    const g = geometry(layer);
    const zone = slot(index, g);
    const middle = center(index, g);
    const cells = [...row.cells].slice(1);
    const raw = cells.map((cell) => (cell.dataset.value === "" ? null : Number(cell.dataset.value)));

    layer.dataset.index = String(index);

    const panel = layer.querySelector("[data-chart-panel]");
    panel.querySelector("[data-chart-title]").textContent = row.cells[0].textContent.trim();
    panel.querySelectorAll("li").forEach((item, i) => {
        item.querySelector("[data-chart-value]").textContent = cells[i]?.textContent.trim() ?? "";
    });

    const cursor = layer.querySelector("[data-chart-cursor]");

    if (cursor && g.point) {
        cursor.style.left = `${middle}%`;
    } else if (cursor) {
        // Le fond de la catégorie, en retrait de 6 % de chaque côté.
        cursor.style[g.horizontal ? "top" : "left"] = `${zone.left + zone.width * 0.06}%`;
        cursor.style[g.horizontal ? "height" : "width"] = `${zone.width * 0.88}%`;
    }

    layer.querySelectorAll("[data-chart-dot]").forEach((dot, i) => {
        dot.hidden = raw[i] === null || raw[i] === undefined;
        dot.style.left = `${middle}%`;
        dot.style.top = `${100 - along(raw[i] ?? 0, g)}%`;
    });

    panel.style.left = panel.style.right = panel.style.top = "";

    if (g.horizontal) {
        // Au bout de la plus longue barre, ou à sa gauche si elle est trop longue.
        const reach = Math.max(0, ...raw.filter((value) => value !== null).map((value) => along(value, g)));

        panel.style.top = `${middle}%`;
        panel.style[reach < 60 ? "left" : "right"] = reach < 60 ? `calc(${reach}% + 12px)` : `calc(${100 - reach}% + 12px)`;
    } else if (index < g.count / 2) {
        panel.style.left = `calc(${middle}% + 12px)`;
    } else {
        panel.style.right = `calc(${100 - middle}% + 12px)`;
    }

    layer.setAttribute("data-open", "");
}

// ---------------------------------------------------------------- état

const activeIndex = (chart) => {
    const value = chart.dataset.chartActive;

    return value === undefined || value === "" ? null : Number(value);
};

/** La catégorie choisie au clavier ou au toucher ; elle reste affichée. */
function setActive(chart, index) {
    chart.dataset.chartActive = index === null ? "" : String(index);

    const layer = layerOf(chart);

    if (layer) {
        show(layer, index);
    }

    const live = chart.querySelector("[data-chart-live]");

    if (live) {
        const panel = index === null ? null : layer?.querySelector("[data-chart-panel]");

        live.textContent = panel ? readable(panel) : "";
    }
}

/** Le texte du panneau, sans les séries masquées, sur une ligne. */
function readable(panel) {
    const title = panel.querySelector("[data-chart-title]")?.textContent.trim() ?? "";
    const rows = [...panel.querySelectorAll("li")]
        .filter((row) => row.style.display !== "none")
        .map((row) => row.textContent.replace(/\s+/g, " ").trim());

    return [title, ...rows].join(". ");
}

// ------------------------------------------------------------ événements

function onKeydown(event) {
    const chart = event.target.closest?.(INTERACTIVE);

    // Seulement quand le chart lui-même a le focus : pas les boutons de légende.
    if (!chart || event.target !== chart) {
        return;
    }

    const count = countOf(chart);
    const current = activeIndex(chart);

    if (count === 0) {
        return;
    }

    const moves = {
        ArrowRight: 1,
        ArrowDown: 1,
        ArrowLeft: -1,
        ArrowUp: -1,
    };

    const brush = chart.matches(BRUSH);

    if (brush && event.key === "Enter" && chart.dataset.chartSelection) {
        event.preventDefault();
        const [low, high] = chart.dataset.chartSelection.split(":").map(Number);
        commit(chart, low, high);

        return;
    }

    if (brush && event.key === "Escape" && chart.dataset.chartSelection) {
        event.preventDefault();
        select(chart, null);

        return;
    }

    let next;

    if (event.key in moves) {
        next = current === null ? 0 : Math.min(count - 1, Math.max(0, current + moves[event.key]));
    } else if (event.key === "Home") {
        next = 0;
    } else if (event.key === "End") {
        next = count - 1;
    } else if (event.key === "Escape" && current !== null) {
        next = null;
    } else {
        return;
    }

    event.preventDefault();

    if (brush && event.shiftKey && event.key in moves) {
        chart.dataset.chartAnchor ??= String(current ?? 0);
        select(chart, Number(chart.dataset.chartAnchor), next);
    } else if (event.key in moves || event.key === "Home" || event.key === "End") {
        delete chart.dataset.chartAnchor;
    }

    setActive(chart, next);
}

function onPointerDown(event) {
    const layer = event.target.closest?.(LAYER) ?? null;
    const brushed = layer?.closest(BRUSH);

    if (brushed && (event.pointerType !== "mouse" || event.button === 0)) {
        const index = indexAt(layer, event.clientX, event.clientY);

        drag = { chart: brushed, anchor: index, current: index, pointerId: event.pointerId, moved: false };

        if (event.pointerType === "mouse") {
            // Pas de sélection de texte pendant le glisser.
            event.preventDefault();
        }
    }

    // La souris a le survol : on ne gère ici que le doigt et le stylet.
    if (event.pointerType === "mouse") {
        return;
    }

    const touched = layer?.closest(CHART) ?? null;

    document.querySelectorAll(CHART).forEach((chart) => {
        if (chart !== touched && activeIndex(chart) !== null) {
            setActive(chart, null);
        }
    });

    if (touched) {
        setActive(touched, indexAt(layer, event.clientX, event.clientY));
    }
}

function onPointerMove(event) {
    if (drag && event.pointerId === drag.pointerId) {
        const index = indexAt(layerOf(drag.chart), event.clientX, event.clientY);

        if (index !== drag.current) {
            drag.current = index;
            drag.moved = true;
            select(drag.chart, drag.anchor, index);
        }
    }

    if (event.pointerType !== "mouse") {
        return;
    }

    const layer = event.target.closest?.(LAYER) ?? null;

    if (hovered && hovered !== layer) {
        leave();
    }

    if (layer) {
        hovered = layer;
        show(layer, indexAt(layer, event.clientX, event.clientY));
    }
}

function onPointerOut(event) {
    if (hovered && event.pointerType === "mouse" && !hovered.contains(event.relatedTarget)) {
        leave();
    }
}

/** La souris quitte le chart : on revient à la catégorie du clavier, s'il y en a une. */
function leave() {
    const chart = hovered.closest(CHART);

    show(hovered, chart ? activeIndex(chart) : null);
    hovered = null;
}

function onPointerUp(event) {
    if (!drag || event.pointerId !== drag.pointerId) {
        return;
    }

    const { chart, anchor, current, moved } = drag;

    drag = null;

    // Un simple clic n'est pas une sélection : il faut au moins deux catégories.
    if (moved && anchor !== current) {
        commit(chart, Math.min(anchor, current), Math.max(anchor, current));
    }
}

function onDoubleClick(event) {
    const chart = event.target.closest?.(LAYER)?.closest(BRUSH);

    if (!chart) {
        return;
    }

    select(chart, null);
    chart.dispatchEvent(
        new CustomEvent("chart-range", {
            bubbles: true,
            detail: { start: null, end: null, from: null, to: null },
        }),
    );
}

/** Dessine la sélection de `from` à `to` (dans un sens ou l'autre), ou l'efface. */
function select(chart, from, to = from) {
    const overlay = chart.querySelector("[data-chart-brush-overlay]");

    if (!overlay) {
        return;
    }

    if (from === null) {
        overlay.hidden = true;
        delete chart.dataset.chartSelection;
        delete chart.dataset.chartAnchor;

        return;
    }

    const g = geometry(layerOf(chart));
    const low = Math.min(from, to);
    const high = Math.max(from, to);
    const start = slot(low, g).left;
    const end = slot(high, g).left + slot(high, g).width;

    overlay.style[g.horizontal ? "top" : "left"] = `${start}%`;
    overlay.style[g.horizontal ? "height" : "width"] = `${end - start}%`;
    overlay.hidden = false;
    chart.dataset.chartSelection = `${low}:${high}`;
}

/** Émet `chart-range` : un composant Livewire ou Alpine l'écoute pour zoomer. */
function commit(chart, start, end) {
    const detail = { start, end, from: categoryOf(chart, start), to: categoryOf(chart, end) };
    const live = chart.querySelector("[data-chart-live]");

    if (live) {
        live.textContent = `Selected ${detail.from} to ${detail.to}.`;
    }

    chart.dispatchEvent(new CustomEvent("chart-range", { bubbles: true, detail }));
}

function onFocusOut(event) {
    const chart = event.target.closest?.(INTERACTIVE);

    if (chart && event.target === chart && !chart.contains(event.relatedTarget)) {
        setActive(chart, null);
    }
}

function onClick(event) {
    const toggle = event.target.closest?.("[data-chart-toggle]");

    if (toggle) {
        const chart = toggle.closest(INTERACTIVE);

        if (chart) {
            toggleSeries(chart, toggle);
        }

        return;
    }

    const exporter = event.target.closest?.("[data-chart-export]");

    if (exporter) {
        exportCsv(exporter);
    }
}

function toggleSeries(chart, button) {
    const key = button.dataset.chartToggle;
    const visible = button.getAttribute("aria-pressed") !== "false";
    const shown = chart.querySelectorAll('[data-chart-toggle][aria-pressed="true"]');

    // Toujours au moins une série visible : un chart vide n'apprend rien.
    if (visible && shown.length <= 1) {
        return;
    }

    button.setAttribute("aria-pressed", String(!visible));

    chart.querySelectorAll(`[data-series="${CSS.escape(key)}"]`).forEach((element) => {
        element.style.display = visible ? "none" : "";
    });

    chart.querySelectorAll('[data-slot="chart-bars"][data-stacked]').forEach(restack);
}

/**
 * Recolle les piles après avoir masqué une série : sans ça, la série
 * masquée laisserait un trou au milieu de chaque pile. L'échelle ne change
 * pas ; seules les positions des segments visibles sont recalculées, avec
 * la même règle que ChartHelper::bars().
 */
function restack(layer) {
    const min = Number(layer.dataset.scaleMin);
    const max = Number(layer.dataset.scaleMax);
    const radius = Number(layer.dataset.radius || 0);
    const horizontal = layer.hasAttribute("data-horizontal");
    const y = (value) => 100 - ((value - min) / (max - min || 1)) * 100;
    const stacks = new Map();

    layer.querySelectorAll("[data-index]").forEach((bar) => {
        if (bar.style.display === "none") {
            return;
        }

        const index = bar.dataset.index;

        stacks.set(index, [...(stacks.get(index) ?? []), bar]);
    });

    stacks.forEach((bars) => {
        let positive = 0;
        let negative = 0;
        let lastUp = null;
        let lastDown = null;

        bars.forEach((bar) => {
            const value = Number(bar.dataset.value);
            const from = value >= 0 ? positive : negative;
            const to = from + value;

            value >= 0 ? (positive = to) : (negative = to);
            value >= 0 ? (lastUp = bar) : (lastDown = bar);

            const top = y(Math.max(from, to));
            const size = Math.max(0, y(Math.min(from, to)) - top);

            if (horizontal) {
                bar.style.left = `${100 - top - size}%`;
                bar.style.width = `${size}%`;
            } else {
                bar.style.top = `${top}%`;
                bar.style.height = `${size}%`;
            }

            bar.style.borderRadius = "0";
        });

        const round = (bar, up) => {
            if (!bar) {
                return;
            }

            const r = `${radius}px`;

            bar.style.borderRadius = horizontal
                ? (up ? `0 ${r} ${r} 0` : `${r} 0 0 ${r}`)
                : (up ? `${r} ${r} 0 0` : `0 0 ${r} ${r}`);
        };

        round(lastUp, true);
        round(lastDown, false);
    });
}

/**
 * Exporte le tableau de données du chart. Les valeurs sont brutes
 * (`data-value`), pas mises en forme : 1250, pas « 1.3k ».
 */
function exportCsv(trigger) {
    const selector = trigger.dataset.chartExport;
    const chart = selector ? document.querySelector(selector) : trigger.closest('[data-slot="chart"]');
    const table = chart?.querySelector("table");

    if (!table) {
        return;
    }

    const lines = [...table.rows].map((row) =>
        [...row.cells].map((cell) => csvCell(cell.dataset.value ?? cell.textContent.trim())).join(","),
    );

    const blob = new Blob(["﻿" + lines.join("\r\n")], { type: "text/csv;charset=utf-8" });
    const link = document.createElement("a");

    link.href = URL.createObjectURL(blob);
    link.download = trigger.dataset.chartFilename || `${slug(chart.getAttribute("aria-label") || "chart")}.csv`;
    link.click();

    setTimeout(() => URL.revokeObjectURL(link.href), 0);
}

/**
 * Échappe une cellule. Un texte qui commence par =, +, -, @ serait lu
 * comme une formule par un tableur : on le neutralise. Un nombre, lui,
 * passe tel quel.
 */
function csvCell(value) {
    let text = String(value);

    if (/^[=+\-@\t\r]/.test(text) && !/^-?\d+(\.\d+)?$/.test(text)) {
        text = `'${text}`;
    }

    return /[",\r\n]/.test(text) ? `"${text.replace(/"/g, '""')}"` : text;
}

function slug(text) {
    return (
        text
            .toLowerCase()
            .normalize("NFD")
            .replace(/[̀-ͯ]/g, "")
            .replace(/[^a-z0-9]+/g, "-")
            .replace(/^-|-$/g, "") || "chart"
    );
}
