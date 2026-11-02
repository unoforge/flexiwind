---
title: "Meter"
group: "Data & Feedback"
order: 70
tier: "free"
description: "Range-based value indicator for metrics like usage, score, or capacity."
seoDescription: "Display measurements and progress with Flexiwind's meter component."
keywords: "meter, gauge, measurement, indicator"
---

## Demo

::preview{example="meter/demo" inline}

## Installation

```bash
php artisan flexi:add meter
```

## Indicator

::preview{example="meter/indicator" inline}

## Sizes

::preview{example="meter/sizes" inline}

## API

| Prop | Description |
| --- | --- |
| `value` (number) | Current measured value. |
| `min` (number) | Minimum bound for the scale. |
| `max` (number) | Maximum bound for the scale. |
| `size` (2xs\|xs\|sm\|md\|lg\|xl) | Controls bar height. |
| `radius` (boolean) | Controls rounded style. Default: true |
