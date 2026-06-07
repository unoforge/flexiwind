## Demo

```html
<div class="flex flex-col gap-4 w-full">
    <x-ui.divider class="border-primary"/>
    <x-ui.divider class="border-secondary"/>
    <x-ui.divider class="border-danger"/>
    <x-ui.divider class="border-gray"/>
</div>
```

## Installation

```shell
php artisan flexi:add divider
```

## With label

```html
<x-ui.divider label="Label Start" class="before:bg-bg-muted" label-class="pr-3 bg-bg text-fg relative"/>
<x-ui.divider label="Label Center" class="before:bg-bg-muted" label-placement="middle" label-class="px-3 bg-bg text-fg relative"/>
<x-ui.divider label="Label End" class="before:bg-bg-muted" label-placement="end" label-class="pl-3 bg-bg text-fg relative"/>
```

## API

| Prop | Description |
| --- | --- |
| size (default\|2\|3) | Divider thickness |
| label (string\|null) | Renders a labeled divider when provided |
| labelPlacement (start\|middle\|end) | Label alignment across the divider line |
| labelClass (string) | Additional classes for the label element |

## Guidance

- Use subtle spacing around dividers to avoid cramped layouts.
- Use labeled dividers to introduce sections like "Or continue with".

## Avoid

- Do not stack multiple dividers back-to-back.
- Do not use `label-placement` without a `label` — it has no effect.
