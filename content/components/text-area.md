---
title: "Text Area"
group: "Actions & Inputs"
order: 40
tier: "free"
description: "Multi-line text input for longer user descriptions or notes."
seoDescription: "Add multiline text inputs with Flexiwind's text area component."
keywords: "textarea, multi-line, form input, notes"
---

## Demo

::preview{example="text-area/demo" inline}

## Installation

```bash
php artisan flexi:add text-area
```

## Resize none

::preview{example="text-area/no-resize" inline}

## Auto resize

::preview{example="text-area/auto-resize" inline}

:::::steps
::::step
### Install Autoresize plugin

:::callout{type="note"}
This component requires JS. By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). You can install the
Alpine Plugin if using Alpine or the vanilla JS version as you need
:::

```bash
npm i @flexilla/alpine-autoresize-area
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `app.js`

```js title="flexilla.js" lines="1:added,3:added"
import { AutoResizeAreaPlugin } from "./plugins/auto-resize-area";

Alpine.plugin(AutoResizeAreaPlugin)
```

2\. **Without Alpine**

Initialize Auto resize in `app.js`

```js title="flexilla.js" lines="1:added,4:added"
import { AutoResizeTextArea } from "@flexilla/autoresize-area"

// init Auto resize area for all Element with data-app-auto-resize attribute
AutoResizeTextArea.autoInit('[data-app-auto-resize]')
```
:::
:::::

## With label

::preview{example="text-area/with-label" inline}

## References

### Composition

| Prop | Description |
| --- | --- |
| `x-ui.textarea` | The main textarea component |

### Textarea Props

To configure the textarea component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `type` (string) | The textarea type. Default: "text" |
| `size` (string) | The size of the textarea. Options: "sm", "md", "lg". Default: "md" |
| `disabled` (boolean) | Whether the textarea is disabled. Default: false |
| `readonly` (boolean) | Whether the textarea is readonly. Default: false |
| `label` (string) | The label text for the textarea. Default: null |
| `variant` (string) | The variant of the textarea. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| `labelPosition` (top\|inline) | Position of the label relative to the textarea. Options: "top", "inline". Default: "top" |
| `labelClass` (string) | Additional CSS classes for the label. Default: '' |
| `autoResize` (boolean) | Enables automatic height adjustment based on content. Default: false |
| `class` (string) | Additional CSS classes for the textarea. Default: '' |
