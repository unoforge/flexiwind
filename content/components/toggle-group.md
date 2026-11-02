---
title: "Toggle group"
group: "Actions & Inputs"
order: 83
tier: "free"
state: "new"
description: "Pressed buttons that work together: toolbars, segmented controls, view switchers."
seoDescription: "Toggle group and segmented control for Laravel Blade and Livewire with Tailwind CSS: single or multiple values, keyboard navigation."
keywords: "toggle group, segmented control, button group, toolbar, view switcher, livewire segmented control"
---

## Demo

::preview{example="toggle-group/demo" inline}

## Installation

```bash
php artisan flexi:add toggle-group
```

```js
import { ToggleGroupPlugin } from "./plugins/toggle-group";

Alpine.plugin(ToggleGroupPlugin);
```

`type="single"` (the default) keeps one value, like radio buttons; `required` keeps it from being cleared. `type="multiple"` keeps an array. `wire:model` receives a string or an array.

```blade
<x-ui.toggle-group type="multiple" label="Text style" wire:model.live="marks">
    <x-ui.toggle-group.item value="bold" aria-label="Bold"><x-ui.icon name="ph--text-b" /></x-ui.toggle-group.item>
    <x-ui.toggle-group.item value="italic" aria-label="Italic"><x-ui.icon name="ph--text-italic" /></x-ui.toggle-group.item>
</x-ui.toggle-group>
```

## Segmented

The muted rail and raised thumb of the tabs. Items can come from `options`.

::preview{example="toggle-group/segmented" inline}

## Outline

Buttons sharing their borders: only the ends of the group are rounded.

::preview{example="toggle-group/outline" inline}

## Vertical

::preview{example="toggle-group/vertical" inline}

## Radius

Items set inside the group's rail (`ghost`, `segmented`) take `--radius-ui` minus the rail's padding (`--toggle-group-padding`); `outline` rounds only its ends with `--radius-ui`. Nothing is hard-coded: change `--ui-radius` and the group follows.

## References

| Prop | Description |
| --- | --- |
| `type` (single\|multiple) | Default: `single`. |
| `required` (boolean) | With `single`, the value can't be cleared. |
| `label` (string) | Accessible name of the group. |
| `value` (string\|array), `name` (string) | Outside Livewire: starting value, hidden fields. |
| `options`, `option-value`, `option-label`, `option-icon` | Items from an array. |
| `variant` (ghost\|outline\|segmented) | Default: `ghost`. |
| `size` (sm\|md\|lg), `orientation` (horizontal\|vertical) | |
| `disabled` (boolean) | |

`x-ui.toggle-group.item` takes `value` and `disabled`. An icon-only item needs `aria-label`.

## Accessibility

- `single` is a `radiogroup` of `radio` items (`aria-checked`); `multiple` a `group` of buttons with `aria-pressed`.
- One Tab stop; arrows, Home and End move inside. In `single`, moving also picks, like radio buttons.
