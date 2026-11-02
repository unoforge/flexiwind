## Demo

```html
<div class="flex items-center gap-1">
    <x-ui.toggle icon-only pressed aria-label="Star"><x-ui.icon name="ph--star" /></x-ui.toggle>
    <x-ui.toggle icon-only aria-label="Notifications"><x-ui.icon name="ph--bell" /></x-ui.toggle>
    <x-ui.toggle icon-only aria-label="Pin"><x-ui.icon name="ph--push-pin" /></x-ui.toggle>
    <x-ui.toggle icon-only pressed aria-label="Watch"><x-ui.icon name="ph--eye" /></x-ui.toggle>
</div>
```

## Installation

```bash
php artisan flexi:add toggle
```

No plugin needed: Alpine keeps the state. Like a [switch](https://flexiwind.unoforge.com/components/switch) it holds one yes/no value, but it looks like the buttons around it — toolbars, cards, headers.

```blade
<x-ui.toggle wire:model.live="starred" icon-only aria-label="Star">
    <x-ui.icon name="ph--star" />
</x-ui.toggle>
```

## With text

The label stays the same when pressed: `aria-pressed` already tells the state.

```html
<div class="flex flex-col items-start gap-3">
    <x-ui.toggle variant="outline"><x-ui.icon name="ph--star" /> Star</x-ui.toggle>
    <x-ui.toggle pressed><x-ui.icon name="ph--push-pin" /> Pin to sidebar</x-ui.toggle>
    <x-ui.toggle variant="primary"><x-ui.icon name="ph--bell" /> Notify me</x-ui.toggle>
</div>
```

## Variants and sizes

```html
<div class="flex flex-col gap-4">
    @foreach (['ghost', 'outline', 'primary'] as $variant)
        <div class="flex items-center gap-3">
            <span class="w-16 text-xs text-muted-foreground">{{ ucfirst($variant) }}</span>
            <x-ui.toggle :variant="$variant" icon-only size="sm" aria-label="Bold, small"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only pressed aria-label="Bold"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only size="lg" aria-label="Bold, large"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only disabled aria-label="Bold, disabled"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
        </div>
    @endforeach
</div>
```

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

## Public Docs

`https://flexiwind.unoforge.com/components/toggle`
