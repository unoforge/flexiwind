## Demo

```html
<x-ui.tag-group label="Labels" removable class="w-full max-w-sm">
    <x-ui.tag value="design">Design</x-ui.tag>
    <x-ui.tag value="frontend">Frontend</x-ui.tag>
    <x-ui.tag value="laravel">Laravel</x-ui.tag>
    <x-ui.tag value="urgent" label="Urgent"><x-ui.tag.dot class="text-destructive" /> Urgent</x-ui.tag>
</x-ui.tag-group>
```

## Installation

```bash
php artisan flexi:add tag-group
```

Register the plugin once:

```js
import { TagsPlugin } from "./plugins/tags";

Alpine.plugin(TagsPlugin);
```

## Removable

With `removable`, each tag carries a remove button named after it. Backspace or Delete removes the focused tag and focus moves to its neighbour. The value is the list of tags left.

```blade
<x-ui.tag-group label="Labels" removable wire:model="labels">
    <x-ui.tag value="design">Design</x-ui.tag>
    <x-ui.tag value="urgent" label="Urgent"><x-ui.tag.dot class="text-destructive" /> Urgent</x-ui.tag>
</x-ui.tag-group>
```

## Selectable

`selectable` turns tags into toggle buttons. Add `multiple` to pick several: the value is an array.

```html
<div x-data="{ status: ['open', 'review'] }" class="flex w-full max-w-sm flex-col gap-3">
    <x-ui.tag-group label="Status" selectable multiple variant="outline" x-model="status">
        <x-ui.tag value="open" label="Open">Open <x-ui.tag.count>12</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="review" label="In review">In review <x-ui.tag.count>4</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="merged" label="Merged">Merged <x-ui.tag.count>31</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="closed" label="Closed">Closed <x-ui.tag.count>7</x-ui.tag.count></x-ui.tag>
    </x-ui.tag-group>
    <code class="text-xs text-muted-foreground" x-text="JSON.stringify(status)"></code>
</div>
```

Without `multiple`, one tag at a time; pressing it again clears the value.

```html
<x-ui.tag-group label="Plan" selectable value="team" size="lg">
    <x-ui.tag value="solo">Solo</x-ui.tag>
    <x-ui.tag value="team">Team</x-ui.tag>
    <x-ui.tag value="enterprise">Enterprise</x-ui.tag>
</x-ui.tag-group>
```

## Variants

Soft by default, `outline` or `solid`, in three sizes. A tag takes an icon, a dot, an avatar or a count. Every variant works with `removable` and `selectable`: try them below.

```html
<div class="flex flex-col gap-4">
    <x-ui.tag-group label="Soft — removable" removable>
        <x-ui.tag value="draft">Draft</x-ui.tag>
        <x-ui.tag value="laravel" label="laravel"><x-ui.icon name="ph--hash" size="xs" /> laravel</x-ui.tag>
        <x-ui.tag value="live" label="Live"><x-ui.tag.dot class="text-success" /> Live</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Outline — pick several" variant="outline" selectable multiple value="alice">
        <x-ui.tag value="alice" label="Alice"><x-ui.tag.avatar src="https://i.pravatar.cc/40?u=alice" /> Alice</x-ui.tag>
        <x-ui.tag value="issues" label="Issues">Issues <x-ui.tag.count>12</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="docs" label="Docs"><x-ui.icon name="ph--book-open" size="xs" /> Docs</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Solid — removable" variant="solid" removable>
        <x-ui.tag value="new">New</x-ui.tag>
        <x-ui.tag value="featured" label="Featured"><x-ui.icon name="ph--star-fill" size="xs" /> Featured</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Sizes — pick one" selectable value="md">
        <x-ui.tag value="sm" size="sm">Small</x-ui.tag>
        <x-ui.tag value="md">Medium</x-ui.tag>
        <x-ui.tag value="lg" size="lg">Large</x-ui.tag>
    </x-ui.tag-group>
</div>
```

## From an array

`options` takes the same shapes as the [listbox](https://flexiwind.unoforge.com/components/listbox): a list, `value => label`, rows or enums.

```blade
<x-ui.tag-group selectable multiple wire:model.live="status" :options="$statuses" option-value="id" option-label="name" />
```

## Radius

Tags follow the theme: their radius is `--radius-ui` minus one spacing unit, the radius of an element set inside a field. Change `--ui-radius` and tags follow.

## References

### Tag group props

| Prop | Description |
| --- | --- |
| `label` (string) | Visible name of the group, also its accessible name. |
| `selectable` (boolean) | Tags become buttons to press. |
| `multiple` (boolean) | With `selectable`, several values. |
| `removable` (boolean) | Each tag gets a remove button. |
| `value` (string\|array) | Starting value, outside Livewire. |
| `name` (string) | One hidden `name[]` field per value, for plain forms. |
| `options`, `option-value`, `option-label` | Tags from an array. |
| `variant` (soft\|outline\|solid), `size` (sm\|md\|lg) | Passed to every tag. |
| `remove-label` (string) | Name of remove buttons. Default: `Remove :label`. |
| `disabled` (boolean) | Nothing can be pressed or removed. |

### Tag parts

| Part | Description |
| --- | --- |
| `x-ui.tag` | `value`, `label` (when the slot holds more than text), `variant`, `size`. |
| `x-ui.tag.dot` | A color dot: set its color with a `text-*` class. |
| `x-ui.tag.count` | A number at the end. |
| `x-ui.tag.avatar` | An image with `src`, or initials in the slot. |

## Accessibility

- Selectable tags are buttons with `aria-pressed`; remove buttons are named after their tag.
- One Tab stop for the group; arrows, Home and End move inside.
- Labels are written as text, never as HTML.

## Public Docs

`https://flexiwind.unoforge.com/components/tag-group`
