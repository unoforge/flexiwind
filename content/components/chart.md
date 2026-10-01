---
title: "Chart"
group: "Data Visualization"
order: 5
tier: "free"
state: "new"
description: "Bar, line, area, pie, donut and radial charts rendered by Blade, with no JavaScript library."
seoDescription: "Responsive, themeable Tailwind CSS charts for Laravel Blade and Livewire, without a JavaScript chart library."
keywords: "chart, graph, bar chart, line chart, area chart, data visualization, dashboard, analytics"
---

## Demo

::preview{example="chart/bar-demo" inline}

## Installation

```bash
php artisan flexi:add chart
```

This adds the Blade views under `resources/views/components/ui/chart`, the `App\Flexiwind\ChartHelper` class that computes the geometry, and a small script, `resources/js/plugins/chart.js`, for tooltips and interactions. Register it once next to the other Flexiwind plugins:

```js
import { ChartPlugin } from "./plugins/chart";

Alpine.plugin(ChartPlugin);
```

Without Alpine, call `initChartInteractions()` from the same file once. There is nothing to set up per chart, and charts replaced by Livewire keep working.

## Chart types

| Type | Page |
| --- | --- |
| `bar`, with `stacked` or `horizontal` | [Bar Chart](/components/chart/bar) |
| `line`, `area` | [Line Chart](/components/chart/line) |
| `pie`, `donut` | [Pie Chart](/components/chart/pie) |
| `radial` | [Radial Chart](/components/chart/radial) |

Two companions live next to the chart for dashboards: [Sparkline](/components/chart/sparkline), a tiny trend for KPI cards, and [Tracker](/components/chart/tracker), a row of status blocks.

Need zoom on a long time series, candlesticks, a heatmap or thousands of points? The [ECharts plugin](/components/plugins/chart) takes the same data and draws it with Apache ECharts.

## Why no chart library

The chart is drawn on the server: bars and points are positioned in percentages, lines are SVG paths in a stretched viewBox. That means:

- **Almost nothing to load.** No chart library: the chart script weighs about 3 KB gzipped, and the chart is fully drawn before it runs.
- **Livewire just works.** When the data changes, Livewire morphs the HTML and the bars animate to their new height.
- **Your theme applies.** Colors are CSS variables, so dark mode and themes follow without code.
- **Readable without sight.** Every chart carries a hidden data table for screen readers.

## Data and config

`data` is a list of rows, one per category — the shape an Eloquent query or `collect()` already gives you. `index` names the category column. `config` lists the series to draw, in order, with their label and color.

```blade
@php
    $data = [
        ['month' => 'Jan', 'desktop' => 186, 'mobile' => 80],
        ['month' => 'Feb', 'desktop' => 305, 'mobile' => 200],
    ];
@endphp

<x-ui.chart :data="$data" index="month" :config="[
    'desktop' => ['label' => 'Desktop', 'color' => 'var(--chart-1)'],
    'mobile' => ['label' => 'Mobile', 'color' => 'var(--chart-2)'],
]" />
```

Without `config`, every numeric column becomes a series and colors cycle through `--chart-1` to `--chart-5`. A `null` value is shown as missing, never as zero.

Pie, donut and radial charts color **categories** rather than series, so their `config` is keyed by category: `'chrome' => ['label' => 'Chrome', 'color' => …]`.

## Composition

Without content, `<x-ui.chart>` draws a complete chart for its `type`. Give it content and it becomes a frame: each layer is a component you can keep, remove, reorder or restyle with classes. Layers stack in the order you write them.

::preview{example="chart/bar-custom"}

## Interactions

Every bar, line and area chart gets a hover tooltip, and tapping a category shows it on touch screens. A chart has a single tooltip, whatever its number of categories: the script fills it from the chart's data table as the pointer moves, so a year of daily data does not add hundreds of hidden panels to the page.

Mark a chart `interactive` to add:

- **Keyboard**: tab into the chart, then use the arrow keys, Home and End. Screen readers announce each value.
- **Legend toggle**: click a series in the legend to hide or show it. The value axis keeps its scale.
- **CSV export**: put `data-chart-export="#chart-id"` on any button. Values are exported raw — `1250`, not `1.3k`.

::preview{example="chart/interactive"}

Without the script, the chart is still drawn and its data table is still read by screen readers; only the tooltip and the interactions are missing.

:::callout{type="note"}
Hiding a series does not rescale the chart. To rescale, filter the data on the server — for example from a Livewire property — and the chart is recomputed.
:::

## Range selection

Add `brush` and the chart lets people select a range of categories: drag across it, or hold Shift with the arrow keys and press Enter. It then emits a `chart-range` DOM event:

```js
{ start: 12, end: 30, from: "Jul 13", to: "Jul 31" }
```

