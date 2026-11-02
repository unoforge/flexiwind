---
title: "Pie Chart"
group: "Data Visualization"
order: 30
tier: "free"
state: "new"
description: "Pie and donut charts for shares of a whole."
seoDescription: "Pie and donut charts for Laravel Blade and Livewire with Tailwind CSS, no JavaScript."
keywords: "chart, pie chart, donut chart, doughnut, share, proportion, data visualization"
---

## Demo

::preview{example="chart/pie-demo" inline}

## Installation

```bash
php artisan flexi:add chart
```

Set `type="pie"` or `type="donut"`. See [Chart](/components/chart) for the data model.

A pie draws the first numeric series: one slice per row. Its `config` is keyed by **category**, so each slice gets its own label and color. Zero, negative and missing values get no slice. Hovering a slice fades the others and shows its value and share.

## Donut

The center shows the total by default.

::preview{example="chart/donut-demo" inline}

## Custom center

Use the `<x-ui.chart.pie>` layer and put anything in its slot. `inner` sets the size of the hole.

::preview{example="chart/donut-center" inline}

## Props

Props of the `<x-ui.chart.pie />` layer.

| Prop | Description |
| --- | --- |
| `inner` (float) | Hole size, from `0` (pie) to `0.9`. Defaults to `0.62` for a donut. |
| `series` (string) | Column to draw when the rows have several. Defaults to the first one. |
| `center-label` (string) | Caption under the total. Defaults to `Total`. |
