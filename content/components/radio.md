---
title: "Radio"
group: "Actions & Inputs"
order: 70
tier: "free"
description: "Single-choice form control for mutually exclusive options in a named group."
seoDescription: "Create single-selection controls with Flexiwind's radio component."
keywords: "radio, selection, form, options"
---

## Demo

::preview{example="radio/demo" inline}

## Installation

```bash
php artisan flexi:add radio
```

## Disabled

::preview{example="radio/disabled" inline}

## Colors

Same tokens as the checkbox: the fill is `--checkbox-checked-color`, the dot is `--checkbox-mark-color`; `--radio-dot-size` sets its size (37.5% by default).

::preview{example="radio/colors" inline}

## Best Practices

- Keep option labels short and mutually exclusive.
- Preselect a sensible default when possible.
- Use a clear group label so the choice context is obvious.

## API

| Prop | Description |
| --- | --- |
| `id` (string\|null) | Input id. Falls back to `name` if omitted. |
| `name` (string) | Shared group name for mutually exclusive selection. |
| `value` (string) | Submitted value for this option. |
| `checked` (boolean) | Marks this option as selected by default. |
| `disabled` (boolean) | Disables the radio option. |
| `size` (sm\|md\|lg) | Controls control size. |
| `invalid` (boolean) | Marks the radio invalid (`data-invalid`, `aria-invalid`). |
| `label` (string) | Optional inline label rendered with the radio. |
