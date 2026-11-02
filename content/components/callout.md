---
title: "Callout"
group: "Data & Feedback"
order: 50
tier: "free"
description: "Attention-grabbing box for tips, warnings, or notes."
seoDescription: "Implement callout for user with Flexiwind's callout component."
keywords: "callout, banner, note, highlight"
---

## Demo

::preview{example="callout/demo" inline}

## Installation

```bash
php artisan flexi:add callout
```

## API

| Prop | Description |
| --- | --- |
| `type` (default\|update\|note\|warning\|important) | Defines semantic tone and default icon/intent mapping. |
| `intent` (string) | Overrides default type intent when custom coloring is needed. |
| `variant` (solid\|soft\|subtle\|outline\|default) | Visual style inherited from alert primitives. |
| `size` (xs\|sm\|default\|lg) | Controls spacing and typography density. |
| `title` / `message` | Quick title/message API when not using slot composition. |
| `icon` (boolean) | Controls leading icon visibility. Default: true |
| `iconWrapper` (string) | Additional classes for icon container customization. |

## Examples

### Message

::preview{example="callout/message" inline}

### With Title

::preview{example="callout/with-title" inline}
