/**
 * ECharts, découpé pour que chaque page ne télécharge que ce qu'elle dessine.
 *
 *  - Ce module est le socle : moteur, SVG, grille, infobulle, légende. Il
 *    n'est lui-même chargé qu'au premier chart de la page (voir echarts.js).
 *  - Chaque type de chart, le zoom et le rendu canvas sont des imports
 *    dynamiques : Vite en fait des fichiers séparés, téléchargés à la demande.
 *
 * Pour un type que cette liste ne connaît pas, ajoutez une ligne à `LOADERS`
 * — c'est votre copie.
 */
import * as echarts from "echarts/core";
import { AriaComponent, GridComponent, LegendComponent, TooltipComponent } from "echarts/components";
import { install as SVGRenderer } from "echarts/lib/renderer/installSVGRenderer.js";

echarts.use([AriaComponent, GridComponent, LegendComponent, TooltipComponent, SVGRenderer]);

const LOADERS = {
    line: () => import("echarts/lib/chart/line"),
    bar: () => import("echarts/lib/chart/bar"),
    scatter: () => import("echarts/lib/chart/scatter"),
    pie: () => import("echarts/lib/chart/pie"),
    funnel: () => import("echarts/lib/chart/funnel"),
    radar: () => Promise.all([import("echarts/lib/chart/radar"), import("echarts/lib/component/radar")]),
    heatmap: () => Promise.all([import("echarts/lib/chart/heatmap"), import("echarts/lib/component/visualMapContinuous")]),
    candlestick: () => import("echarts/lib/chart/candlestick"),
    zoom: () => import("echarts/lib/component/dataZoom"),
    canvas: () => import("echarts/lib/renderer/installCanvasRenderer.js").then((module) => echarts.use(module.install)),
};

const SERIES = { area: "line", donut: "pie" };
const loaded = new Map();

/** Charge ce qu'un chart demande (type, zoom, rendu), une seule fois par page. */
export async function prepare({ type, zoom = false, renderer = "svg" }) {
    const needs = [SERIES[type] ?? type, zoom && "zoom", renderer === "canvas" && "canvas"].filter((need) => need && LOADERS[need]);

    await Promise.all(
        needs.map((need) => {
            if (!loaded.has(need)) {
                loaded.set(need, LOADERS[need]());
            }

            return loaded.get(need);
        }),
    );

    return echarts;
}
