## Demo

```html
<x-ui.accordion type="single" default-value="item-1">
    <x-ui.accordion.item id="item-1">
        <x-ui.accordion.trigger>
            Is it accessible?
            <x-ui.accordion.indicator/>
        </x-ui.accordion.trigger>
        <x-ui.accordion.content>
            Yes. It adheres to the WAI-ARIA design pattern.
        </x-ui.accordion.content>
    </x-ui.accordion.item>
    <x-ui.accordion.item id="item-2">
        <x-ui.accordion.trigger>
            Is it unstyled?
            <x-ui.accordion.indicator/>
        </x-ui.accordion.trigger>
        <x-ui.accordion.content>
            Yes. It's unstyled by default.
        </x-ui.accordion.content>
    </x-ui.accordion.item>
</x-ui.accordion>
```

## Installation

```shell
php artisan flexi:add accordion
```

Requires Flexilla JS: `npm i @flexilla/accordion`

```js
import { AccordionPlugin } from "./plugins/accordion";
Alpine.plugin(AccordionPlugin);
```

## Public Docs

`https://flexiwind.unoforge.com/components/accordion`

## API

### Accordion Props

| Prop | Description |
| --- | --- |
| type (single\|multiple) | Single or multiple open items at a time |
| defaultValue | ID of the item open by default |
| keepOneOpen (boolean) | Prevent all items from being closed simultaneously |

### Item Props

| Prop | Description |
| --- | --- |
| id (required) | Must be unique within the accordion |

### Subcomponents

| Component | Description |
| --- | --- |
| x-ui.accordion | Container |
| x-ui.accordion.item | Each accordion item |
| x-ui.accordion.trigger | Clickable trigger (one per item) |
| x-ui.accordion.content | Hidden content (one per item) |
| x-ui.accordion.indicator | Arrow icon that rotates on open |

## Guidance

- Each item must have exactly one trigger and one content.
- Use `type="multiple"` to allow several items open at once.

## Avoid

- Do not remove the trigger/content structure — do not flatten accordion into a single tag.
- Do not omit the `id` on each `x-ui.accordion.item`.
