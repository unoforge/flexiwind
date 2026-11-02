---
title: "Dissmissible"
group: "Overlays & Disclosure"
order: 90
tier: "free"
description: "User-dismissible content wrapper for alerts, notifications, and temporary messages."
seoDescription: "Create dismissible alerts and notifications with Flexiwind's dissmissible component."
keywords: "dismissible, closable, alert, notification, banner, temporary message"
---

## Demo

Create dismissible content that users can close or hide. Commonly used for alerts, notifications, banners, and temporary messages.

::preview{example="dissmissible/demo"}

## Installation

Install the component

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add dissmissible
```
:::

::::step
### Install dependencies

:::callout{type="note"}
This component requires JavaScript. By default we use the interactive component library [Flexilla](https://flexilla.unoforge.com/).
:::

```bash
npm i @flexilla/dissmissible
```
::::

:::step
### Setup

Add the plugin to your `resources/js/app.js`

```js title="flexilla.js" lines="1:added,3:added"
import { DissmissiblePlugin } from "./plugins/dissmissible";

Alpine.plugin(DissmissiblePlugin)
```
:::
:::::

## API Reference

| Prop | Description |
| --- | --- |
| `action` (string) | Determines what happens when dismissed. Default is `'remove-from-dom'` which removes the element from the document. Other options depend on your JavaScript setup. |
| `closable` (boolean) | Controls whether the close button is displayed. Default is `true`. |
| `slot` (HTML) | The main content to be displayed inside the dismissible component. |

## Examples

### Alert Notification

Dismissible alert notifications for errors, warnings, and general information messages.

::preview{example="dissmissible/alert-notification"}

### Custom close button

::preview{example="dissmissible/non-closable"}

## Composition

| Prop | Description |
| --- | --- |
| `x-ui.dissmissible` | The main dismissible container component |
| `x-ui.dissmissible.close` | The close button component (automatically included when `closable` is `true`) |
