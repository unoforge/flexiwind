---
title: "Icon"
group: "Typography"
order: 10
tier: "free"
description: "Reusable icon component using Iconify for consistent iconography across the UI."
seoDescription: "Display icons consistently with Flexiwind's icon component."
keywords: "icon, iconify, svg, symbol"
---

## Demo

::preview{example="icon/demo" inline}

## Installation

```bash
php artisan flexi:add icon
```

## Usage

The Icon component provides a simple wrapper around Iconify icons. Use the `name` prop to specify the icon class, `size` for predefined sizes, and `intent` for semantic colors.

## Examples

### Sizes

::preview{example="icon/sizes" inline}

### Intents

::preview{example="icon/common" inline}

## API

| Prop | Description |
| --- | --- |
| `name` (string) | The Iconify icon class name (e.g., ph--house, ph--user). |
| `size` (xs\|sm\|md\|lg\|xl\|2xl) | Predefined size for the icon. |
| `intent` (fg\|muted\|primary\|secondary\|success\|warning\|destructive) | Semantic color intent for the icon. |
| `class` (string) | Additional CSS classes for custom styling. |
