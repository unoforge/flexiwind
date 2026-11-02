---
title: "Switch"
group: "Actions & Inputs"
order: 80
tier: "free"
description: "An on/off control for settings that apply right away."
seoDescription: "Accessible toggle switch for Laravel Blade and Livewire with Tailwind CSS: labels, descriptions, sizes and colors."
keywords: "switch, toggle, boolean, setting, livewire switch"
---

## Demo

::preview{example="switch/demo" inline}

## Installation

```bash
php artisan flexi:add switch
```

The switch is a native checkbox with `role="switch"`: it submits with a form, works with `wire:model` and needs no JavaScript.

Use a switch for a setting that takes effect at once, and a [checkbox](/components/checkbox) for a choice confirmed by a submit button.

## With a label

`label` wraps the switch and its text in one `<label>`: the whole line toggles it, no `id` needed. `description` adds a second line, linked with `aria-describedby`.

::preview{example="switch/with-label" inline}

## Settings list

`reverse` puts the text first and the switch at the end of the line.

::preview{example="switch/settings" inline}

## Sizes

::preview{example="switch/sizes" inline}

## Colors

`track` colors the switch when it is on. It takes `title`, `muted` or any theme color: `success`, `warning`, `destructive`…

::preview{example="switch/colors" inline}

## Outlined

::preview{example="switch/outlined" inline}

## With Livewire

```blade
<x-ui.switch wire:model.live="notifications" label="Notifications" />
```

Attributes you pass, `wire:model` included, go to the input.

## References

### Switch props

| Prop | Description |
| --- | --- |
| `name`, `value`, `id` (string) | Passed to the input. |
| `checked` (boolean) | On at first. |
| `disabled` (boolean) | Can't be toggled. |
| `label` (string) | Text next to the switch. The slot can replace it. |
| `description` (string) | Second line under the label. |
| `reverse` (boolean) | Text first, switch at the end of a full-width line. |
| `size` (xs\|sm\|md\|lg) | Default: `md`. |
| `outlined` (boolean) | Adds a ring around the switch. |
| `bg` (string) | Color when off. Default: `border-strong` (`muted` when outlined). |
| `track` (string) | Color when on. Default: `primary`. |
| `knob` (string) | Knob color. Default: `white`. |
| `knob-checked` (string) | Knob color when on. Default: `--switch-knob-checked-color` (the theme's `--primary-foreground`) on the theme track, so it stays visible on a light primary; the `knob` color otherwise. |

Color props take `bg`, `surface`, `muted`, `title`, `neutral`, `white`, `transparent` or a theme color name such as `success`.

## Styling

Classes go to the input. A `bg-*` class replaces the off color, a `text-*` color replaces the on color, and these custom properties tune the knob:

| Property | Description |
| --- | --- |
| `--knob-bg` | Knob color. |
| `--knob-bg-checked` | Knob color when on. |
| `--switch-knob-checked-color` | Theme token: knob color when on, on the default track. Every theme sets it to `var(--primary-foreground)`. |
| `--knob-size`, `--knob-width`, `--knob-height` | Knob size. |
| `--knob-radius` | Knob radius. Default: `9999px`. |
| `--toggle-radius` | Switch radius. Default: `9999px`. |

```blade
<x-ui.switch name="square" class="bg-muted text-success [--toggle-radius:6px] [--knob-radius:4px]" aria-label="Square switch" />
```

## Accessibility

- The input has `role="switch"`: screen readers announce "on" and "off".
- Without `label`, give the switch an `aria-label` or point a `<label for>` at its `id`.
- Space toggles it; the focus ring shows only for keyboard focus.
- The knob stops sliding when the system asks for reduced motion.
