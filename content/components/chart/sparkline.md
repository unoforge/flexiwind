---
title: "Sparkline"
group: "Data Visualization"
order: 50
tier: "free"
state: "new"
description: "A tiny trend line, area or bar series for KPI cards and tables."
seoDescription: "Sparklines for Laravel Blade and Livewire with Tailwind CSS: line, area and bars, no JavaScript."
keywords: "sparkline, trend, kpi, mini chart, dashboard"
---

## Demo

::preview{example="chart/sparkline-demo" inline}

## Installation

```bash
php artisan flexi:add sparkline
```

## Usage

Pass a list of numbers, or rows with the column to read in `key`. Size it with classes.

```blade
<x-ui.sparkline :data="[12, 18, 9, 24, 31]" class="h-10 w-28" />

<x-ui.sparkline :data="$days" key="revenue" type="area" color="var(--success)" />
```

A line or an area follows the trend: its scale runs from the lowest to the highest value, so small moves stay visible. Bars start from zero, otherwise they would exaggerate.

## Props

| Prop | Description |
| --- | --- |
| `data` (array\|Collection) | Numbers, or rows read with `key`. |
| `key` (string\|null) | Column to read in each row. Dot notation works. |
| `type` (line\|area\|bar) | Defaults to `line`. |
| `color` (string) | Any CSS color. Defaults to `var(--chart-1)`. |
| `stroke-width` (number) | Line thickness in pixels. Defaults to `2`. |
| `dot` (boolean) | Marks the last value. Defaults to `true`. |
| `label` (string) | Accessible name. Screen readers hear "Revenue: from 18 to 48". |
