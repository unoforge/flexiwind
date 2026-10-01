---
title: "Chart"
group: "Plugins"
order: 10
tier: "free"
state: "new"
description: "Zoomable time series, candlesticks, heatmaps, radar, scatter and funnels, drawn by Apache ECharts and themed with your Flexiwind tokens."
seoDescription: "Apache ECharts for Laravel Blade and Livewire: zoom, candlestick, heatmap, radar, scatter, funnel and large datasets, themed with Tailwind CSS and loaded on demand."
keywords: "echarts, apache echarts, laravel chart, livewire chart, candlestick, heatmap, radar, scatter, funnel, zoom, time series"
---

## Demo

Drag the handles under the chart, or scroll inside it, to zoom.

::preview{example="echart/line-area-zoom" inline}

## When to use it

Flexiwind has two chart components with the same `data`, `index` and `config`:

- [Chart](/components/chart) draws on the server, with no chart library. It covers most dashboards: bar, line, area, pie, donut, radial.
- `<x-ui.echart>`, on this page, hands the data to [Apache ECharts](https://echarts.apache.org) for what only a charting library does well: zoom and pan on long time series, candlesticks, heatmaps, radar, scatter, funnels, and thousands of points.

Switching from one to the other is a one-word change. Every chart type has its own page in the **ECharts** group of the sidebar, from a simple example to more involved ones.

## Installation

```bash
php artisan flexi:add echarts
```

This adds the Blade component, two plugin files and the `echarts` npm package. Register the plugin next to the other Flexiwind plugins:

```js
import { EChartsPlugin } from "./plugins/echarts";

Alpine.plugin(EChartsPlugin);
```

:::callout{type="note"}
Apache ECharts is licensed under Apache 2.0: free for every project and every company, with no revenue threshold and no license key.
:::

## Bundle size

ECharts is large, so it is never part of your main bundle. The plugin imports it with dynamic `import()`, and Vite builds it as separate files:

| File | Loaded | Size (gzip) |
| --- | --- | --- |
| `flexilla.js`, your plugins | on every page | unchanged |
| ECharts core, SVG renderer, grid, tooltip, legend | with the first chart of a page | ~155 kB |
| One file per chart type (line, bar, pie…) | when a chart of that type appears | 3 to 10 kB each |
| Zoom | with the first `zoom` chart | ~12 kB |
| Canvas renderer | with the first large chart | ~5 kB |

A page without charts downloads nothing more. A page with a line chart loads the core and the line module — not candlesticks, not heatmaps.

Keep it that way:

- **Never import `echarts` from `app.js`.** A static import pulls the whole library into every page.
- **Register the plugin, not ECharts.** `Alpine.plugin(EChartsPlugin)` weighs a few kilobytes; ECharts only follows when a chart is on screen.
- **Add chart types in `echarts-core.js`,** as one more line in `LOADERS`. Each new type becomes its own file.

If you prefer a dedicated entry point, move the `Alpine.plugin(EChartsPlugin)` call into its own file, add it to `input` in `vite.config.js`, and load it with `@vite('resources/js/charts.js')` only in the layouts that show charts.

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
| `data`, `index`, `config` | Same as [Chart](/components/chart). For pie, donut and funnel, `config` is keyed by category. |
| `type` (line\|area\|bar\|scatter\|pie\|donut\|funnel\|radar\|heatmap\|candlestick) | Defaults to `line`. |
| `stacked`, `horizontal` (boolean) | For bars, lines and areas. |
| `datetime` (boolean) | The `index` column holds dates (`2026-07-01`, `2026-07-01T14:30`): the axis becomes a time axis. |
| `zoom` (boolean) | Adds a zoom slider, and zooming with the wheel or a pinch. |
| `curve` (smooth\|linear) | Line interpolation. |
| `max` (number) | Top of each radar axis. Defaults to the largest value. |
| `format`, `prefix`, `suffix` | Same as [Chart](/components/chart). |
| `legend` (boolean\|null) | Shown by default for two series or more. |
| `renderer` (svg\|canvas\|null) | `svg` by default, `canvas` past 2,000 points. |
| `options` (array) | Raw ECharts options, merged last. |
| `label` (string) | Accessible name. |

Size the chart with classes: `class="h-96"`. It defaults to `h-80 w-full`.

## Accessibility

The drawing is hidden from screen readers, which read a visually hidden data table instead — up to 500 rows. Past that, they get a one-line summary: a 5,000-row table helps nobody.
