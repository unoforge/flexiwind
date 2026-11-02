/**
 * Entrée Vite des charts ECharts : son propre bundle, hors de flexilla.js.
 *
 * Déclarée dans `input` de vite.config.js, puis chargée seulement par les
 * layouts qui affichent des charts :
 *
 *   @vite(['resources/js/app.js', 'resources/js/flexilla.js', 'resources/js/charts.js'])
 *
 * Une page sans charts ne télécharge rien d'ECharts. Le socle et chaque type
 * de chart restent, en plus, chargés à la demande (echarts-core.js).
 */
import { EChartsPlugin } from "./plugins/echarts";

Alpine.plugin(EChartsPlugin);
