## Demo

```html
<x-ui.otp class="max-w-xs">
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
</x-ui.otp>
```

## Installation

```shell
php artisan flexi:add otp
```

Requires Flexilla JS: `npm i @flexilla/pin-input`

### With Alpine/Livewire

```js
import AlpinePinInput from "@flexilla/alpine-pin-input"
Alpine.plugin(AlpinePinInput)
```

### Without Alpine

```js
import { PinInput } from "@flexilla/pin-input"
PinInput.autoInit('[data-app-otp]')
```

## Examples

### Numeric OTP

```html
<x-ui.otp validation="number" class="max-w-xs">
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
</x-ui.otp>
```

### Alphabetic OTP

```html
<x-ui.otp validation="alpha" class="max-w-xs">
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
</x-ui.otp>
```

### Alpha Numeric OTP

```html
<x-ui.otp validation="alphanumeric" class="max-w-xs">
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
    <x-ui.otp.input size="none" class="size-10 max-w-10" />
</x-ui.otp>
```

## Public Docs

`https://flexiwind.unoforge.com/components/otp`

> Note: The docs page is `otp` but the Blade primitive is `x-ui.otp`.

## API

### OTP Component

The OTP (One-Time Password) component creates a group of input fields designed for entering verification codes. It provides built-in validation and auto-focus management between fields.

### OTP Container

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| validation | string | null | Defines the input validation pattern. Can be one of: number - Only numeric input (0-9) alpha - Only alphabetic characters (a-z, A-Z) alphanumeric - Both letters and numbers Custom regex pattern - Any valid JavaScript regex pattern |
| class | string | '' | Additional CSS classes for the OTP container. |

### OTP Input

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| size | string | 'md' | Controls the size of the input. Can be one of: 'xs', 'sm', 'md', 'lg', 'xl'. |
| type | string | 'text' | The HTML input type. Typically 'text' or 'password'. |
| radius | string | 'lg' | Border radius of the input. Can be one of: 'none', 'sm', 'md', 'lg', 'xl', '2xl', '3xl', 'full'. |
| disabled | boolean | false | When true, the input is disabled and not interactive. |
| readonly | boolean | false | When true, the input is read-only and cannot be modified. |
| border | boolean | true | Controls the border visibility on the input. |
| unStylled | boolean | false | When true, removes all default styling from the input. |

### JavaScript API

The OTP component is powered by the @flexilla/pin-input package. For advanced usage and methods, refer to the Flexilla Pin Input Documentation .

## Accessibility

The OTP component is built with accessibility in mind:

- Keyboard navigation support (Arrow keys)
- Auto-focus management between fields
- Paste support for easier code entry
