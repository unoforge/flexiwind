---
title: "Button"
group: "Actions & Inputs"
order: 20
tier: "free"
description: "Versatile action trigger with support for loading states and icons."
seoDescription: "Create interactive buttons with various styles using Flexiwind's button component."
keywords: "button, click, trigger, cta, action"
---

## Demo

::preview{example="button/demo" inline}

## Installation

```bash
php artisan flexi:add button
```

## Button Principles

In Flexiwind, a button is defined by three core dimensions:
**variant**, **intent**, and **size**.
This separation ensures visual consistency, clear action hierarchy,
and full themeability.

**Variant** controls the visual treatment of the button,
while **intent** communicates the meaning of the action.
If you want to customize the variant, take a look at the [button utilities](/docs/theme/buttons) page.

## API

| Prop | Description |
| --- | --- |
| `variant` (solid\|soft\|outline\|ghost\|none) | Controls visual style and default intent behavior. |
| `intent` (string\|null) | Semantic color tone. Falls back to variant defaults when omitted. |
| `size` (xs\|sm\|md\|lg\|xl) | Defines button dimensions and typography. |
| `iconOnly` (boolean) | Switches to icon-size geometry for icon-only actions. |
| `disabled` (boolean) | Disables interaction and applies accessibility attributes. |
| `href` (string\|null) | When set, renders as anchor; external links open in a new tab. |

## Examples

### Sizes

::preview{example="button/sizes" inline}

### Icons

::preview{example="button/icons" inline}

### With icon

::preview{example="button/with-icon" inline}

### Variants

:::raw
<x-docs.preview-ui>
        <x-examples.button.variants />
    </x-docs.preview-ui>
:::
