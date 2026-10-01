---
title: "Tracker"
group: "Data Visualization"
order: 60
tier: "free"
state: "new"
description: "A row of status blocks: uptime, job runs, attendance."
seoDescription: "Status tracker bar for Laravel Blade and Livewire with Tailwind CSS: uptime and history at a glance, no JavaScript."
keywords: "tracker, uptime, status, history, status page, monitoring"
---

## Demo

::preview{example="chart/tracker-demo" inline}

## Installation

```bash
php artisan flexi:add tracker
```

## Usage

One item per period, oldest first. Each item has a `status` and an optional `tooltip`.

```blade
<x-ui.tracker :data="[
    ['status' => 'ok', 'tooltip' => 'Sep 1 — Operational'],
    ['status' => 'warning', 'tooltip' => 'Sep 2 — Degraded'],
    ['status' => 'error', 'tooltip' => 'Sep 3 — Outage'],
]" />
```

The four default statuses are `ok`, `warning`, `error` and `empty`, colored with your theme's `--success`, `--warning`, `--destructive` and `--muted`. Add or override statuses with `colors`, or give one item its own `color`.

```blade
<x-ui.tracker :data="$runs" :colors="['skipped' => 'var(--chart-3)']" />
```

## Props

| Prop | Description |
| --- | --- |
| `data` (array\|Collection) | Items with `status`, and optionally `tooltip` and `color`. |
| `colors` (array) | Status → CSS color, merged over the defaults. |
| `label` (string) | Accessible name of the list. |

Each tooltip is also written as visually hidden text, so screen readers read the whole history.
