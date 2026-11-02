## Demo

Drag the handles under the chart, or scroll inside it, to zoom.

```html
@php
    // One year of daily sessions. In an app: a query grouped by day.
    $days = collect(range(0, 364))->map(fn (int $i) => [
        'date' => now()->startOfYear()->addDays($i)->format('Y-m-d'),
        'sessions' => (int) round(1400 + $i * 2.4 + sin($i / 14) * 220 + sin($i / 3.1) * 60),
    ])->all();
@endphp

<x-ui.echart type="area" datetime zoom :data="$days" index="date" label="Daily sessions" class="h-80 w-full"
    :config="['sessions' => ['label' => 'Sessions']]" />
```

## When to use it

Flexiwind has two chart components with the same `data`, `index` and `config`:

- [Chart](https://flexiwind.unoforge.com/components/chart) draws on the server, with no chart library. It covers most dashboards: bar, line, area, pie, donut, radial.
- `<x-ui.echart>`, on this page, hands the data to [Apache ECharts](https://echarts.apache.org) for what only a charting library does well: zoom and pan on long time series, candlesticks, heatmaps, radar, scatter, funnels, and thousands of points.

Switching from one to the other is a one-word change. Every chart type has its own page in the **ECharts** group of the sidebar, from a simple example to more involved ones.

## Installation

```bash
php artisan flexi:add echarts
```

This adds the Blade component, two plugin files, the `resources/js/charts.js` entry and the `echarts` npm package.

ECharts gets **its own bundle**, never mixed into `flexilla.js`. Two steps make that happen.

**1. Declare the entry in `vite.config.js`**, next to your other inputs:

```js
laravel({
    input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/js/flexilla.js",
        "resources/js/charts.js",
    ],
}),
```

**2. Load it only in the layouts that show charts:**

```blade
@vite(['resources/js/app.js', 'resources/js/flexilla.js', 'resources/js/charts.js'])
```

`resources/js/charts.js` registers the plugin; there is nothing to add to `flexilla.js`:

```js
import { EChartsPlugin } from "./plugins/echarts";

Alpine.plugin(EChartsPlugin);
```

:::callout{type="warning"}
Do not register `EChartsPlugin` in `flexilla.js`, and never `import "echarts"` yourself: ECharts would then be downloaded by every page, with or without a chart.
:::

:::callout{type="note"}
Apache ECharts is licensed under Apache 2.0: free for every project and every company, with no revenue threshold and no license key.
:::

## Bundle size

Because `charts.js` is its own Vite input, the build writes ECharts to separate files, and a layout that does not load `charts.js` never downloads them:

| File | Loaded | Size (gzip) |
| --- | --- | --- |
| `flexilla.js`, your plugins | on every page | no ECharts code |
| `charts.js`, the plugin | on pages whose layout loads it | ~4 kB |
| ECharts core, SVG renderer, grid, tooltip, legend | with the first chart of a page | ~155 kB |
| One file per chart type (line, bar, pie…) | when a chart of that type appears | 3 to 10 kB each |
| Zoom | with the first `zoom` chart | ~12 kB |
| Canvas renderer | with the first large chart | ~5 kB |

Inside that bundle, the plugin still loads the core and each chart type on demand: a page with a line chart loads the core and the line module, not candlesticks, not heatmaps.

Keep it that way:

- **One entry, one bundle.** `charts.js` stays in `input` of `vite.config.js` and in the `@vite` call of the chart layouts only.
- **Never import `echarts` from `app.js` or `flexilla.js`.** A static import pulls the whole library into every page.
- **Add chart types in `echarts-core.js`,** as one more line in `LOADERS`. Each new type becomes its own file.

## Theming

Colors come from your theme: series use `--chart-1` to `--chart-5`, text and grid lines use `--muted-foreground` and `--border`, candlesticks use `--success` and `--destructive`. Switching between light and dark mode redraws the charts with the new colors.

## Livewire

The chart follows your component: when the data changes, it animates to the new values instead of being rebuilt.

```blade
<x-ui.echart type="bar" :data="$this->salesByMonth" index="month" wire:key="sales" />
```

## Anything else

`options` is merged last into the ECharts options, so everything ECharts supports is one array away. Arrays of objects are merged item by item: `'series' => [['label' => …]]` restyles the first series without losing its data. Only JSON — no JavaScript functions.

```blade
<x-ui.echart type="line" :data="$data" index="day" :options="[
    'yAxis' => ['min' => 0, 'max' => 100],
    'animation' => false,
]" />
```

## Props

| Prop | Description |
| --- | --- |
| `data`, `index`, `config` | Same as [Chart](https://flexiwind.unoforge.com/components/chart). For pie, donut and funnel, `config` is keyed by category. |
| `type` (line\|area\|bar\|scatter\|pie\|donut\|funnel\|radar\|heatmap\|candlestick) | Defaults to `line`. |
| `stacked`, `horizontal` (boolean) | For bars, lines and areas. |
| `datetime` (boolean) | The `index` column holds dates (`2026-07-01`, `2026-07-01T14:30`): the axis becomes a time axis. |
| `zoom` (boolean) | Adds a zoom slider, and zooming with the wheel or a pinch. |
| `curve` (smooth\|linear) | Line interpolation. |
| `max` (number) | Top of each radar axis. Defaults to the largest value. |
| `format`, `prefix`, `suffix` | Same as [Chart](https://flexiwind.unoforge.com/components/chart). |
| `legend` (boolean\|null) | Shown by default for two series or more. |
| `renderer` (svg\|canvas\|null) | `svg` by default, `canvas` past 2,000 points. |
| `options` (array) | Raw ECharts options, merged last. |
| `label` (string) | Accessible name. |

Size the chart with classes: `class="h-96"`. It defaults to `h-80 w-full`.

## Accessibility

The drawing is hidden from screen readers, which read a visually hidden data table instead — up to 500 rows. Past that, they get a one-line summary: a 5,000-row table helps nobody.

## Public Docs

`https://flexiwind.unoforge.com/components/plugins/chart`
