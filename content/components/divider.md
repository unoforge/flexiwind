---
title: "Divider"
group: "Layout & Structure"
order: 20
tier: "free"
description: "Horizontal separator with optional labeled content and alignment controls."
seoDescription: "Add visual separation between content with Flexiwind's divider component."
keywords: "divider, separator, hr, line, spacing"
---

## Demo

::preview{example="divider/demo" inline}

## Installation

```bash
php artisan flexi:add divider
```

## With label

::preview{example="divider/with-label" inline}

## Usage Notes

- Use subtle spacing around dividers to avoid cramped layouts.
- Use labeled dividers to introduce sections like "Or continue with".
- Avoid stacking multiple dividers back-to-back.

## API

| Prop | Description |
| --- | --- |
| `size` (default\|2\|3) | Controls divider thickness. |
| `label` (string\|null) | If provided, renders a labeled divider instead of a plain `hr`. |
| `labelPlacement` (start\|middle\|end) | Aligns the label across the divider line. |
| `labelClass` (string) | Additional classes for the label element. |
