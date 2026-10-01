---
title: "Accordion"
group: "Overlays & Disclosure"
order: 70
tier: "free"
description: "Vertically collapsing panels for managing dense content."
seoDescription: "Learn how to use Flexiwind's accordion component to create expandable content sections."
keywords: "accordion, collapse, disclosure, faq"
---

## Demo

::preview{example="accordion/default"}

## Installation

Install the component

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add accordion
```
:::

::::step
### Install dependencies

:::callout{type="note"}
This component requires JS. By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/).
:::

```bash
npm i @flexilla/accordion
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `app.js`

```js title="flexilla.js" lines="1:added,3:added"
import { AccordionPlugin } from "./plugins/accordion";

Alpine.plugin(AccordionPlugin);
```

2\. **Without Alpine**

Initialize accordion in `app.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Accordion } from "@flexilla/accordion"

// init accordion for all Element with data-app-accordion attribute
Accordion.autoInit('[data-app-accordion]')
```
:::
:::::

## Open multiple

::preview{example="accordion/multiple"}

## Variants

### Solid

::preview{example="accordion/solid"}

### Soft

::preview{example="accordion/soft"}

### Outline

::preview{example="accordion/outline"}

### Subtle

::preview{example="accordion/subtle"}

### Link

::preview{example="accordion/link"}

## References

### Composition

| Prop | Description |
| --- | --- |
| `x-ui.accordion` | The accordion container component |
| `x-ui.accordion.item` | The accordion item component |
| `x-ui.accordion.trigger` | The accordion trigger component of each item, each item must have one trigger |
| `x-ui.accordion.content` | The accordion content component of each item, each item must have one content and it will be hidden by default and shown when the trigger is clicked |
| `x-ui.accordion.indicator` | The accordion item indicator component, the default is a arrow icon that will be rotated when the item is open. Must be inside the trigger. |

### Props

To configure the accordion component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `defaultValue` | The default value of the accordion, it will be the value of the item that will be open by default. |
| `type` | The type of the accordion, it can be "single" or "multiple". |
| `keepOneOpen`(boolean) | If true, the accordion will keep one item open at a time. All items can't be closed at the same time. |
| `multiple` (boolean) | The equivalent of type="multiple" |

### Item Props

| Prop | Description |
| --- | --- |
| `id` (string) | The id of the accordion item. It's required and must be unique. |
