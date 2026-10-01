---
title: "Tooltip"
group: "Overlays & Disclosure"
order: 60
tier: "free"
description: "Small informative popup that appears on element hover."
seoDescription: "Add helpful tooltips to elements with Flexiwind's tooltip component."
keywords: "tooltip, hint, hover, title"
---

## Demo

::preview{example="tooltip/demo" inline}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add tooltip
```
:::

::::step
### Install tooltip dependencies

:::callout{type="note"}
This component requires JS behavior. Flexiwind examples use [Flexilla](https://flexilla.unoforge.com/).
:::

1\. **With Alpine/Livewire**

```bash
npm i @flexilla/alpine-tooltip
```

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import {TooltipPlugin} from "./plugins/tooltip"

Alpine.plugin(TooltipPlugin)
```

2\. **Without Alpine**

```bash
npm i @flexilla/tooltip
```

Initialize tooltip in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Tooltip } from "@flexilla/tooltip"

// init tooltip for all Element with data-app-tooltip attribute
Tooltip.autoInit('[data-app-tooltip]')
```
::::
:::::

## API

| Prop | Description |
| --- | --- |
| `x-ui.tooltip` | Main tooltip content container attached to trigger by id. |
| `id` (required) | Unique id used as `tooltip-{id}`. |
| `placement` (top\|right\|bottom\|left...) | Preferred tooltip placement. |
| `bg` (default\|gray\|neutral\|dark) | Background style preset for tooltip content. |
| `trigger` (hover\|click) | Switches trigger strategy between hover and click. Default: hover |
| `x-ui.tooltip.trigger` | Trigger helper component with `tooltipId` plus button props. |
