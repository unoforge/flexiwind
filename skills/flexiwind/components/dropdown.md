## Demo

```html
<x-ui.dropdown.trigger variant="outline" intent="gray" size="sm" dropdown-id="menu">
    <span class="iconify ph--dots-three-vertical"></span>
</x-ui.dropdown.trigger>

<x-ui.dropdown id="menu" class="w-46">
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon><span class="iconify ph--eye"></span></x-ui.dropdown.icon>
        <x-ui.dropdown.label>View deal</x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.separator/>
    <x-ui.dropdown.item intent="danger">
        <x-ui.dropdown.icon><span class="iconify ph--trash"></span></x-ui.dropdown.icon>
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
| x-ui.dropdown.item-submenu | Creates a nested submenu |
| x-ui.dropdown.separator | Horizontal divider |
| x-ui.dropdown.header | Header section for grouping items |
| x-ui.dropdown.icon | Icon next to menu items |
| x-ui.dropdown.label | Label for menu items |
| x-ui.dropdown.kbd | Keyboard shortcut display |

## Guidance

- Use `intent="danger"` on items for destructive actions.
- The `dropdown-id` on trigger must match the `id` on the dropdown.
- Submenus use `x-ui.dropdown.item-submenu` + a separate `x-ui.dropdown` submenu.

## Avoid

- Do not put `id` on the trigger — it goes on `x-ui.dropdown`.
- Do not skip the JS plugin import; the dropdown will not open without it.
