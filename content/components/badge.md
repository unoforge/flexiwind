---
title: "Badge"
group: "Data & Feedback"
order: 30
tier: "free"
description: "Compact status indicator for counts, labels, or categories."
seoDescription: "Add status indicators and notifications with Flexiwind's badge component."
keywords: "badge, tag, pill, status"
---

## Demo

::preview{example="badge/demo" inline}

## Installation

```bash
php artisan flexi:add badge
```

## API

| Prop | Description |
| --- | --- |
| `variant` (solid\|soft\|subtle\|outline\|default) | Visual style of the badge. |
| `intent` (string) | Semantic color intent for the selected variant. |
| `size` (xs\|sm\|default\|lg) | Controls badge size and text rhythm. |
| `radius` (string) | Rounding token applied through utility classes. |

## Examples

### Variants

### Solid

::preview{example="badge/solid" inline}

### Outline

::preview{example="badge/outline" inline}

### Soft

::preview{example="badge/soft" inline}

### Subtle

::preview{example="badge/subtle" inline}

### With icon

::preview{example="badge/with-icon" inline}
