---
title: "Toggle"
group: "Actions & Inputs"
order: 82
tier: "free"
state: "new"
description: "A button that stays pressed."
seoDescription: "Toggle button for Laravel Blade and Livewire with Tailwind CSS: aria-pressed, icon or text, ghost, outline and primary variants."
keywords: "toggle, toggle button, pressed button, aria-pressed, livewire toggle"
---

## Demo

::preview{example="toggle/demo" inline}

## Installation

```bash
php artisan flexi:add toggle
```

No plugin needed: Alpine keeps the state. Like a [switch](/components/switch) it holds one yes/no value, but it looks like the buttons around it — toolbars, cards, headers.

```blade
<x-ui.toggle wire:model.live="starred" icon-only aria-label="Star">
    <x-ui.icon name="ph--star" />
</x-ui.toggle>
```

## With text

The label stays the same when pressed: `aria-pressed` already tells the state.

::preview{example="toggle/with-text" inline}

## Variants and sizes

::preview{example="toggle/variants" inline}

## References

| Prop | Description |
| --- | --- |
| `pressed` (boolean) | Pressed at first, outside Livewire. |
| `variant` (ghost\|outline\|primary) | Default: `ghost`. |
| `size` (sm\|md\|lg) | Default: `md`. |
| `icon-only` (boolean) | Square button. Give it an `aria-label`. |
| `name`, `value` | A hidden field sends `value` (default `1`) while pressed. |
| `disabled` (boolean) | |

The radius is the theme's `--radius-ui`, like buttons and inputs.

## Accessibility

- A real `<button>` with `aria-pressed`.
- An icon-only toggle needs `aria-label`.
