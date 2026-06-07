## Demo

```html
<div class="flex items-center flex-wrap gap-3">
    <x-ui.switch name="switch_1" id="switch_1"
        class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
    <x-ui.switch name="switch_def2" id="switch_def2"
        class="bg-bg-muted text-bg-muted [--knob-bg:var(--color-fg-title)]" />
    <x-ui.switch name="switch_def3" id="switch_def3"
        class="bg-bg-muted text-fg-title [--knob-bg:var(--color-bg)]" />
</div>
```

## Installation

```shell
php artisan flexi:add switch
```

## With label

```html
<div class="flex flex-col gap-3">
    <label for="switch" class="flex items-center gap-x-1">
        <x-ui.switch name="switch" id="switch"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Use
            Dark Theme</span>
    </label>
    <label for="switch_lab1" class="flex items-center gap-x-1">
        <x-ui.switch checked name="switch_lab1" id="switch_lab1"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Checked</span>
    </label>
    <label for="switch_lab_2" class="flex items-center gap-x-1">
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 me-3">No</span>
        <x-ui.switch name="switch_lab_2" id="switch_lab_2"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Yes</span>
    </label>
</div>
```

## Sizes

```html
<div class="flex flex-col gap-3 w-full">
    <label for="switch_xs" class="flex items-center gap-x-1">
        <x-ui.switch size="xs" name="switch_xs" id="switch_xs" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Xs</span>
    </label>
    <label for="switch_sm" class="flex items-center gap-x-1">
        <x-ui.switch size="sm" name="switch_sm" id="switch_sm" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">SM</span>
    </label>
    <label for="switch_normal" class="flex items-center gap-x-1">
        <x-ui.switch name="switch_normal" id="switch_normal" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">MD</span>
    </label>
    <label for="switch_lg" class="flex items-center gap-x-1">
        <x-ui.switch size="lg" name="switch_lg" id="switch_lg" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">LG</span>
    </label>
</div>
```

## Outlined

```html
<div class="flex items-center flex-wrap gap-6">
    <x-ui.switch outlined name="switch_outline1" id="switch_outline1" class="bg-bg text-transparent [--knob-bg:var(--color-gray-500)]" />
    <x-ui.switch outlined name="switch_outline2" id="switch_outline2" class="bg-bg text-transparent [--knob-bg:var(--color-gray-500)]" />
</div>
```

## References

### Switch Props

To configure the switch component you can use the following props. All props are optional.

| Prop | Description |
| --- | --- |
| size (string) | The size of the switch. Options: "xs", "sm", "md", "lg". Default: "md" |
| outlined (boolean) | When true, renders the switch with an outline style instead of filled. Default: false |
| class (string) | Additional CSS classes for the switch. Default: '' |

## Styling

The switch component can be customized using CSS classes and CSS custom properties. The component renders as an input type= element.

### CSS Custom Properties

| Prop | Description |
| --- | --- |
| --knob-bg | Controls the background color of the switch knob (the circular part that moves). |

### Styling Examples

Basic styling with background and knob color:

```html
<!-- Basic switch with custom colors -->
<x-ui.switch name="switch_basic" id="switch_basic" 
    class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
```

Outlined switch styling:
```html
<!-- Outlined switch -->
<x-ui.switch outlined name="switch_outline" id="switch_outline" 
    class="bg-bg text-transparent [--knob-bg:var(--color-gray-500)]" />
```

Custom colors and sizes:

```html
<!-- Custom colors and sizes -->
<x-ui.switch size="xs" name="switch_custom" id="switch_custom" 
    class="bg-accent text-accent [--knob-bg:var(--color-white)]" />

<x-ui.switch size="lg" name="switch_custom2" id="switch_custom2" 
    class="bg-success text-success [--knob-bg:var(--color-gray-900)]" />
```

### Size Classes

The switch component automatically applies size classes based on the size prop, and also applies a base size class for vertical alignment:

| Prop | Classes Applied |
| --- | --- |
| xs | `switch-xs` + `switch-base-xs` |
| sm | `switch-sm` + `switch-base-sm` |
| md | `switch-md` + `switch-base-md` (default) |
| lg | `switch-lg` + `switch-base-lg` |

When `outlined="true"`, the component adds `ring ring-border-strong shadow` instead of switching to a different size class prefix.

## Avoid

- Do not use `variant` or `intent` props on switch — styling is done via CSS classes and `--knob-bg`.
- Do not omit `name` — it is required for form submission.
