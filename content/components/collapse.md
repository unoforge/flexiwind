---
title: "Collapse"
group: "Overlays & Disclosure"
order: 80
tier: "free"
description: "Toggle visibility of content sections with smooth height transitions."
seoDescription: "Learn how to use Flexiwind's collapse component to create expandable content sections."
keywords: "collapse, expand, show more, toggle, disclosure"
---

## Demo

::preview{example="collapse/demo"}

## Installation

Install the component

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add collapse
```
:::

::::step
### Install dependencies

:::callout{type="note"}
This component requires JS. By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/).
:::

```bash
npm i @flexilla/collapse
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `app.js`

```js title="flexilla.js" lines="1:added,3:added"
import { CollapsePlugin } from "./plugins/collapse";

Alpine.plugin(CollapsePlugin)
```

2\. **Without Alpine**

Initialize accordion in `app.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Collapse } from "@flexilla/collapse"

// init collapse for all Element with data-app-collapse attribute
Collapse.autoInit('[data-app-collapse]')
```
:::
:::::

## Close height

You can determine the minimum height for closing collapse

::preview{example="collapse/close-height"}
