## Demo

```html
<x-ui.alert>
    You can add components to your app using our CLI.
</x-ui.alert>
```

## Installation

```shell
php artisan flexi:add alert
```

## Public Docs

`https://flexiwind.unoforge.com/components/alert`

## API

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| variant | string | 'solid' | solid, soft, outline, subtle, link |
| intent | string | 'gray' | primary, success, warning, danger, info |
| size | string | 'default' | xs, sm, default, lg |
| radius | string | 'md' | none, sm, md, lg, full |
| class | string | '' | Additional CSS classes |

## Guidance

- Alerts are inline notifications, not to be confused with Alert Dialog or Callout.
- Use `intent` for semantic coloring: primary, success, warning, danger, info.

## Avoid

- Do not confuse `x-ui.alert` (inline notification) with `x-ui.modal` (alert dialog) or `x-ui.callout` (structured callout block).
- Do not invent variant names outside `solid`, `soft`, `outline`, `subtle`, `link`.
