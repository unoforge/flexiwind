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

## Colors

The box is `--checkbox-checked-color`, the mark is `--checkbox-mark-color` (`--primary-foreground` by default, so it always reads on the primary fill). The mark is drawn with a CSS mask, so any color works, even a light box with a colored check. `invalid` paints the border in the error color.

::preview{example="checkbox/colors" inline}

| Token | Default | Role |
| --- | --- | --- |
| `--checkbox-checked-color` | `var(--primary)` | Fill when checked. |
| `--checkbox-mark-color` | `var(--primary-foreground)` | Check, dash and radio dot. |
| `--checkbox-bg` | `var(--background)` | Fill when unchecked. |
| `--ui-checkbox-invalid-color` | `var(--destructive)` | Border and focus ring when invalid. |

## API

| Prop | Description |
| --- | --- |
| `id` (string\|null) | Input id. If omitted, `name` is used. |
| `name` (string) | Input name attribute. |
| `value` (string) | Submitted value when checked. |
| `checked` (boolean) | Sets initial checked state. |
| `disabled` (boolean) | Disables interaction and applies disabled styles. |
| `size` (sm\|md\|lg) | Controls checkbox visual size. |
| `invalid` (boolean) | Marks the checkbox invalid (`data-invalid`, `aria-invalid`). |
| `label` (string) | Optional inline label rendered next to the checkbox. |

## Accessibility

- Always provide a meaningful label, either via `label` or an external label element.
- For grouped checkboxes, wrap related options in a `fieldset` with a clear legend.
- Avoid using color alone to communicate checked or error states.
