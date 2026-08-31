## Demo

```html
<div class="flex flex-col gap-8 w-full">
    <x-ui.progress max="9" value="4" class="text-primary" />
    <x-ui.progress max="100" value="60" class="text-secondary" />
    <x-ui.progress max="40" value="20" class="text-destructive" />
</div>
```

## Installation

```shell
php artisan flexi:add progress
```

## Public Docs

`https://flexiwind.unoforge.com/components/progress`

## API

| Prop | Description |
| --- | --- |
| value (number) | Current completion value |
| max (number) | Total target value |
| size (2xs\|xs\|sm\|md\|lg\|xl) | Controls bar thickness |
| radius (boolean) | Controls rounded corners. Default: true |

## Guidance

- Use `class="text-{intent}"` to color the progress bar (e.g., `text-primary`, `text-success`).
- Progress is determinate (requires value + max) -- use Skeleton for indeterminate loading.

## Avoid

- Do not use Progress for unknown/indeterminate loading states — use Skeleton instead.
- Do not omit `max` — it is required for correct percentage calculation.
