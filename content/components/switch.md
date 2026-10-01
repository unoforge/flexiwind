---
title: "Switch"
group: "Actions & Inputs"
order: 80
tier: "free"
description: "Modern toggle switch for boolean settings and binary choices."
seoDescription: "Implement toggle switches with Flexiwind's accessible switch component."
keywords: "switch, toggle, boolean, setting"
---

## Demo

::preview{example="switch/demo" inline}

## Installation

```bash
php artisan flexi:add switch
```

## With label

::preview{example="switch/with-label" inline}

## Sizes

::preview{example="switch/sizes" inline}

## Outlined

::preview{example="switch/outlined" inline}

## References

### Switch Props

To configure the switch component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `size` (string) | The size of the switch. Options: "xs", "sm", "md", "lg". Default: "md" |
| `outlined` (boolean) | When true, renders the switch with an outline style instead of filled. Default: false |
| `class` (string) | Additional CSS classes for the switch. Default: '' |

## Styling

The switch component can be customized using CSS classes and CSS custom properties. The component renders as an `input type=` element.

### CSS Custom Properties

| Prop | Description |
| --- | --- |
| `--knob-background` | Controls the background color of the switch knob (the circular part that moves). |

### Styling Examples

**Basic styling with background and knob color:**

```blade title="switch-basic-styling.blade.php"
<!-- Basic switch with custom colors -->
<x-ui.switch name="switch_basic" id="switch_basic" 
    class="bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
```

**Outlined switch styling:**

```blade title="switch-outlined-styling.blade.php"
<!-- Outlined switch -->
<x-ui.switch outlined name="switch_outline" id="switch_outline" 
    class="bg-background  text-transparent [--knob-bg:var(--color-muted-foreground)]" />
```

**Custom colors and sizes:**

```blade title="switch-custom-styling.blade.php"
<!-- Custom colors and sizes -->
<x-ui.switch size="xs" name="switch_custom" id="switch_custom" 
    class="bg-accent text-accent [--knob-bg:var(--color-white)]" />

<x-ui.switch size="lg" name="switch_custom2" id="switch_custom2" 
    class="bg-success text-success [--knob-bg:var(--color-foreground)]" />
```

### Size Classes

The switch component automatically applies size classes based on the `size` prop, plus a base size class for vertical alignment:

| Prop | Description |
| --- | --- |
| `xs` | Applies `switch-xs` + `switch-base-xs` |
| `sm` | Applies `switch-sm` + `switch-base-sm` |
| `md` | Applies `switch-md` + `switch-base-md` (default) |
| `lg` | Applies `switch-lg` + `switch-base-lg` |

When `outlined` is `true`, the component adds `ring ring-border-strong shadow` — it does **not** use a separate `switch-outline-*` class prefix.
