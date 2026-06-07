## Demo

```html
<x-ui.popover.trigger popover-id="filter" size="sm" variant="outline" intent="gray">
    Show Popover
</x-ui.popover.trigger>
<x-ui.popover id="filter" class="w-80">
    <div class="grid gap-4">
        <h4 class="font-medium">Dimensions</h4>
        <x-ui.input label="Width"/>
        <x-ui.input label="Max. width"/>
    </div>
</x-ui.popover>
```

## Installation

```shell
php artisan flexi:add popover
```

Requires Flexilla JS: `npm i @flexilla/popover`

```js
import { PopoverPlugin } from "./plugins/popover";
Alpine.plugin(PopoverPlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/popover`

## API

| Prop | Description |
| --- | --- |
| id (required) | Unique id used as `popover-{id}` on the popover element |
| placement (top\|right\|bottom\|left...) | Preferred placement relative to trigger |
| keepOpen (boolean) | Clicking inside won't close |
| keepOpenOutside (boolean) | Outside click won't close |
| gray (boolean) | Gray background variant |
| trigger (click\|hover) | Trigger strategy. Default: click |

## Guidance

- `x-ui.popover.trigger` uses `popover-id` attribute to link to the popover.
- Popover supports rich content (forms, inputs, selects inside).

## Avoid

- Do not use `id` on the trigger — use `popover-id` instead.
- Do not skip the JS plugin import; the popover will not open without it.
