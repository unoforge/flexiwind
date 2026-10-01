---
title: "Breadcrumbs"
group: "Navigation"
order: 30
tier: "free"
description: "Hierarchical navigation trail showing current location and quick parent navigation."
seoDescription: "Implement navigation breadcrumbs to improve user orientation."
keywords: "breadcrumbs, path, navigation, hierarchy"
---

## Demo

::preview{example="breadcrumbs/demo"}

## Installation

Install the component:

```bash
php artisan flexi:add breadcrumbs
```

## Examples

### With Icon

::preview{example="breadcrumbs/with-icon"}

### Outline wrapper

::preview{example="breadcrumbs/outline"}

### Custom indicator

::preview{example="breadcrumbs/custom-indicator"}

## Structure

- `x-ui.breadcrumbs` wraps the trail and sets navigation semantics.
- `x-ui.breadcrumbs.item` renders each crumb and separator.
- `x-ui.breadcrumbs.separator` customizes the visual divider between items.

## API Highlights

| Prop | Description |
| --- | --- |
| `spacing` (on breadcrumb and item) | Controls spacing between items and separators. |
| `href` (item) | If provided and item is not active, renders as a link. |
| `active` (item) | Marks current page and removes separator. |
| `separator` (item/separator) | Changes separator icon or custom text/markup. |
| `separatorNotIcon` (item) | Renders separator content as plain text/html instead of icon class. |
