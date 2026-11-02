/**
 * <x-ui.echart> : les charts avancés de Flexiwind, dessinés par Apache ECharts.
 *
 * Le composant Blade écrit un JSON (données, séries, couleurs, format) dans un
 * <script type="application/json">. Cette directive le lit, construit les
 * options ECharts avec les couleurs du thème, et suit :
 *
 *  - le mode sombre : les couleurs sont relues quand la classe de <html> change ;
 *  - Livewire : quand le JSON change, le chart se met à jour sans être recréé ;
 *  - la taille : un ResizeObserver redimensionne le chart avec son conteneur.
 *
 * ECharts lui-même (echarts-core.js) n'est chargé qu'au premier chart, et
 * chaque type de chart dans un fichier à part, à la demande.
 */

/** Le socle ECharts, puis seulement le type, le zoom et le rendu dont ce chart a besoin. */
const loadEcharts = (payload) => import("./echarts-core.js").then((module) => module.prepare(payload));

export function EChartsPlugin(Alpine) {
    Alpine.directive("echart", (el, {}, { cleanup }) => {
        const canvas = el.querySelector("[data-echart-canvas]");
        let chart = null;
        let disposed = false;
        let lastConfig = null;

        const readConfig = () => el.querySelector("script[data-echart-config]")?.textContent ?? "{}";

        const render = async (force = false) => {
            const raw = readConfig();

            if (!force && raw === lastConfig) {
                return;
            }

            lastConfig = raw;
            const payload = JSON.parse(raw);
            const echarts = await loadEcharts(payload);

            if (disposed) {
                return;
            }

            if (!chart) {
                chart = echarts.init(canvas, null, { renderer: payload.renderer === "canvas" ? "canvas" : "svg" });
            }

            chart.setOption(buildOption(payload, el, echarts), { notMerge: true });
            el.setAttribute("data-ready", "");
        };

        render();

        // Livewire remplace le texte du JSON (ou le nœud entier) : on relit.
        const dataObserver = new MutationObserver(() => render());
        dataObserver.observe(el, { childList: true, subtree: true, characterData: true });

        // Les couleurs du thème sont des variables CSS : on les relit au changement de mode.
        const themeObserver = new MutationObserver(() => render(true));
        themeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ["class", "data-theme", "style"] });

        const resizeObserver = new ResizeObserver(() => chart?.resize());
        resizeObserver.observe(canvas);

        cleanup(() => {
            disposed = true;
            dataObserver.disconnect();
            themeObserver.disconnect();
            resizeObserver.disconnect();
            chart?.dispose();
        });
    });
}

/**
 * Résout une couleur CSS (var(), oklch(), color-mix()…) en couleur
 * calculée : ECharts ne lit pas les variables CSS.
 */
function resolver(el) {
    const probe = document.createElement("span");
    probe.style.display = "none";
    el.appendChild(probe);
    // Le navigateur peut rendre oklch() ou color(srgb …) tel quel ; peindre un
    // pixel donne toujours du rgba, qu'ECharts sait lire.
    const pixel = document.createElement("canvas").getContext("2d", { willReadFrequently: true });
    pixel.canvas.width = pixel.canvas.height = 1;
    const cache = new Map();

    const toRgba = (computed) => {
        pixel.clearRect(0, 0, 1, 1);
        pixel.fillStyle = "#000";
        pixel.fillStyle = computed;
        pixel.fillRect(0, 0, 1, 1);
        const [r, g, b, a] = pixel.getImageData(0, 0, 1, 1).data;

        return `rgba(${r}, ${g}, ${b}, ${Math.round((a / 255) * 100) / 100})`;
    };

    return {
        color(value, fallback = "#888") {
            if (!value) {
                return fallback;
            }

            if (!cache.has(value)) {
                probe.style.color = "";
                probe.style.color = value;
                cache.set(value, probe.style.color ? toRgba(getComputedStyle(probe).color) : fallback);
            }

            return cache.get(value);
        },
        done: () => probe.remove(),
    };
}

