## Demo

```html
<x-ui.tooltip.trigger tooltip-id="demo-1" size="sm" iconOnly variant="outline" intent="gray">
    <span class="flex iconify ph--caret-down"></span>
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

## Guidance

- `x-ui.tooltip.trigger` uses `tooltip-id` attribute to link to the tooltip.
- Tooltip content is set via the `content` prop.
- Use `aria-label` on the trigger when the trigger has no visible text.

## Avoid

- Do not use `id` directly on the trigger — use `tooltip-id` instead.
- Do not skip the JS plugin import; the tooltip will not function without it.
