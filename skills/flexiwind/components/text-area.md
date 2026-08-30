## Demo

```html
<form class="space-y-4 w-full">
    <x-ui.textarea placeholder="Start typing..."/>
    <x-ui.textarea placeholder="Start typing..." variant="flush" class="bg-muted"/>
</form>
```

## Installation

```shell
php artisan flexi:add text-area
```

## Public Docs

`https://flexiwind.unoforge.com/components/text-area`

> Note: The docs page is `text-area` but the Blade primitive is `x-ui.textarea` (no hyphen).

## Resize none

```html
<form class="space-y-4 w-full">
    <x-ui.textarea placeholder="Start typing..." resize-none/>
</form>
```

## Auto resize

```html
<form class="space-y-4 w-full">
    <x-ui.textarea placeholder="Start typing..." auto-resize/>
</form>
```

Requires Flexilla JS: `npm i @flexilla/alpine-autoresize-area`

### With Alpine/Livewire

```js
import { AutoResizeAreaPlugin } from "./plugins/auto-resize-area";
Alpine.plugin(AutoResizeAreaPlugin)
```

### Without Alpine

```js
import { AutoResizeTextArea } from "@flexilla/autoresize-area"
AutoResizeTextArea.autoInit('[data-app-auto-resize]')
```

## With label


```html
<form class="space-y-4 w-full">
    <x-ui.textarea label="Your message" placeholder="Start typing..." class="h-40"/>
</form>
```

## References

### Composition

| Prop | Description |
| --- | --- |
| x-ui.textarea | The main textarea component |

### Textarea Props

To configure the textarea component you can use the following props. All props are optional.

| Prop | Description |
| --- | --- |
| type (string) | The textarea type. Default: "text" |
| size (string) | The size of the textarea. Options: "sm", "md", "lg". Default: "md" |
| disabled (boolean) | Whether the textarea is disabled. Default: false |
| readonly (boolean) | Whether the textarea is readonly. Default: false |
| label (string) | The label text for the textarea. Default: null |
| variant (string) | The variant of the textarea. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| labelPosition (top\|inline) | Position of the label relative to the textarea. Options: "top", "inline". Default: "top" |
| labelClass (string) | Additional CSS classes for the label. Default: '' |
| autoResize (boolean) | Enables automatic height adjustment based on content. Default: false |
| class (string) | Additional CSS classes for the textarea. Default: '' |

## Avoid

- Do not use `x-ui.text-area` — the Blade primitive is `x-ui.textarea`.
- Do not use `auto-resize` without importing the Flexilla autoresize plugin.
