---
title: "Autocomplete"
group: "Actions & Inputs"
order: 52
tier: "free"
state: "new"
description: "Search first: people type, the list narrows, they pick. A known list or a Livewire search."
seoDescription: "Autocomplete and searchable combobox for Laravel Blade and Livewire with Tailwind CSS: static lists, server search, multiple values."
keywords: "autocomplete, combobox, typeahead, search select, livewire autocomplete, tags input"
---

## Demo

::preview{example="autocomplete/demo" inline}

## Installation

```bash
php artisan flexi:add autocomplete
```

It installs the [Listbox](/components/listbox) too: both share the panel, the options and the plugin `resources/js/plugins/listbox.js`, which drives [Flexilla Autocomplete](https://flexilla.unoforge.com/docs/components/autocomplete). Register it once:

```js
import { ListboxPlugin } from "./plugins/listbox";

Alpine.plugin(ListboxPlugin);
```

Use the autocomplete when the list is too long to scroll — cities, customers, products — and the [Listbox](/components/listbox) when people can see every option at once.

## Composition

The autocomplete is built from the same parts as the [listbox](/components/listbox#composition): swap the trigger for `<x-ui.autocomplete.input>` and compose the rest.

::preview{example="autocomplete/compose-owner" inline}

```blade
<x-ui.autocomplete wire:model="owner">
    <x-ui.autocomplete.input placeholder="Search owners" />

    <x-ui.listbox.value mode="single">
        <span data-bind="initials" data-bind-style="badge"></span>
        <span data-bind="label"></span>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            <x-ui.listbox.item value="brenda" data-initials="BS">…</x-ui.listbox.item>
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No owner found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
```

Rich tags for several people, with a clear button next to the label:

::preview{example="autocomplete/compose-team" inline}

## Several values

Add `multiple`. The input stays a search field and picks land as chips under it.

::preview{example="autocomplete/multiple" inline}

With `display="list"`, the selection becomes a list with room for a second line:

::preview{example="autocomplete/list" inline}

## Search with Livewire

Name a Livewire property with `search`: it receives what people type, after `debounce` milliseconds (300 by default) and once they typed `min-chars` characters (1 by default). Filter on the server and pass the results as `options`. The panel updates in place: the input keeps its focus and its text, a spinner shows while Livewire works, and a picked value keeps its label when it leaves the results.

:::raw
<x-docs.preview-ui>
    <livewire:autocomplete-demo />
</x-docs.preview-ui>
:::

```blade
<x-ui.autocomplete wire:model.live="customer" search="query"
    :options="$customers" option-value="id" option-label="name" option-description="email" />
```

```php
public string $query = '';

public ?string $customer = null;

public function with(): array
{
    return [
        'customers' => $this->query === '' ? [] : Customer::query()
            ->whereLike('name', '%'.$this->query.'%')
            ->limit(6)
            ->get(['id', 'name', 'email']),
    ];
}
```

`whereLike` binds the text as a parameter: what people type is never part of the SQL.

## Your own empty state

The `empty` slot replaces the text shown when nothing matches. `<span data-select-empty-query></span>` repeats the query.

```blade
<x-ui.autocomplete wire:model="customer" search="query" :options="$customers">
    <x-slot:empty>
        No customer named “<span data-select-empty-query></span>”.
        <a href="{{ route('customers.create') }}" class="text-primary underline">Add one</a>
    </x-slot:empty>
</x-ui.autocomplete>
```

## States

::preview{example="autocomplete/states" inline}

## Keyboard

| Key | Action |
| --- | --- |
| Typing | Opens the panel and filters |
| Arrow down, Arrow up | Move between options |
| Enter | Pick the highlighted option |
| Escape | Close the panel |

## References

### Autocomplete props

| Prop | Description |
| --- | --- |
| `name`, `value` | As on the listbox. |
| `options`, `option-*` | As on the listbox. |
| `multiple` (boolean) | Several values. |
| `display` (chips\|list) | How several values show. Default: `chips`. |
| `max-chips` (int) | Chips shown before +N. |
| `search` (string) | Livewire property that receives the typed text. |
| `selected-options` (array\|Collection) | Options already picked, outside of the results: they name the selection without showing up in the list. Same keys as `options`. |
| `min-chars` (int) | Characters before a search. Default: 1 with `search`, 0 otherwise. |
| `debounce` (int) | Milliseconds between two searches. Default: 300. |
| `placeholder`, `empty-text`, `min-chars-text`, `start-text`, `count-text`, `remove-label`, `clear-text`, `clear-label` (string) | Texts. `:query`, `:count` and `:label` are replaced. |
| `label`, `size`, `disabled`, `invalid`, `placement` | As on the listbox. |

Items and the other parts are the [listbox parts](/components/listbox#parts). `x-ui.autocomplete.input` takes `placeholder`, `clearable` (boolean, default true) and `clear-label`.

## Accessibility

- The input is a `combobox` with `aria-autocomplete="list"`, `aria-expanded` and `aria-controls` pointing at its `listbox`.
- Enter picks an option without submitting the surrounding form.
- Chip and list remove buttons are named after their option.
- Labels are written as text, never as HTML.
