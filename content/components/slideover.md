---
title: "Slideover"
group: "Overlays & Disclosure"
order: 30
tier: "free"
description: "Side-panel overlay for secondary navigation or settings."
seoDescription: "Create slide-in panels with Flexiwind's slideover component."
keywords: "slideover, drawer, side-panel, overlay"
---

## Demo

::preview{example="slideover/demo"}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add slideover
```
:::

::::step
### Install dependencies

:::callout{type="note"}
This component requires JS. By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). You can install the
Alpine Plugin if using Alpine or the vanilla JS version as you need
:::
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import { OffcanvasPlugin } from "./plugins/offcanvas"

Alpine.plugin(OffcanvasPlugin)
```

2\. **Without Alpine**

Initialize offcanvas in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Offcanvas } from "@flexilla/offcanvas"

// init Modal for all Element with data-app-modal attribute
Offcanvas.autoInit('[data-app-offcanvas]')
```
:::
:::::

## References

### Slideover Component

The slideover component creates a panel that slides in from the edge of the screen.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `id` | string | - | A unique identifier for the slideover. Required for proper functionality. |
| `position` | string | 'right' | The edge from which the slideover appears. Options: 'right', 'left', 'top', 'bottom' |
| `class` | string | '' | Additional CSS classes for the slideover container. |
| `isFloated` | boolean | true | When true, the slideover floats above the content with a shadow. |
| `staticBackdrop` | boolean/string | false | When true, the slideover cannot be closed by clicking outside or pressing ESC. |
| `backdropBlured` | boolean | true | When true, applies a blur effect to the backdrop. |
| `scrollableBody` | boolean | false | When true, allows the page to scroll while the slideover is open. |
| `size` | string | 'md' | Controls the size of the slideover. Options: 'sm', 'md', 'lg', 'xl', '2xl', '3xl' |
| `closable` | boolean | true | When true, the slideover can be closed by clicking the close button or pressing ESC. |

### Slideover Content Component

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `class` | string | '' | Additional CSS classes for the content container. |
| `as` | string | 'div' | The HTML element or component to render as the root element. |

### Subcomponents

| Component | Description |
| --- | --- |
| `x-ui.slideover.trigger` | The clickable element that opens the slideover. Must have 'slideover-id' attribute matching the slideover's 'id'. |
| `x-ui.slideover.content` | The main container for the slideover content. Handles sizing and basic styling. |
| `x-ui.slideover.header` | Container for the slideover header, typically containing the title and close button. |
| `x-ui.slideover.title` | The title of the slideover. Should be placed inside the header. |
| `x-ui.slideover.body` | The main content area of the slideover. Handles scrolling when content is too long. |
| `x-ui.slideover.footer` | Container for action buttons at the bottom of the slideover. |
| `x-ui.slideover.close` | A button to close the slideover. Inherits props from x-ui.button. |
| `x-ui.slideover.description` | An optional description text that can be added below the title. |

### Events

| Event | Description |
| --- | --- |
| `sheet:the-id-of-your-slideover:open` | Dispatch this event from JS or Livewire to open the slideover. |
| `sheet:the-id-of-your-slideover:close` | Dispatch this event from JS or Livewire to close the slideover. |

### JavaScript API

To know more about the JavaScript API, check the [Flexilla](https://flexilla.unoforge.com/components/tabs) documentation.
