## Demo

```html
<div class="flex flex-wrap items-center gap-2">
    <x-ui.icon name="ph--house"/>
    <x-ui.icon name="ph--user"/>
    <x-ui.icon name="ph--gear"/>
</div>
```

## Installation

```shell
php artisan flexi:add icon
```

## Public Docs

`https://flexiwind.unoforge.com/components/icon`

## API

| Prop | Description |
| --- | --- |
| name (string) | Iconify icon class name (e.g., ph--house, ph--user) |
| size (xs\|sm\|md\|lg\|xl\|2xl) | Predefined size |
| intent (fg\|muted\|primary\|secondary\|success\|warning\|danger) | Semantic color intent |
| class (string) | Additional CSS classes |

## Guidance

- Uses Iconify for icons. Name format: `{collection}--{icon}` (e.g., `ph--house`).
- Flexiwind uses Phosphor icons (`ph--`) throughout examples.
- Use `aria-hidden="true"` when icons are decorative.

## Avoid

- Do not use raw `<span>` with icon classes when `x-ui.icon` is available.
- Do not omit `aria-hidden="true"` on decorative icons — they should not be read by screen readers.
