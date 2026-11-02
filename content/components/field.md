---
title: "Field"
group: "Actions & Inputs"
order: 35
tier: "free"
description: "Form field wrapper with label, hint, error message and required indicator."
seoDescription: "Compose accessible Laravel forms with the Flexiwind field wrapper."
keywords: "field, form, label, validation, error message"
---

`x-ui.field` wraps any form control with label, hint, error message,
and required indicator. It is the recommended way to build forms that need validation,
helper text, or consistent layout in grids.

## Demo

::preview{example="field/demo" inline}

## Installation

```bash
php artisan flexi:add field
```

## With error

Pass an error string to display validation feedback. The hint is automatically hidden
when an error is present. The inner input must manage its own `invalid` prop for the red border styling.

::preview{example="field/with-error" inline}

## In grid layouts

Each field naturally takes its grid cell. No extra wrappers or `group-wrapper-class` workarounds needed.

::preview{example="field/grid" inline}

## Guidance

- The control inside the slot must manage its own `invalid` state — field only handles label + hint + error display.
- Always pass `id` to the input and match it with `for` on the field.
- Error overrides hint — when `error` is set, hint is automatically hidden.
- Use `required` to show the asterisk; the control itself still needs `required` or Livewire validation.
- For simple standalone fields without hint/error, the built-in `label` prop on input/textarea/select is sufficient.

## Livewire

```bash
<x-ui.field label="Email" for="email" :error="$errors->first('email')">
    <x-ui.input type="email" id="email" wire:model="email" :invalid="$errors->has('email')" />
</x-ui.field>
```

## API

| Prop | Description |
| --- | --- |
| `label` (string\|null) | Label text displayed above the control. Default: null |
| `for` (string\|null) | `for` attribute on the label (matches the input's `id`). |
| `hint` (string\|null) | Helper text in muted color below the control. Hidden when `error` is set. |
| `error` (string\|bool\|null) | Error text in destructive color below the control. Replaces hint. Boolean `true` hides hint without showing text. |
| `required` (boolean) | Adds a red asterisk next to the label. |
| `labelClass` (string) | Extra classes on the label element. |
| `class` (string) | Extra classes on the wrapper div. Useful for grid span classes like `col-span-full`. |

## Avoid

- Do not pass `label` to the inner input when using `x-ui.field` — use the field's `label` prop instead.
- Do not use `group-wrapper-class` on inputs inside `x-ui.field` — the field handles layout.
