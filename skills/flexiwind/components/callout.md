## Demo

```html
<x-ui.callout>
    This component require JS. By default we're using our own Interactive Component Library
</x-ui.callout>
```

## Installation

```shell
php artisan flexi:add callout
```

## Public Docs

`https://flexiwind.unoforge.com/components/callout`

## API

| Prop | Description |
| --- | --- |
| type (default\|update\|note\|warning\|important) | Semantic tone and default icon |
| intent (string) | Overrides default type intent |
| variant (solid\|soft\|subtle\|outline\|default) | Visual style |
| size (xs\|sm\|default\|lg) | Spacing and typography density |
| title / message | Quick title/message API when not using slot composition |
| icon (boolean) | Leading icon visibility. Default: true |

## Composition

```html
<x-ui.callout variant="soft" type="important">
    <x-ui.callout.title text="There was a problem with your submission"/>
    <x-ui.callout.description>
        <p>Must include at least 1 number</p>
    </x-ui.callout.description>
</x-ui.callout>
```

## Guidance

- Callout has `title` and `description` subcomponents for structured content.
- Use `type` for predefined tone+icon combos, or `intent` for custom coloring.

## Avoid

- Do not confuse `x-ui.callout` with `x-ui.alert` — callout is a structured block with title/description; alert is a simpler inline notification.
