## Demo

```html
<x-ui.collapse>
    <x-ui.collapse.trigger>
        Add tax details
        <x-ui.collapse.indicator/>
    </x-ui.collapse.trigger>
    <x-ui.collapse.content>
        You can add your tax information to your invoices.
    </x-ui.collapse.content>
</x-ui.collapse>
```

## Installation

```shell
php artisan flexi:add collapse
```

Requires Flexilla JS: `npm i @flexilla/collapse`

```js
import { CollapsePlugin } from "./plugins/collapse";
Alpine.plugin(CollapsePlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/collapse`

## Subcomponents

| Component | Description |
| --- | --- |
| x-ui.collapse | Wrapper element |
| x-ui.collapse.trigger | Clickable toggle button |
| x-ui.collapse.content | Hidden/revealed content area |
| x-ui.collapse.indicator | Arrow icon that rotates on open |

## Guidance

- Collapse is a single-item toggle. Use Accordion for multiple items.
- Use `x-ui.collapse.trigger` and `x-ui.collapse.content` for the toggle pattern.
- `x-ui.collapse.indicator` provides an arrow icon that rotates.

## Avoid

- Do not flatten the trigger/content structure into a single tag.
- Do not use Collapse when you need multiple open/close items — use Accordion instead.
