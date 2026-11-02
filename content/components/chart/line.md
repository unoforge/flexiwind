---
title: "Line Chart"
group: "Data Visualization"
order: 20
tier: "free"
state: "new"
description: "Line and area charts for trends over time."
seoDescription: "Line and area charts for Laravel Blade and Livewire with Tailwind CSS, smooth or linear, no chart library."
keywords: "chart, line chart, area chart, trend, time series, data visualization"
---

## Demo

::preview{example="chart/line-demo" inline}

## Installation

```bash
php artisan flexi:add chart
```

Set `type="line"` or `type="area"`. See [Chart](/components/chart) for the data model and every prop.

## Area

::preview{example="chart/line-area" inline}

## Linear curve and missing values

`curve="linear"` draws straight segments. A `null` value breaks the line instead of pretending the value was zero.

::preview{example="chart/line-linear" inline}

## Props

Props of the `<x-ui.chart.line />` layer.

| Prop | Description |
| --- | --- |
| `curve` (smooth\|linear) | Smooth uses a monotone curve: it never overshoots the data. |
| `area` (boolean) | Fills under the line with a fading gradient. |
| `dots` (boolean\|null) | Points on each value. Shown by default up to 16 categories. |
| `stroke-width` (number) | Line thickness in pixels. Defaults to `2`. |
| `only` (string\|array) | Series keys drawn by this layer. |