`start` and `end` are indexes in what the chart shows. A double-click emits the same event with `null` values, to go back.

Listen to it from Livewire and recompute the data on the server — the scale follows the zoom. Drag across this chart:

:::raw
<x-docs.preview-ui>
    <livewire:chart-zoom-demo />
</x-docs.preview-ui>
:::

```blade
<x-ui.chart type="area" brush :data="$days" index="day"
    wire:chart-range="zoom($event.detail.start, $event.detail.end)" />
```

```php
#[Locked]
public int $from = 0;

#[Locked]
public int $to = 89;

public function zoom(mixed $start = null, mixed $end = null): void
{
    if ($start === null || $end === null) {
        $this->reset('from', 'to');

        return;
    }

    // Indexes come from the browser: check them before using them.
    if (! is_int($start) || ! is_int($end) || $start < 0 || $end <= $start || $end > $this->to - $this->from) {
        return;
    }

    [$this->from, $this->to] = [$this->from + $start, $this->from + $end];
}
```

With Alpine instead of Livewire: `x-on:chart-range="range = $event.detail"`.

## Theming

Series colors come from five CSS variables defined by your theme, `--chart-1` to `--chart-5`. They are assigned in order: the first series always takes `--chart-1`, the second `--chart-2`, and so on — a color follows the series, not its rank.

`--chart-1` is your theme's primary color, so a single-series chart matches your brand. The four others are distinct hues chosen for each theme, not tints of the primary: two shades of the same color are hard to tell apart in a legend. Every theme's palette is checked in light and dark mode for:

- **Color blindness**: neighboring colors stay distinct under protanopia and deuteranopia.
- **Normal vision**: neighbors are clearly different, and no hue appears twice.
- **Pies**: the last slice touches the first, so that pair is checked too.

```css
:root {
    --chart-1: var(--primary);
    --chart-2: #eb6834;
    --chart-3: #1baf7a;
    --chart-4: #eda100;
    --chart-5: #e87ba4;
}
```

Beyond five series, a chart gets hard to read: group the smallest into "Other" rather than adding colors. Any CSS color also works in `config` — `#6366f1`, `oklch(62% 0.2 264)`, `var(--success)` — but status colors such as `--success` or `--destructive` are best kept for series that mean good or bad.

## API

### Chart

| Prop | Description |
| --- | --- |
| `data` (array\|Collection) | Rows, one per category. |
| `index` (string) | Column holding the category label. Defaults to the first non-numeric column. |
| `config` (array) | Series to draw: `['key' => ['label' => …, 'color' => …]]`. |
| `type` (bar\|line\|area\|pie\|donut\|radial) | What the chart draws when it has no content. Defaults to `bar`. |
| `stacked` (boolean) | Stacks bars instead of grouping them. |
| `horizontal` (boolean) | Lays bars down, categories on the vertical axis. |
| `min`, `max` (number) | Force the bounds of the value axis. For `radial`, `max` is the value of a full ring (100 by default). |
| `format` (compact\|number\|percent) | Value format on the axis and in the tooltip. `compact` gives `1.2k`. |
| `prefix`, `suffix` (string) | Around every value: `prefix="€"`, `suffix=" ms"`. |
| `curve` (smooth\|linear) | Line interpolation when `type` is `line` or `area`. |
| `legend` (boolean\|null) | Shown by default when there are two series or more. |
| `label` (string) | Accessible name of the chart and caption of its data table. |
| `interactive` (boolean) | Keyboard navigation and legend toggle. Bar, line and area charts. |
| `brush` (boolean) | Range selection, emitting `chart-range`. Implies `interactive`. |

Size the chart with a height class on the component: `class="h-80"`.

### Layers

| Component | Props |
| --- | --- |
| `<x-ui.chart.grid />` | `vertical` (boolean) adds a line per category. |
| `<x-ui.chart.y-axis />` | — |
| `<x-ui.chart.x-axis />` | `interval` (int) keeps one label every N. |
| `<x-ui.chart.bar />` | `radius` (px), `gap` (0 to 0.9, space between categories), `only` (series keys). |
| `<x-ui.chart.line />` | `curve`, `area`, `dots`, `stroke-width`, `only`. |
| `<x-ui.chart.tooltip />` | `cursor` (boolean). Write it last so it sits on top. One panel per chart, filled by the chart script. |
| `<x-ui.chart.pie />` | `inner` (0 to 0.9, hole size), `series`, `center-label`. Its slot fills the center. |
| `<x-ui.chart.radial />` | `thickness`, `gap`, `half`, `track`, `series`. Its slot fills the center. |

## Accessibility

The drawing is hidden from assistive technologies. Instead, the chart renders a visually hidden `<table>` with a caption taken from `label`, one row per category and one column per series. Always give your chart a meaningful `label`.
