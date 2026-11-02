---
title: "Dropdown"
group: "Overlays & Disclosure"
order: 40
tier: "free"
description: "Overlay menu for displaying contextual actions or links."
seoDescription: "Create interactive dropdown menus with Flexiwind's dropdown component."
keywords: "dropdown, menu, actions, context menu"
---

## Demo

::preview{example="dropdown/demo" inline}

## Installation

Install the component

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add dropdown
```
:::

::::step
### Install dependencies

:::callout{type="note"}
This component requires JS. By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). Install this only if you
did not accept dependency installation when adding the component.
:::

### Usage

1\. **With Alpine/Livewire**

```bash
npm i @flexilla/dropdown
```

Normally after installing the component, a file should be created in `resources/js/plugins/dropdown.js`.

```js title="flexilla.js" lines="1:added,3:added"
import { DropdownPlugin } from "./plugins/dropdown";

Alpine.plugin(DropdownPlugin)
```

2\. **Without Alpine**

Initialize dropdown in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Dropdown } from "@flexilla/dropdown"

// init Auto resize area for all Element with data-app-dropdown attribute
Dropdown.autoInit('[data-app-dropdown]')
```
::::
:::::

## Examples

### With header

::preview{example="dropdown/with-header" inline}

### Submenu

::preview{example="dropdown/sub-menu" inline}

## References

### Dropdown Component

The dropdown component creates a toggleable menu that appears when a trigger element is clicked.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `id` | string | - | A unique identifier for the dropdown. Required for proper functionality. |
| `placement` | string | 'bottom' | Controls where the dropdown appears relative to the trigger. Common values:`top`, `top-start`, `top-end``right`, `right-start`, `right-end``bottom` (default), `bottom-start`, `bottom-end``left`, `left-start`, `left-end` |
| `keepOpen` | boolean | false | When true, clicking inside the dropdown won't close it. Useful for dropdowns with interactive content. |
| `keepOpenOutside` | boolean | false | When true, clicking outside the dropdown won't close it. |
| `class` | string | '' | Additional CSS classes for the dropdown container. |
| `contentClass` | string | '' | Additional CSS classes for the dropdown content area. |

### Subcomponents

The dropdown system includes several subcomponents for building rich dropdown menus.

| Component | Description |
| --- | --- |
| `x-ui.dropdown.trigger` | The clickable element that toggles the dropdown. Must have 'dropdown-id' attribute. The 'dropdown-id' attribute must match the 'id' attribute of the x-ui.dropdown component. It inherits all attributes from the x-ui.button component. |
| `x-ui.dropdown.item` | A standard menu item. Can be used for navigation or actions. |
| `x-ui.dropdown.item-submenu` | Creates a nested submenu. |
| `x-ui.dropdown.separator` | A horizontal line to separate groups of menu items. |
| `x-ui.dropdown.header` | A header section for grouping related menu items. |
| `x-ui.dropdown.icon` | An icon that can be placed next to menu items. |
| `x-ui.dropdown.kbd` | Displays a keyboard shortcut key. |

### JavaScript API

To know more about the JavaScript API, check the [Flexilla Dropdown](https://flexilla.unoforge.com/docs/components/dropdown) documentation.
