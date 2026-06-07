## Installation

```shell
php artisan flexi:add sidebar-wrapper
```

This installs:
- `resources/js/sidebar-plugin.js`
- `resources/views/components/ui/sidebar-wrapper.blade.php`

Import the plugin manually in your JS:

```js
import "./sidebar-plugin.js";
```

## AlpineJS Plugin

| Directive | Description |
| --- | --- |
| x-sidebar | Applied to sidebar element for toggle/resize functionality |
| data-toggle-sidebar | Applied to trigger elements to open/close the sidebar |
| data-toggle-sidebar-size | Applied to trigger elements to resize the sidebar |

## Component

| Prop | Description |
| --- | --- |
| overlayBlured (boolean) | Backdrop blur on overlay. Default: true |
| class (string) | Additional CSS classes |

## Basic usage

```html
<x-ui.sidebar-wrapper class="fixed h-dvh w-72 bg-bg-surface border-r border-bg-muted transition-all -translate-x-full fx-open:translate-x-0 lg:translate-x-0 z-80">
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center gap-x-2.5 px-3 py-2 rounded-md hover:bg-bg-muted">
                    <span class="iconify ph--house"></span>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
</x-ui.sidebar-wrapper>
```

## Data attributes and states

| Attribute | Description |
| --- | --- |
| data-state | Sidebar state: "open" or "close" |
| data-resized | Resize state: "true" or "false" |
| aria-hidden | Overlay accessibility state |

## Public Docs

`https://flexiwind.unoforge.com/components/sidebar`

## Guidance

- Use `fx-open:` prefix for classes when sidebar is open.
- Use `fx-resized:` prefix for classes when sidebar is resized.
- Use `in-fx-resized:hidden` to hide elements when sidebar is collapsed.
- Apply z-70 for overlay, z-80 for sidebar.

## Avoid

- Do not invent `x-ui.sidebar` — the correct primitive is `x-ui.sidebar-wrapper`.
- Do not skip the JS import — the sidebar requires the sidebar plugin to function.
