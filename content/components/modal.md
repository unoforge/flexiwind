---
title: "Modal"
group: "Overlays & Disclosure"
order: 10
tier: "free"
description: "Blocking dialog window for critical interactions or forms."
seoDescription: "Create interactive modal dialogs with Flexiwind's modal component."
keywords: "modal, dialog, popup, overlay"
---

## Demo

::preview{example="modal/demo"}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add modal
```
:::

::::step
### Install Dependencies

:::callout{type="note"}
By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). Install this only if you
did not accept dependency installation when adding the component.
:::

```bash
npm i @flexilla/modal
```
::::

:::step
### Usage

1\. **With Alpine/Livewire**

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import { ModalPlugin } from "./plugins/modal";

Alpine.plugin(ModalPlugin)
```

2\. **Without Alpine**

Initialize modal in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { Modal } from "@flexilla/modal"

// init Modal for all Element with data-app-modal attribute
Modal.autoInit('[data-app-modal]')
```
:::
:::::

## References

### Modal Component

The modal component creates a dialog box that appears on top of the page content.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `id` | string | - | A unique identifier for the modal. Required for proper functionality. |
| `backdropClass` | string | '' | Additional CSS classes for the modal's backdrop/overlay. |
| `overlayBlured` | boolean | true | When true, applies a blur effect to the backdrop. |
| `closable` | boolean | true | When true, the modal can be closed by clicking the close button or pressing ESC. |
| `staticBackdrop` | boolean/string | false | When true, the modal cannot be closed by clicking outside or pressing ESC. |
| `scrollableBody` | boolean | false | When true, allows the page to scroll while the modal is open. |

### Modal Content Component

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `size` | string | 'md' | Controls the width of the modal. Options: 'xs', 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', 'full' |
| `closable` | boolean | true | When true, shows a close button in the top-right corner. |
| `gutter` | boolean | true | When false, removes the default padding from the modal content. |
| `enterAnimation` | string | 'modal-animation-in .4s linear' | The animation that plays when the modal opens. Uses CSS keyframes. |
| `exitAnimation` | string | 'modal-animation-out .1s linear' | The animation that plays when the modal closes. Uses CSS keyframes. |
| `animation` | boolean | true | When false, disables all animations for the modal content. |

### Animation Keyframes

The modal component uses CSS keyframes for animations. The default animations are:

| Keyframe | Description |
| --- | --- |
| `modal-animation-in` | Default enter animation. Fades in and slides up from -1.5rem to 0 with opacity transition from 0 to 1. |
| `modal-animation-out` | Default exit animation. Fades out and slides up from 0 to -0.75rem with opacity transition from 1 to 0. |

You can customize animations by modifying the keyframes in your CSS or by providing custom animation names to
the `enterAnimation` and `exitAnimation` props.

### Subcomponents

| Component | Description |
| --- | --- |
| `x-ui.modal.trigger` | The clickable element that opens the modal. Must have 'modal-id' attribute matching the modal's 'id'. |
| `x-ui.modal.content` | The main container for the modal content. Handles sizing and basic styling. |
| `x-ui.modal.header` | Container for the modal header, typically containing the title and close button. |
| `x-ui.modal.title` | The title of the modal. Should be placed inside the header. |
| `x-ui.modal.body` | The main content area of the modal. Handles scrolling when content is too long. |
| `x-ui.modal.footer` | Container for action buttons at the bottom of the modal. |
| `x-ui.modal.close` | A button to close the modal. Inherits props from x-ui.button. |

### Events

| Event | Description |
| --- | --- |
| `modal:the-id-of-your-modal:open` | Dispatch this event from JS or Livewire to open the modal. |
| `modal:the-id-of-your-modal:close` | Dispatch this event from JS or Livewire to close the modal. |

### JavaScript API

To know more about the JavaScript API, check the [Flexilla](https://flexilla.unoforge.com/components/modal) documentation.
