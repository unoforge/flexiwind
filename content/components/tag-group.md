---
title: "Tag group"
group: "Actions & Inputs"
order: 54
tier: "free"
state: "new"
description: "Short labels to show, remove, or pick as filters."
seoDescription: "Tag group for Laravel Blade and Livewire with Tailwind CSS: removable tags, selectable filter chips, icons, dots, avatars and counts."
keywords: "tag group, tags, chips, filter chips, removable tags, livewire tags"
---

## Demo

::preview{example="tag-group/demo" inline}

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

::preview{example="tag-group/selectable" inline}

Without `multiple`, one tag at a time; pressing it again clears the value.

::preview{example="tag-group/single" inline}

## Variants

Soft by default, `outline` or `solid`, in three sizes. A tag takes an icon, a dot, an avatar or a count. Every variant works with `removable` and `selectable`: try them below.

::preview{example="tag-group/variants" inline}

## From an array

`options` takes the same shapes as the [listbox](/components/listbox): a list, `value => label`, rows or enums.

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
