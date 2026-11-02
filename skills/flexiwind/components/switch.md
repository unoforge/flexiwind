## Demo

```html
<div class="flex flex-wrap items-center gap-4">
    <x-ui.switch name="wifi" checked aria-label="Wi-Fi" />
    <x-ui.switch name="bluetooth" aria-label="Bluetooth" />
    <x-ui.switch name="airplane" checked disabled aria-label="Airplane mode" />
</div>
```

## Installation

```shell
php artisan flexi:add switch
```

A native checkbox with `role="switch"`: it submits with forms, works with `wire:model`, needs no JavaScript.

## With label

`label` wraps the switch and its text in one `<label>` (no `id` needed). `description` adds a second line linked by `aria-describedby`. The slot can replace `label`.

```html
<x-ui.switch name="digest" checked label="Weekly digest" description="A summary of your projects every Monday." />
```

## Settings list

`reverse` puts the text first and the switch at the end of a full-width line.

```html
<div class="divide-y divide-border rounded-ui border border-border">
    <div class="p-4">
        <x-ui.switch reverse name="email_notifications" label="Email notifications" description="Receive updates about your account." />
    </div>
</div>
```

## Sizes and colors

```html
<x-ui.switch size="xs" name="a" label="Extra small" />
<x-ui.switch size="lg" name="b" label="Large" />
<x-ui.switch name="c" checked track="success" aria-label="Success" />
<x-ui.switch outlined name="d" aria-label="Outlined" />
```

## Livewire

```html
<x-ui.switch wire:model.live="notifications" label="Notifications" />
```

## Props

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| name, value, id | string | — | Passed to the input. No id is generated. |
| checked | boolean | false | On at first |
| disabled | boolean | false | Can't be toggled |
| label | string | — | Text next to the switch (or the slot) |
| description | string | — | Second line under the label |
| reverse | boolean | false | Text first, switch at the end |
| size | string | md | xs, sm, md, lg |
| outlined | boolean | false | Ring around the switch |
| bg | string | border-strong | Color when off (`muted` when outlined) |
| track | string | primary | Color when on |
| knob | string | white | Knob color |
| knob-checked | string | knob | Knob color when on |

Color props accept `bg`, `surface`, `muted`, `title`, `neutral`, `white`, `transparent`, or any theme color name (`success`, `warning`, `destructive`, `gray-500`…) used as `var(--color-<name>)`.

## Styling

Classes go to the input. A `bg-*` class replaces the off color, a `text-<color>` class the on color, `[--knob-bg:…]` the knob: the component then drops its own default for that part. Other custom properties: `--knob-bg-checked`, `--knob-size`, `--knob-radius`, `--toggle-radius`.

## Avoid

- Do not leave a switch without a name for assistive tech: use `label`, `aria-label`, or a `<label for>` pointing at an `id`.
- Do not use a switch for a choice that only applies after a submit button — use a checkbox.
