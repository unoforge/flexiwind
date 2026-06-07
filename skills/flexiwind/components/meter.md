## Demo

```html
<div class="flex flex-col gap-8 w-full">
    <x-ui.meter max="9" value="4" class="text-primary" />
    <x-ui.meter max="100" value="60" class="text-secondary" />
    <x-ui.meter max="40" value="20" class="text-danger" />
</div>
```

## Installation

```shell
php artisan flexi:add meter
```

## Public Docs

`https://flexiwind.unoforge.com/components/meter`

## API

| Prop | Description |
| --- | --- |
| value (number) | Current measured value |
| min (number) | Minimum bound for the scale |
| max (number) | Maximum bound for the scale |
| size (2xs\|xs\|sm\|md\|lg\|xl) | Controls bar height |
| radius (boolean) | Controls rounded style. Default: true |

## Guidance

- Meter represents a range-based value (like usage, score, capacity).
- Progress is for task completion; Meter is for range-based metrics.
- Use `class="text-{intent}"` for coloring.

## Avoid

- Do not use Meter for task completion — use Progress instead.
- Do not omit `min` — without it, the minimum defaults to 0, which may not match your data.
