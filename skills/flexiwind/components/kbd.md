## Demo

```html
<div class="flex flex-wrap items-center gap-3">
    <x-ui.kbd size="xs">kbd xs</x-ui.kbd>
    <x-ui.kbd size="sm">Kbd sm</x-ui.kbd>
    <x-ui.kbd>Kbd md</x-ui.kbd>
    <x-ui.kbd size="lg">Kbd lg</x-ui.kbd>
</div>
```

## Installation

```shell
php artisan flexi:add kbd
```

## Public Docs

`https://flexiwind.unoforge.com/components/kbd`

## API

| Prop | Description |
| --- | --- |
| variant (solid\|soft\|subtle\|outline\|default) | Visual style |
| intent (string) | Semantic color intent |
| size (none\|xs\|sm\|default\|lg) | Keycap size and typography |
| radius (string) | Rounded style token |

## Guidance

- Use short labels like `Ctrl`, `Cmd`, `Enter`.
- Grouped shortcuts: put modifier keys first.
- Use with icons/symbols inside the kbd slot.

## Avoid

- Do not use long sentences inside kbd — keep to single keys or short combinations.
