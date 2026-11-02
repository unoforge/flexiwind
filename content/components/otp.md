---
title: "Otp / Pin"
group: "Actions & Inputs"
order: 90
tier: "free"
description: "Segmented input field designed for verification codes and MFA."
seoDescription: "Create OTP input with Flexiwind's otp component."
keywords: "otp, pin code, auth, verification, 2fa"
---

## Demo

::preview{example="otp/demo" inline}

## Installation

:::::steps
:::step
### Install the component

```bash
php artisan flexi:add otp
```
:::

::::step
### Install

:::callout{type="note"}
By default we're using our own Interactive Component Library [Flexilla](https://flexilla.unoforge.com/). Install this only if you
did not accept dependency installation when adding the component.
:::

Install this only if you're not using AlpineJS

```bash
npm i @flexilla/pin-input
```
::::

:::step
1\. **With Alpine/Livewire**

Add plugin in `flexilla.js`

```js title="flexilla.js" lines="1:added,3:added"
import { PinInputPlugin } from "./plugins/pin-input"

Alpine.plugin(PinInputPlugin)
```

2\. **Without Alpine**

Initialize Pin Input in `flexilla.js`

```js title="flexilla.js" lines="1:added,4:added"
import { PinInput} from "@flexilla/pin-input"

// init Pin Input for all Element with data-app-otp attribute
PinInput.autoInit('[data-app-otp]')
```
:::
:::::

## Examples

### Numeric OTP

::preview{example="otp/numeric" inline}

### Alphabetic OTP

::preview{example="otp/alpha" inline}

### Alpha Numeric OTP

::preview{example="otp/alpha-numeric" inline}

## References

### OTP Component

The OTP (One-Time Password) component creates a group of input fields designed for entering verification codes.
It provides built-in validation and auto-focus management between fields.

### OTP Container

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `validation` | string | null | Defines the input validation pattern. Can be one of:`number` - Only numeric input (0-9)`alpha` - Only alphabetic characters (a-z, A-Z)`alphanumeric` - Both letters and numbers Custom regex pattern - Any valid JavaScript regex pattern |
| `class` | string | '' | Additional CSS classes for the OTP container. |

### OTP Input

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| `size` | string | 'md' | Controls the size of the input. Can be one of: 'xs', 'sm', 'md', 'lg', 'xl'. |
| `type` | string | 'text' | The HTML input type. Typically 'text' or 'password'. |
| `radius` | string | 'lg' | Border radius of the input. Can be one of: 'none', 'sm', 'md', 'lg', 'xl', '2xl', '3xl', 'full'. |
| `disabled` | boolean | false | When true, the input is disabled and not interactive. |
| `readonly` | boolean | false | When true, the input is read-only and cannot be modified. |
| `border` | boolean | true | Controls the border visibility on the input. |
| `unStylled` | boolean | false | When true, removes all default styling from the input. |

### JavaScript API

The OTP component is powered by the `@flexilla/pin-input` package.
For advanced usage and methods, refer to the [Flexilla Pin Input
Documentation](#).

## Accessibility

The OTP component is built with accessibility in mind:

- Keyboard navigation support (Arrow keys)
- Auto-focus management between fields
- Paste support for easier code entry
