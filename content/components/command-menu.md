---
title: "Command menu"
group: "Overlays & Disclosure"
order: 45
tier: "free"
state: "new"
description: "A ⌘K palette: search, pages, actions and shortcuts in one dialog."
seoDescription: "Command menu (⌘K palette) for Laravel Blade and Livewire with Tailwind CSS: grouped commands, nested pages, keyboard navigation, Livewire search."
keywords: "command menu, command palette, cmd k, ctrl k, spotlight, livewire command palette"
---

## Demo

Click the button, or press <kbd>Ctrl</kbd> <kbd>J</kbd> (<kbd>⌘</kbd> <kbd>J</kbd> on a Mac): this site already uses <kbd>K</kbd> for its own search.

::preview{example="command-menu/demo" inline}

## Installation

```bash
php artisan flexi:add command-menu
```

```js
import { CommandMenuPlugin } from "./plugins/command-menu";

Alpine.plugin(CommandMenuPlugin);
```

The menu is a native `<dialog>`: it keeps focus inside, closes with Escape or a click outside, and gives focus back to what opened it.

## Composition

```blade
<x-ui.command-menu shortcut="mod+k">
    <x-slot:trigger>
        <x-ui.command-menu.trigger />
    </x-slot:trigger>

    <x-ui.command-menu.group heading="Suggestions">
        <x-ui.command-menu.item href="/docs" icon="ph--book-open" keywords="guide">Search docs</x-ui.command-menu.item>
        <x-ui.command-menu.item wire:click="createProject" icon="ph--folder-plus" shortcut="mod+n">Create project</x-ui.command-menu.item>
        <x-ui.command-menu.item page="theme" icon="ph--palette">Change theme…</x-ui.command-menu.item>
    </x-ui.command-menu.group>

    <x-ui.command-menu.page name="theme" label="Theme">
        <x-ui.command-menu.group>
            <x-ui.command-menu.item x-on:click="setTheme('dark')">Dark</x-ui.command-menu.item>
        </x-ui.command-menu.group>
    </x-ui.command-menu.page>

    <x-ui.command-menu.empty>No results for “<x-ui.command-menu.query />”.</x-ui.command-menu.empty>
</x-ui.command-menu>
```

An item with `href` is a link; otherwise a button that runs its `wire:click` or `x-on:click`, then closes the menu (`keep-open` leaves it open). `page` opens a page: its label shows in the field, and Backspace in an empty field goes back. Matches are bold.

Open the menu from anywhere with `$commandMenu.open()`, or `window.dispatchEvent(new CustomEvent('command-menu:open'))`.

## Search with Livewire

With `search`, typed text goes to a Livewire property. Put the results in a group with `:filter="false"`: they show as the server sends them, while the other items still filter at once.

:::raw
<x-docs.preview-ui>
    <livewire:command-menu-demo />
</x-docs.preview-ui>
:::

```blade
<x-ui.command-menu search="query">
    <x-ui.command-menu.group heading="Customers" :filter="false">
        @foreach ($customers as $customer)
            <x-ui.command-menu.item :href="route('customers.show', $customer)" :description="$customer->email" wire:key="customer-{{ $customer->id }}">
                {{ $customer->name }}
            </x-ui.command-menu.item>
        @endforeach
    </x-ui.command-menu.group>
</x-ui.command-menu>
```

An item runs a Livewire action or follows a link: the action checks permissions like any other request.

## Radius

The panel takes `--radius-ui × 1.5`, like toasts; items take the panel radius minus its padding (`--command-padding`), like dropdown items.

## References

### Command menu props

| Prop | Description |
| --- | --- |
| `shortcut` (string) | Opens and closes the menu. `mod` is ⌘ on a Mac, Ctrl elsewhere. Default: `mod+k`. Empty: none. |
| `placeholder`, `label` (string) | Field placeholder, dialog name. |
| `search` (string), `debounce` (int) | Livewire property that receives the typed text. |
| `empty-text` (string) | Default empty state. `:query` is replaced. |
| `footer` (boolean) | Key hints at the bottom. Default: true. |

### Parts

| Part | Description |
| --- | --- |
| `x-ui.command-menu.trigger` | Search button with the shortcut. `placeholder`. |
| `x-ui.command-menu.group` | `heading`; `:filter="false"` for server results. |
| `x-ui.command-menu.item` | `href`, `icon`, `shortcut`, `keywords`, `description`, `page`, `keep-open`, `disabled`. |
| `x-ui.command-menu.page` | `name`, `label`. |
| `x-ui.command-menu.empty`, `.query`, `.separator`, `.shortcut` | Empty state, typed text, divider, keys. |

## Accessibility

- The field is a `combobox` with `aria-activedescendant`: focus stays in it while arrows move the selection.
- Items are real links and buttons; Enter activates the selected one.
- Escape or a click outside closes the dialog and focus returns to the trigger.
- Item shortcuts are displayed; bind them in your app if they should work outside the menu.