/** Même règle que ChartHelper::format côté PHP : -€2k, 1.3k, 12.5%. */
function formatter({ style = "compact", prefix = "", suffix = "" } = {}) {
    const trim = (n, digits) => Number(n.toFixed(digits)).toLocaleString("en-US", { maximumFractionDigits: digits });

    return (value) => {
        if (value === null || value === undefined || value === "" || Number.isNaN(Number(value))) {
            return "—";
        }

        const number = Number(value);
        const sign = number < 0 ? "-" : "";
        const abs = Math.abs(number);
        let text;

        if (style === "number") {
            text = trim(abs, 2);
        } else if (style === "percent") {
            text = `${trim(abs, 1)}%`;
        } else {
            const [divisor, unit] = abs >= 1e9 ? [1e9, "B"] : abs >= 1e6 ? [1e6, "M"] : abs >= 1e3 ? [1e3, "k"] : [1, ""];
            text = trim(abs / divisor, unit ? 1 : 2) + unit;
        }

        return `${sign}${prefix}${text}${suffix}`;
    };
}

const isObject = (value) => value !== null && typeof value === "object" && !Array.isArray(value);

/**
 * Fusion profonde, pour l'échappatoire `options`. Deux tableaux d'objets se
 * fusionnent élément par élément — `series: [{ label: … }]` retouche la
 * première série sans effacer ses données ; les autres tableaux sont remplacés.
 */
function merge(target, source) {
    if (!isObject(source)) {
        return target;
    }

    for (const [key, value] of Object.entries(source)) {
        const current = target[key];

        if (isObject(value) && isObject(current)) {
            target[key] = merge({ ...current }, value);
        } else if (Array.isArray(value) && Array.isArray(current) && value.every(isObject) && current.every(isObject)) {
            target[key] = current.map((item, i) => (value[i] ? merge({ ...item }, value[i]) : item)).concat(value.slice(current.length));
        } else {
            target[key] = value;
        }
    }

    return target;
}

