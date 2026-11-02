---
title: "Popover"
group: "Overlays & Disclosure"
order: 50
tier: "free"
description: "Floating container for displaying rich content on click or hover."
seoDescription: "Add contextual information with Flexiwind's popover component."
keywords: "popover, dropdown, tooltip, info-box"
---

## Demo

::preview{example="popover/demo" inline}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add popover
```
:::

::::step
### Install popover dependencies

:::callout{type="note"}
Flexiwind uses [Flexilla](https://flexilla.unoforge.com/).
:::

By default when adding the component with the CLI it will ask if you want to install dependdencies,

```bash
npm i @flexilla/popover
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import { PopoverPlugin } from "./plugins/popover";

Alpine.plugin(PopoverPlugin)
```

2\. **Without Alpine**

Initialize popover in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Popover } from "@flexilla/popover"

// init popover for all Element with data-app-popover attribute
Popover.autoInit('[data-app-popover]')
```
:::
:::::

## API

| Prop | Description |
| --- | --- |
| `x-ui.popover` | Popover content container connected to a trigger by id. |
| `id` (required) | Unique id used as `popover-{id}`. |
| `placement` (top\|right\|bottom\|left...) | Preferred placement relative to trigger. |
| `keepOpen` (boolean) | Controls whether clicking inside closes content. |
| `keepOpenOutside` (boolean) | Prevents outside click closing behavior. |
| `gray` (boolean) | Applies gray background variant. |
| `trigger` (click\|hover) | Switches trigger strategy between click and hover. Default: click |
| `x-ui.popover.trigger` | Trigger helper using `popoverId` and button props. |

## Examples

### Filter

::preview{example="popover/filter" inline}
