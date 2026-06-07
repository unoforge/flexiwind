## Demo

```html
<x-ui.pagination>
    <x-ui.pagination.content>
        <x-ui.pagination.item>
            <x-ui.pagination.link href="#" is-icon-only>Prev</x-ui.pagination.link>
        </x-ui.pagination.item>
        <x-ui.pagination.item>
            <x-ui.pagination.link href="#" is-active>1</x-ui.pagination.link>
        </x-ui.pagination.item>
        <x-ui.pagination.item>
            <x-ui.pagination.link href="#">2</x-ui.pagination.link>
        </x-ui.pagination.item>
        <x-ui.pagination.item>
            <x-ui.pagination.ellipsis/>
        </x-ui.pagination.item>
    </x-ui.pagination.content>
</x-ui.pagination>
```

## Installation

```shell
php artisan flexi:add pagination
```

## Public Docs

`https://flexiwind.unoforge.com/components/pagination`

## Composition

| Component | Description |
| --- | --- |
| x-ui.pagination | Main navigation container |
| x-ui.pagination.content | Flex container for items with spacing |
| x-ui.pagination.item | Individual item wrapper (li) |
| x-ui.pagination.link | Clickable page links with active states |
| x-ui.pagination.ellipsis | Ellipsis for omitted pages |

## PaginationLink Props

| Prop | Description |
| --- | --- |
| isActive (boolean) | Whether the link is the current page. Default: false |
| size (xs\|sm\|md\|lg\|xl) | Size variant. Default: 'sm' |
| isIconOnly (boolean) | Whether the link contains only an icon. Default: false |
| href (string) | URL for the link. Default: '#' |
| variant (string) | Button variant (auto-set based on isActive) |

## Guidance

- Customize pagination colors via CSS variables like `--btn-pagination-link-text-color`, `--btn-pagination-active-link-bg`.
- Use `x-ui.pagination.ellipsis` for large page ranges.

## Avoid

- Do not invent `x-ui.pagination.prev` or `x-ui.pagination.next` — use `x-ui.pagination.link` with `is-icon-only`.
