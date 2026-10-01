---
title: "Radial Chart"
group: "Data Visualization"
order: 40
tier: "free"
state: "new"
description: "Progress rings and gauges."
seoDescription: "Radial progress charts and gauges for Laravel Blade and Livewire with Tailwind CSS, no JavaScript."
keywords: "chart, radial chart, progress ring, gauge, goal, data visualization"
---

## Demo

::preview{example="chart/radial-demo" inline}

## Installation

```bash
php artisan flexi:add chart
```

Set `type="radial"`. Each row becomes a ring, from the outside in. A ring is full when its value reaches `max` — `100` by default, so percentages work as they are. Values above `max` stay full.

## Single ring and gauge

With one ring, the center shows its value. Add `half` on the layer for a semicircle gauge.

::preview{example="chart/radial-single" inline}

## Props

Props of the `<x-ui.chart.radial />` layer.

| Prop | Description |
| --- | --- |
| `thickness` (float) | Ring thickness, as a share of the radius. Defaults to `0.14`. |
| `gap` (float) | Space between rings. Defaults to `0.05`. |
| `half` (boolean) | Draws a semicircle gauge. |
| `track` (boolean) | The faint ring behind each value. Defaults to `true`. |
| `series` (string) | Column to read when the rows have several. |
