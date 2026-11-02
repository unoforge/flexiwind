---
title: "Listbox"
group: "Actions & Inputs"
order: 51
tier: "free"
state: "new"
description: "A select you can style: one or several values, search, icons, avatars and groups."
seoDescription: "Custom select and multi-select for Laravel Blade and Livewire with Tailwind CSS: search, icons, avatars, groups, keyboard support."
keywords: "listbox, custom select, multi select, multiselect, combobox, dropdown select, livewire select"
---

## Demo

::preview{example="listbox/demo" inline}

## Installation

```bash
php artisan flexi:add listbox
```

This adds the Blade views under `resources/views/components/ui/listbox`, the `App\Flexiwind\OptionList` helper and the plugin `resources/js/plugins/listbox.js`, which drives [Flexilla Select](https://flexilla.unoforge.com/docs/components/select). Register it once:

```js
import { ListboxPlugin } from "./plugins/listbox";

Alpine.plugin(ListboxPlugin);
```

The trigger is the input and the panel is the dropdown: same heights, borders and focus ring as `x-ui.input`, same items as `x-ui.dropdown`. A theme that restyles one restyles the others. For a plain native control, [Select](/components/select) is still there.

## Composition

Every piece is a component you can place, restyle or replace. Without them, `<x-ui.listbox>` builds a standard field from its props; bring your own `<x-ui.listbox.content>` and the composition is yours:

```blade
<x-ui.listbox wire:model.live="owner">
    <x-ui.label>Owner</x-ui.label>

    <x-ui.listbox.trigger>
        <x-ui.listbox.value placeholder="Choose an owner">
            {{-- The template of the selected value: Flexilla bindings --}}
            <span data-bind="initials" data-bind-style="badge"></span>
            <span data-bind="label"></span>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Search team members" />
        <x-ui.listbox.list>
            <x-ui.listbox.item value="alice" data-initials="AJ" data-badge="background-color:#fde68a">
                <x-ui.listbox.avatar>AJ</x-ui.listbox.avatar>
                <x-ui.listbox.label>Alice Johnson</x-ui.listbox.label>
                <x-ui.listbox.description>alice@example.com</x-ui.listbox.description>
            </x-ui.listbox.item>
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No one named “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
```

::preview{example="listbox/compose-owner" inline}

`<x-ui.listbox.value>` shows the selection wherever you put it — in the trigger, under it, in a sentence. Its content is the template of one value, with the bindings of Flexilla:

| Binding | Fills |
| --- | --- |
| `data-bind="label"` | Text from the option: `label`, `value`, or any `data-*` of the item (`data-initials` → `data-bind="initials"`). |
| `data-bind-src`, `data-bind-alt`, `data-bind-title`, `data-bind-href` | That attribute. URLs other than `http(s)`, `/`, `#`, `mailto:` and `tel:` are dropped; an image without a source is hidden. |
| `data-bind-style` | The `style` attribute. `url()`, `expression()` and `@import` are dropped. |
| `data-select-remove` | A button that removes this value. |

Values are written as text, never as HTML.

## Chips of your own

With `multiple`, a `chips` value repeats its template for each value. Put it anywhere — here under the trigger, with a clear button:

::preview{example="listbox/compose-reviewers" inline}

## A value template

A colored dot from the option's data, in the trigger and in the list:

::preview{example="listbox/compose-status" inline}

## Search, icons and descriptions

`searchable` adds a filter field at the top of the panel. Items are composed of an icon, an avatar, a label and a description; with an icon or an avatar, the check moves to the right edge.

::preview{example="listbox/searchable" inline}

## Groups and avatars

Pass rows with `:options` and name the keys to read. `option-group` sorts options under group headers; a disabled option stays in place.

::preview{example="listbox/groups" inline}

`options` takes a list of values, a `value => label` array, a list of rows or objects, Eloquent models, a Collection or an enum. The keys default to `value`, `label`, `description`, `icon`, `avatar`, `disabled` and `group`.

## Several values

Add `multiple`. The panel stays open while picking and the selection shows as chips under the trigger, each with its own remove button.

::preview{example="listbox/multiple" inline}

## Summaries

With `display`, the trigger summarizes the selection instead: `compact` lists the first names, `count` says how many. `max-chips` folds the chips past a number into +N.

::preview{example="listbox/summaries" inline}

The same summaries are value modes when you compose, with your own texts:

::preview{example="listbox/compose-summary" inline}

## States

::preview{example="listbox/states" inline}

`invalid` also turns on by itself when the field has a validation error. `aria-*` attributes go to the trigger, so tie the message with `aria-describedby`.

## Livewire

`wire:model` receives a string, or a real array with `multiple` — `['alice', 'marc']`, never a comma string:

:::raw
<x-docs.preview-ui>
    <livewire:listbox-demo />
</x-docs.preview-ui>
:::

```blade
<x-ui.listbox wire:model.live="reviewers" multiple searchable
    :options="$people" option-value="id" option-label="name" />
```

The listbox keeps its panel out of Livewire's updates. When the options depend on another field, give it a `wire:key` that changes with them so it is rebuilt:

```blade
<x-ui.listbox wire:model="city" :options="$cities" wire:key="cities-{{ $country }}" />
```

In a plain form, `name` posts one hidden field per value: `reviewers[]`.

## Keyboard

| Key | Action |
| --- | --- |
| Arrow down, Arrow up | Open the panel, move between options |
| Enter, Space | Open the panel, pick the highlighted option |
| Escape | Close the panel |

## References

### Listbox props

| Prop | Description |
| --- | --- |
| `name` (string) | Posts the value; `name[]` fields with `multiple`. |
| `value` (string\|array) | Starting value outside Livewire. `old()` wins after a failed validation. |
| `options` (array\|Collection) | Options to render, before the items of the slot. |
| `option-value`, `option-label`, `option-description`, `option-icon`, `option-avatar`, `option-disabled`, `option-group` (string) | Keys to read in each row. |
| `multiple` (boolean) | Several values. |
| `searchable` (boolean) | Filter field at the top of the panel. |
| `display` (chips\|count\|compact) | How several values show. Default: `chips`. |
| `max-chips` (int) | Chips shown before +N. |
| `placeholder`, `search-placeholder`, `empty-text`, `count-text`, `compact-text`, `remove-label`, `clear-text` (string) | Texts. `:query`, `:count`, `:labels` and `:label` are replaced. |
| `label` (string) | Label above the trigger. |
| `size` (sm\|md\|lg) | Same heights as the input. Default: `md`. |
| `disabled`, `invalid` (boolean) | States. |
| `placement` (string) | Panel placement. Default: `bottom-start`. |

Slot `empty` replaces the text shown when a search finds nothing. With a `<x-ui.listbox.content>` in the slot, these props only set the value, the name and the states: the composition is yours.

### Parts

| Component | Role and props |
| --- | --- |
| `x-ui.listbox.trigger` | The button. `size` (sm\|md\|lg), `disabled`, `chevron` (boolean). Empty, it shows a value. |
| `x-ui.listbox.value` | The selection. `mode` (single\|chips\|list\|count\|compact), `placeholder` (text or `<x-slot:placeholder>`), `max` (chips before +N), `count-text`, `compact-text`, `limit`, `remove-label`. Its content is the template of one value. |
| `x-ui.listbox.clear` | A button that empties the selection, hidden while there is nothing to clear. |
| `x-ui.listbox.content` | The panel. `placement`. |
| `x-ui.listbox.search` | The filter field. `placeholder`. |
| `x-ui.listbox.list` | The scrolling grid of items and groups. |
| `x-ui.listbox.item` | An option. `value`, `label` (text for search and values, defaults to its label part or its text), `disabled`, `check` (boolean). Its `data-*` attributes feed the value template. |
| `x-ui.listbox.label`, `x-ui.listbox.description` | The two lines of an item. |
| `x-ui.listbox.icon` | `name` (Iconify class) or your SVG. |
| `x-ui.listbox.avatar` | `src` for an image, or content such as initials. `size` (xs\|sm\|md\|lg). |
| `x-ui.listbox.group` | `label`. Hidden when a search empties it. |
| `x-ui.listbox.header`, `x-ui.listbox.separator` | Free heading and divider inside the list. |
| `x-ui.listbox.empty` | Shown when a search finds nothing. `x-ui.listbox.query` repeats the text typed. |

## Accessibility

- The trigger is a button with `aria-haspopup="listbox"`, `aria-expanded` and `aria-controls`; the panel is a `listbox`, `aria-multiselectable` with `multiple`.
- Options are `option` elements with `aria-selected`; a disabled one has `aria-disabled`.
- Chip remove buttons are named after their option: "Remove Alice Johnson".
- Labels are written as text, never as HTML.
