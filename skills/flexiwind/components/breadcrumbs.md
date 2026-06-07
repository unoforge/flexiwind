## Demo

```html
<x-ui.breadcrumbs>
    <x-ui.breadcrumbs.item href="#">Home</x-ui.breadcrumbs.item>
    <x-ui.breadcrumbs.item href="#">Navigation</x-ui.breadcrumbs.item>
    <x-ui.breadcrumbs.item active>Current Page</x-ui.breadcrumbs.item>
</x-ui.breadcrumbs>
```

## Installation

```shell
php artisan flexi:add breadcrumbs
```

## Public Docs

`https://flexiwind.unoforge.com/components/breadcrumbs`

## API

| Prop | Description |
| --- | --- |
| spacing (on breadcrumb and item) | Controls spacing between items and separators |
| href (item) | When provided and item is not active, renders as a link |
| active (item) | Marks current page and removes separator |
| separator (item/separator) | Changes separator icon or custom text/markup |
| separatorNotIcon (item) | Renders separator content as plain text instead of icon class |

## Guidance

- `x-ui.breadcrumbs` wraps the trail and sets navigation semantics.
- `x-ui.breadcrumbs.item` renders each crumb and separator.
- `x-ui.breadcrumbs.separator` customizes the visual divider between items.
- Use `active` on the last item to mark current page.

## Avoid

- Do not omit `active` on the last item — it removes the separator and marks the current page for screen readers.
- Do not use raw `<a>` tags inside breadcrumbs when `x-ui.breadcrumbs.item` covers the need.
