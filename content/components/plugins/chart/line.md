---
title: "Line"
group: "ECharts"
order: 20
tier: "free"
state: "new"
description: "Lines and areas, from a few points to thousands, with zoom on time series."
seoDescription: "Lines and areas, from a few points to thousands, with zoom on time series. Apache ECharts for Laravel Blade and Livewire."
keywords: "echarts, line chart, area chart, time series, zoom, large dataset"
---

## Simple

::preview{example="echart/line-simple" inline}

## Area on a time axis, with zoom

::preview{example="echart/line-area-zoom" inline}

## Large datasets

Past 2,000 points the chart switches to canvas rendering, and lines are sampled with LTTB so they keep their shape. This one has 10,000 readings.

::preview{example="echart/line-large" inline}

See [Chart](/components/plugins/chart) for installation and every prop.
