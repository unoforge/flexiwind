## Demo

```html
<x-ui.tooltip.trigger tooltip-id="demo-1" size="sm" iconOnly variant="outline" intent="gray">
    <x-ui.icon name="ph--caret-down" />
</x-ui.tooltip.trigger>
<x-ui.tooltip id="demo-1" content="Tooltip content"/>
```

## Installation

```shell
php artisan flexi:add tooltip
```

Requires Flexilla JS: `npm i @flexilla/alpine-tooltip`

```js
import { TooltipPlugin } from "./plugins/tooltip";
Alpine.plugin(TooltipPlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/tooltip`

## API

| Prop | Description |
| --- | --- |
| id (required) | Unique id used as `tooltip-{id}` on the tooltip element |
| placement (top\|right\|bottom\|left...) | Preferred tooltip placement |
| bg (default\|gray\|neutral\|dark) | Background style preset |
| trigger (hover\|click) | Trigger strategy. Default: hover |
| content | string | Tooltip text content (shorthand; can also use slot for rich content) |

### Trigger Props

| Prop | Description |
| --- | --- |
| tooltip-id (required) | Links to the tooltip's `id` |
| radius | Button border-radius preset. Default: lg |

## Guidance

- `x-ui.tooltip.trigger` uses `tooltip-id` attribute to link to the tooltip.
- Tooltip content is set via the `content` prop.
- Use `aria-label` on the trigger when the trigger has no visible text.

## Avoid

- Do not use `id` directly on the trigger — use `tooltip-id` instead.
- Do not skip the JS plugin import; the tooltip will not function without it.
- Do not nest `<x-ui.button>` inside `<x-ui.tooltip.trigger>` — the trigger already renders as a button and accepts button props directly.
