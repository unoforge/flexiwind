## Demo

```html
<div class="flex flex-wrap gap-4">
    <x-ui.badge variant="subtle">Badge</x-ui.badge>
    <x-ui.badge variant="soft" intent="primary">Badge</x-ui.badge>
    <x-ui.badge variant="outline" intent="warning">Badge</x-ui.badge>
    <x-ui.badge intent="danger">Badge</x-ui.badge>
    <x-ui.badge intent="neutral">Badge</x-ui.badge>
</div>
```

## Installation

```shell
php artisan flexi:add badge
```

## Public Docs

`https://flexiwind.unoforge.com/components/badge`

## API

| Prop | Description |
| --- | --- |
| variant (solid\|soft\|subtle\|outline\|default) | Visual style of the badge |
| intent (string) | Semantic color intent |
| size (xs\|sm\|default\|lg) | Controls badge size |
| radius (string) | Rounding token |

## Guidance

- Badge variants: solid, soft, subtle, outline.
- Intents: gray, neutral, primary, secondary, accent, warning, danger, info, success.
- Do not invent badge variants not documented here or in the live docs.

## Avoid

- Do not use `type` or `color` props — use `variant` and `intent`.
- Do not invent variant names outside `solid`, `soft`, `subtle`, `outline`, `default`.
