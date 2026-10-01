---
title: "Checkbox"
group: "Actions & Inputs"
order: 60
tier: "free"
description: "Form control for independent or multi-select choices with optional inline labels and sizing."
seoDescription: "Implement multiple selection controls with Flexiwind's checkbox component."
keywords: "checkbox, check, form, multi-select"
---

## Demo

::preview{example="checkbox/demo" inline}

## Installation

```bash
php artisan flexi:add checkbox
```

## API

| Prop | Description |
| --- | --- |
| `id` (string\|null) | Input id. If omitted, `name` is used. |
| `name` (string) | Input name attribute. |
| `value` (string) | Submitted value when checked. |
| `checked` (boolean) | Sets initial checked state. |
| `disabled` (boolean) | Disables interaction and applies disabled styles. |
| `size` (sm\|md\|lg) | Controls checkbox visual size. |
| `label` (string) | Optional inline label rendered next to the checkbox. |

## Accessibility

- Always provide a meaningful label, either via `label` or an external label element.
- For grouped checkboxes, wrap related options in a `fieldset` with a clear legend.
- Avoid using color alone to communicate checked or error states.
