---
title: "Bar Chart"
group: "Data Visualization"
order: 10
tier: "free"
state: "new"
description: "Grouped, stacked, horizontal and signed bar charts."
seoDescription: "Bar charts for Laravel Blade and Livewire with Tailwind CSS: grouped, stacked, negative values, no chart library."
keywords: "chart, bar chart, column chart, stacked bar, data visualization, analytics"
---

## Demo

::preview{example="chart/bar-demo" inline}

## Installation

```bash
php artisan flexi:add chart
```

Bar is the default `type`. See [Chart](/components/chart) for the data model and every prop.

## Stacked

Add `stacked` to pile the series of each category. The value axis follows the height of the tallest stack.

::preview{example="chart/bar-stacked" inline}

## Horizontal

Add `horizontal` to lay bars down: categories go down the left axis, values run to the right. Long labels such as page paths read better this way.

::preview{example="chart/bar-horizontal" inline}

## Negative values

Values below zero hang from the zero line, which stays solid.

::preview{example="chart/bar-negative" inline}

## Bars and a line

Layers can be mixed: `only` picks the series each layer draws.

::preview{example="chart/bar-custom" inline}

## Props

Props of the `<x-ui.chart.bar />` layer.

| Prop | Description |
| --- | --- |
| `radius` (int) | Corner radius of the bar ends, in pixels. Defaults to `4`. |
| `gap` (float) | Share of each category left empty, from `0` to `0.9`. Defaults to `0.3`. |
| `only` (string\|array) | Series keys drawn by this layer. |
