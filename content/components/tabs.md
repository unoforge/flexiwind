---
title: "Tabs"
group: "Navigation"
order: 40
tier: "free"
description: "Segmented view switcher for organizing content within a page."
seoDescription: "Create tabbed interfaces with Flexiwind's tabs component."
keywords: "tabs, switch, navigation, view group"
---

## Demo

::preview{example="tabs/demo"}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add tabs
```
:::

::::step
### Install dependencies

:::callout{type="note"}
By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). Install this only if you
did not accept dependency installation when adding the component.
:::

```bash
npm i @flexilla/tabs
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import { TabsPlugin } from "./plugins/tabs";

Alpine.plugin(TabsPlugin)
```

2\. **Without Alpine**

Initialize tabs in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Tabs } from "@flexilla/tabs"

// init Tabs for all Element with data-app-tabs attribute
Tabs.autoInit('[data-app-tabs]')
```
:::
:::::

## Examples

### Form

::preview{example="tabs/form"}

## References

### Tabs Component

The tabs component creates a tabbed interface for organizing content into separate views.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `class` | string | '' | Additional CSS classes for the tabs container. |

### Subcomponents

| Component | Description |
| --- | --- |
| `x-ui.tabs.list-wrapper` | Optional wrapper component for the tabs list. |
| `x-ui.tabs.list` | The container for tab triggers. Should contain one or more `x-ui.tabs.trigger` components. |
| `x-ui.tabs.trigger` | The clickable tab trigger. Must have an 'id' attribute that matches a corresponding panel's 'id'. Accepts a 'class' prop for custom styling. |
| `x-ui.tabs.panel-wrapper` | Optional wrapper for tab panels. Can be used to add a common container around all panels. |
| `x-ui.tabs.panel` | The content panel for a tab. Must have an 'id' attribute that matches a trigger's 'id'. Accepts 'show-as-grid' prop to use CSS Grid for layout. Use the 'active' prop to set the initially visible panel. |

### Events

| Event | Description |
| --- | --- |
| `tab:changed` | Dispatched when the active tab changes. The event detail contains the ID of the newly active tab. |

### JavaScript API

To know more about the JavaScript API, check the [Flexilla](https://flexilla.unoforge.com/components/tabs) documentation.
