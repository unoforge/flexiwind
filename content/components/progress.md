---
title: "Progress"
group: "Data & Feedback"
order: 60
tier: "free"
description: "Task-completion indicator with configurable thickness for determinate loading states."
seoDescription: "Show progress and loading states with Flexiwind's progress component."
keywords: "progress bar, loading, status, percent"
---

## Demo

::preview{example="progress/demo" inline}

## Installation

```bash
php artisan flexi:add progress
```

## Indicator

::preview{example="progress/indicator" inline}

## Progress Bar Sizes

::preview{example="progress/sizes" inline}

## Progress with Message

::preview{example="progress/message" inline}

## API

| Prop | Description |
| --- | --- |
| `value` (number) | Current completion value. |
| `max` (number) | Total target value (defaults to browser behavior if omitted). |
| `size` (2xs\|xs\|sm\|md\|lg\|xl) | Controls bar thickness. |
| `radius` (boolean) | Controls rounded corners for progress bars. Default: true |
