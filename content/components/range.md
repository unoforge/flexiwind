---
title: "Range"
group: "Actions & Inputs"
order: 100
tier: "free"
description: "Slider component for selecting numeric values within a span."
seoDescription: "Implement range selection inputs with Flexiwind's range component."
keywords: "range, slider, input, number picker"
---

## Demo

::preview{example="range/demo" inline}

## Installation

```bash
php artisan flexi:add range
```

## API

| Prop | Description |
| --- | --- |
| `size` (xs\|sm\|md) | Controls track and thumb sizing. |
| `min` (number\|string) | Lower bound for slider value. |
| `max` (number\|string) | Upper bound for slider value. |
| `customIndicator` (string\|null) | Custom classes for a visual progress indicator tied to slider value. |
| `thumbBackground` (default\|current) | Uses current text color for thumb background when set to 'current'. Default: 'default' |
| `radius` (boolean) | Controls rounded treatment on track/indicator. Default: true |

## Examples

### Stepper

::preview{example="range/stepper" inline}

### Styles

::preview{example="range/styles" inline}

### Custom indicator

::preview{example="range/custom-indicator" inline}

### Sizes

::preview{example="range/sizes" inline}
