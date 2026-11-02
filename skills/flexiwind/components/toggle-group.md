## Demo

```html
<div x-data="{ marks: ['bold'], align: 'left' }" class="flex flex-col items-center gap-4">
    <div role="toolbar" aria-label="Text formatting" class="flex items-center gap-2">
        <x-ui.toggle-group type="multiple" label="Text style" x-model="marks">
            <x-ui.toggle-group.item value="bold" aria-label="Bold"><x-ui.icon name="ph--text-b" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="italic" aria-label="Italic"><x-ui.icon name="ph--text-italic" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="underline" aria-label="Underline"><x-ui.icon name="ph--text-underline" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="strike" aria-label="Strikethrough"><x-ui.icon name="ph--text-strikethrough" /></x-ui.toggle-group.item>
        </x-ui.toggle-group>
        <x-ui.toggle-group label="Alignment" required x-model="align">
            <x-ui.toggle-group.item value="left" aria-label="Align left"><x-ui.icon name="ph--text-align-left" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="center" aria-label="Align center"><x-ui.icon name="ph--text-align-center" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="right" aria-label="Align right"><x-ui.icon name="ph--text-align-right" /></x-ui.toggle-group.item>
        </x-ui.toggle-group>
    </div>
    <p class="w-72 rounded-ui border border-dashed border-border-strong bg-background px-3.5 py-3 text-title-foreground"
        :style="{ fontWeight: marks.includes('bold') ? 650 : 400, fontStyle: marks.includes('italic') ? 'italic' : 'normal', textDecoration: [marks.includes('underline') && 'underline', marks.includes('strike') && 'line-through'].filter(Boolean).join(' ') || 'none', textAlign: align }">
        Ship components, not configuration.
    </p>
</div>
```

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

```html
<div class="flex flex-col items-center gap-4">
    <x-ui.toggle-group variant="segmented" label="Range" value="week" required
        :options="['day' => 'Day', 'week' => 'Week', 'month' => 'Month', 'year' => 'Year']" />
    <x-ui.toggle-group variant="segmented" label="Layout" value="grid" required>
        <x-ui.toggle-group.item value="grid" aria-label="Grid"><x-ui.icon name="ph--squares-four" /></x-ui.toggle-group.item>
        <x-ui.toggle-group.item value="list" aria-label="List"><x-ui.icon name="ph--list" /></x-ui.toggle-group.item>
    </x-ui.toggle-group>
</div>
```

## Outline

Buttons sharing their borders: only the ends of the group are rounded.

```html
<x-ui.toggle-group variant="outline" label="Visibility" value="team" required>
    <x-ui.toggle-group.item value="public"><x-ui.icon name="ph--globe" /> Public</x-ui.toggle-group.item>
    <x-ui.toggle-group.item value="team"><x-ui.icon name="ph--users" /> Team</x-ui.toggle-group.item>
    <x-ui.toggle-group.item value="private"><x-ui.icon name="ph--lock" /> Private</x-ui.toggle-group.item>
</x-ui.toggle-group>
```

## Vertical

```html
<x-ui.toggle-group orientation="vertical" label="Density" value="default" required size="sm" class="w-52">
    <x-ui.toggle-group.item value="compact">Compact</x-ui.toggle-group.item>
    <x-ui.toggle-group.item value="default">Default</x-ui.toggle-group.item>
    <x-ui.toggle-group.item value="comfortable">Comfortable</x-ui.toggle-group.item>
</x-ui.toggle-group>
```

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

## Public Docs

`https://flexiwind.unoforge.com/components/toggle-group`
