## Demo

```html
<x-ui.dropdown.trigger variant="outline" intent="gray" size="sm" dropdown-id="menu">
    <x-ui.icon name="ph--dots-three-vertical" />
</x-ui.dropdown.trigger>

<x-ui.dropdown id="menu" class="w-46">
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon><x-ui.icon name="ph--eye" /></x-ui.dropdown.icon>
        <x-ui.dropdown.label>View deal</x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.separator/>
    <x-ui.dropdown.item intent="destructive">
        <x-ui.dropdown.icon><x-ui.icon name="ph--trash" /></x-ui.dropdown.icon>
        <x-ui.dropdown.label>Delete</x-ui.dropdown.label>
    </x-ui.dropdown.item>
</x-ui.dropdown>
```

## Installation

```shell
php artisan flexi:add dropdown
```

Requires Flexilla JS: `npm i @flexilla/dropdown`

### With Alpine/Livewire

```js
import { DropdownPlugin } from "./plugins/dropdown";
Alpine.plugin(DropdownPlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/dropdown`

## API

### Dropdown Props

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| id | string | - | Required unique identifier |
| placement | string | 'bottom' | top, bottom, left, right (with -start/-end variants) |
| keepOpen | boolean | false | Clicking inside won't close |
| keepOpenOutside | boolean | false | Clicking outside won't close |

### Subcomponents

| Component | Description |
| --- | --- |
| x-ui.dropdown | Menu container; receives the `id` |
| x-ui.dropdown.trigger | Toggles dropdown. Must have `dropdown-id` attribute |
| x-ui.dropdown.item | Standard menu item |
| x-ui.dropdown.item-submenu | Submenu trigger item; needs `dropdown-id` matching the submenu dropdown's `id` |
| x-ui.dropdown.separator | Horizontal divider |
| x-ui.dropdown.header | Header section for grouping items |
| x-ui.dropdown.section | Group wrapper for visually grouping items |
| x-ui.dropdown.icon | Icon next to menu items |
| x-ui.dropdown.label | Label for menu items |
| x-ui.dropdown.kbd | Keyboard shortcut display |

## Guidance

- Use `intent="destructive"` on items for destructive actions.
- The `dropdown-id` on trigger must match the `id` on the dropdown.
- For submenus: use `x-ui.dropdown.item-submenu` with `dropdown-id="submenu-id"` as the trigger item, and a separate `<x-ui.dropdown submenu id="submenu-id">` as the menu. The `submenu` boolean tells the dropdown to position itself to the right instead of below.

```html
<x-ui.dropdown.item-submenu dropdown-id="my-submenu">
    <x-ui.dropdown.icon><x-ui.icon name="ph--archive" /></x-ui.dropdown.icon>
    <x-ui.dropdown.label>More options</x-ui.dropdown.label>
</x-ui.dropdown.item-submenu>

<x-ui.dropdown submenu id="my-submenu" class="w-40">
    <x-ui.dropdown.item>...</x-ui.dropdown.item>
</x-ui.dropdown>
```

## Avoid

- Do not put `id` on the trigger — it goes on `x-ui.dropdown`.
- Do not skip the JS plugin import; the dropdown will not open without it.
- Do not nest `<x-ui.button>` inside `<x-ui.dropdown.trigger>` — the trigger already renders as a button and accepts button props (`variant`, `intent`, `size`, etc.) directly.