function buildOption(payload, el, echarts) {
    const css = resolver(el);
    const styles = getComputedStyle(el);
    const token = (name, fallback) => css.color(`var(${name})`, fallback);
    const ink = {
        text: token("--muted-foreground", "#71717a"),
        strong: token("--foreground", "#18181b"),
        border: token("--border", "#e4e4e7"),
        surface: token("--background", "#ffffff"),
        up: token("--success", "#16a34a"),
        down: token("--destructive", "#dc2626"),
    };
    const format = formatter(payload.format);
    const type = payload.type;
    const series = payload.series.map((item) => ({ ...item, color: css.color(item.color) }));
    const palette = payload.palette.map((item) => ({ ...item, color: css.color(item.color) }));
    const categories = payload.categories;
    const count = categories.length;
    const large = count > 2000;
    const cartesian = ["line", "area", "bar", "scatter", "heatmap", "candlestick"].includes(type);
    const axisStyle = {
        axisLine: { show: false },
        axisTick: { show: false },
        axisLabel: { color: ink.text, fontSize: 11, hideOverlap: true },
        splitLine: { lineStyle: { color: ink.border, type: [4, 4] } },
    };
    const x = (index) => (payload.datetime ? Date.parse(categories[index]) : categories[index]);
    const numericX = type === "scatter" && payload.numericIndex && !payload.datetime;

    const option = {
        backgroundColor: "transparent",
        animationDuration: matchMedia("(prefers-reduced-motion: reduce)").matches ? 0 : 500,
        color: (["pie", "donut", "funnel"].includes(type) ? palette : series).map((item) => item.color),
        textStyle: { fontFamily: styles.fontFamily, color: ink.text },
        aria: { enabled: true, label: { description: payload.label } },
        tooltip: {
            trigger: cartesian && !["heatmap", "scatter"].includes(type) ? "axis" : "item",
            confine: true,
            valueFormatter: (value) => (Array.isArray(value) ? value.map(format).join(" · ") : format(value)),
            backgroundColor: ink.surface,
            borderColor: ink.border,
            borderWidth: 1,
            padding: [8, 12],
            textStyle: { color: ink.strong, fontSize: 12 },
            extraCssText: "border-radius: 8px; box-shadow: 0 8px 24px -12px rgb(0 0 0 / 0.35);",
            axisPointer: { type: type === "bar" ? "shadow" : "line", lineStyle: { color: ink.border }, shadowStyle: { color: "rgb(127 127 127 / 0.08)" } },
        },
        legend: {
            show: payload.legend ?? (["pie", "donut", "funnel"].includes(type) ? count > 1 : series.length > 1),
            bottom: 0,
            icon: "roundRect",
            itemWidth: 10,
            itemHeight: 10,
            itemGap: 16,
            textStyle: { color: ink.text, fontSize: 13 },
        },
        series: [],
    };

    const legendRoom = option.legend.show ? 32 : 0;
    const zoomRoom = payload.zoom ? 40 : 0;

    if (cartesian) {
        const categoryAxis = {
            ...axisStyle,
            type: payload.datetime ? "time" : numericX ? "value" : "category",
            data: payload.datetime || numericX ? undefined : categories,
            scale: numericX,
            boundaryGap: type === "bar" || type === "heatmap" || type === "candlestick",
            splitLine: { show: false },
        };
        const valueAxis = { ...axisStyle, type: "value", scale: type === "candlestick", axisLabel: { ...axisStyle.axisLabel, formatter: format } };

        option.grid = { left: 4, right: 12, top: 12, bottom: 8 + legendRoom + zoomRoom, outerBoundsMode: "same", outerBoundsContain: "axisLabel" };
        option.xAxis = payload.horizontal ? valueAxis : categoryAxis;
        option.yAxis = payload.horizontal ? { ...categoryAxis, inverse: true } : valueAxis;

        if (payload.zoom) {
            option.dataZoom = [
                { type: "inside", filterMode: "none" },
                {
                    type: "slider",
                    height: 20,
                    bottom: 8 + legendRoom,
                    borderColor: ink.border,
                    fillerColor: "rgb(127 127 127 / 0.12)",
                    handleStyle: { color: ink.surface, borderColor: ink.text },
                    moveHandleStyle: { color: ink.border },
                    textStyle: { color: ink.text },
                    dataBackground: { lineStyle: { color: ink.border }, areaStyle: { color: ink.border, opacity: 0.4 } },
                    selectedDataBackground: { lineStyle: { color: series[0]?.color }, areaStyle: { color: series[0]?.color, opacity: 0.15 } },
                },
            ];
        }
    }

    if (type === "line" || type === "area" || type === "scatter") {
        option.series = series.map((item) => ({
            name: item.label,
            type: type === "scatter" ? "scatter" : "line",
            stack: payload.stacked ? "total" : undefined,
            smooth: payload.curve !== "linear",
            showSymbol: type === "scatter" || count <= 16,
            symbolSize: type === "scatter" ? 9 : 6,
            sampling: large ? "lttb" : undefined,
            lineStyle: { width: 2 },
            emphasis: { focus: "series" },
            areaStyle:
                type === "area"
                    ? {
                          color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                              { offset: 0, color: withAlpha(item.color, 0.32) },
                              { offset: 1, color: withAlpha(item.color, 0.02) },
                          ]),
                      }
                    : undefined,
            data: payload.values[item.key].map((value, i) => (payload.datetime ? [x(i), value] : numericX ? [Number(categories[i]), value] : value)),
        }));
    }

    if (type === "bar") {
        option.series = series.map((item) => ({
            name: item.label,
            type: "bar",
            stack: payload.stacked ? "total" : undefined,
            large,
            barMaxWidth: 36,
            itemStyle: { borderRadius: payload.stacked ? 0 : payload.horizontal ? [0, 4, 4, 0] : [4, 4, 0, 0] },
            emphasis: { focus: "series" },
            data: payload.values[item.key].map((value, i) => (payload.datetime ? [x(i), value] : value)),
        }));
    }

    if (type === "pie" || type === "donut" || type === "funnel") {
        const key = series[0]?.key;
        const data = palette
            .map((item, i) => ({ name: item.label, value: key ? payload.values[key][i] : null, itemStyle: { color: item.color } }))
            .filter((item) => item.value !== null && item.value > 0);

        option.series = [
            type === "funnel"
                ? { type: "funnel", top: 8, bottom: 8 + legendRoom, left: "10%", width: "80%", gap: 2, label: { color: ink.strong }, itemStyle: { borderColor: ink.surface, borderWidth: 2 }, data }
                : {
                      type: "pie",
                      radius: type === "donut" ? ["58%", "80%"] : ["0%", "80%"],
                      center: ["50%", legendRoom ? "45%" : "50%"],
                      avoidLabelOverlap: true,
                      label: { show: false },
                      itemStyle: { borderColor: ink.surface, borderWidth: 2, borderRadius: type === "donut" ? 4 : 0 },
                      emphasis: { scale: true, scaleSize: 6 },
                      data,
                  },
        ];
    }

    if (type === "radar") {
        const max = payload.max ?? payload.scaleMax;

        option.radar = {
            indicator: categories.map((name) => ({ name, max })),
            radius: "68%",
            center: ["50%", legendRoom ? "46%" : "50%"],
            axisName: { color: ink.text },
            splitLine: { lineStyle: { color: ink.border } },
            splitArea: { show: false },
            axisLine: { lineStyle: { color: ink.border } },
        };
        option.series = [
            {
                type: "radar",
                symbolSize: 5,
                data: series.map((item) => ({
                    name: item.label,
                    value: payload.values[item.key],
                    lineStyle: { width: 2, color: item.color },
                    itemStyle: { color: item.color },
                    areaStyle: { color: withAlpha(item.color, 0.18) },
                })),
            },
        ];
    }

    if (type === "heatmap") {
        // Une ligne par série, une colonne par catégorie ; l'intensité suit une seule teinte.
        const values = series.flatMap((item) => payload.values[item.key].filter((v) => v !== null));
        option.yAxis = { ...option.yAxis, type: "category", inverse: true, data: series.map((item) => item.label), axisLabel: { ...axisStyle.axisLabel, formatter: undefined }, splitLine: { show: false } };
        option.visualMap = {
            min: Math.min(...values, 0),
            max: Math.max(...values, 1),
            calculable: false,
            orient: "horizontal",
            left: "center",
            bottom: zoomRoom,
            itemHeight: 120,
            textStyle: { color: ink.text },
            inRange: { color: [withAlpha(series[0]?.color ?? ink.text, 0.08), series[0]?.color ?? ink.text] },
            formatter: format,
        };
        option.grid.bottom += 36;
        option.legend.show = false;
        option.series = [
            {
                type: "heatmap",
                itemStyle: { borderColor: ink.surface, borderWidth: 2, borderRadius: 3 },
                emphasis: { itemStyle: { borderColor: ink.strong } },
                data: series.flatMap((item, row) => payload.values[item.key].map((value, column) => [column, row, value])),
            },
        ];
    }

    if (type === "candlestick") {
        // Colonnes attendues : open, close, low, high (dans n'importe quel ordre dans les données).
        const pick = (name) => payload.values[name] ?? [];
        option.legend.show = false;
        option.series = [
            {
                type: "candlestick",
                name: payload.label,
                itemStyle: { color: ink.up, color0: ink.down, borderColor: ink.up, borderColor0: ink.down },
                data: categories.map((_, i) => [pick("open")[i], pick("close")[i], pick("low")[i], pick("high")[i]]),
            },
        ];
    }

    css.done();

    return merge(option, payload.options);
}

/** rgb(r g b) ou rgb(r, g, b) -> rgba avec opacité, pour dégradés et fonds. */
function withAlpha(color, alpha) {
    const parts = color.match(/[\d.]+/g);

    return parts && parts.length >= 3 ? `rgba(${parts[0]}, ${parts[1]}, ${parts[2]}, ${alpha})` : color;
}
