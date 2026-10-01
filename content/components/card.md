---
title: "Card"
group: "Layout & Structure"
order: 10
tier: "free"
description: "Organized content container with header, body, and footer sections."
seoDescription: "Display content in organized cards with Flexiwind's card component."
keywords: "card, box, panel, container, dashboard ui"
---

## Demo

::preview{example="card/demo"}

## Installation

Install the component

```bash
php artisan flexi:add card
```

## Examples

### With Icon

::preview{example="card/with-icon"}

### E-Commerce 1

::preview{example="card/e-commerce-1"}

### E-Commerce 2

::preview{example="card/e-commerce-2"}

### Pricing

::preview{example="card/pricing-1"}

## References

### Composition

| Prop | Description |
| --- | --- |
| `x-ui.card` | The main card container component |
| `x-ui.card.header` | Container for the card header section with flexible layout options |
| `x-ui.card.content` | Container for the main card content with configurable spacing |
| `x-ui.card.title` | The card title component with configurable heading levels and sizes |
| `x-ui.card.description` | The card description component for secondary text content |
| `x-ui.card.footer` | Container for the card footer section |

### Card Props

To configure the card component you can use the following props.
All props are optional.

| Prop | Description |
| --- | --- |
| `fill` (string) | The background fill style. Options: "default", "gray". Default: "default" |
| `size` (string) | The padding size. Options: "2xs", "xs", "sm", "default", "lg", "none". Default: "default" |
| `variant` (string) | The visual variant. Options: "none", "soft", "solid". Default: "none" |
| `intent` (string) | The color intent when variant is not "none". Default: "gray" |
| `border` (boolean) | Controls the border on the card. Default: true |
| `shadow` (boolean) | Controls the shadow on the card. Default: true |
| `class` (string) | Additional CSS classes for the card. Default: '' |

### Card Header Props

| Prop | Description |
| --- | --- |
| `direction` (string) | Flex direction. Options: "column", "row". Default: "column" |
| `justify` (string) | Justify content alignment. Options: "start", "end", "center". Default: "start" |
| `flexNone` (boolean) | Disables flex layout when true. Default: false |
| `gap` (string) | Gap size between items. Options: "1", "2", "3", "4". Default: "2" |

### Card Content Props

| Prop | Description |
| --- | --- |
| `gap` (string) | Gap size between content items. Options: "1", "2", "3", "4". Default: "3" |

### Card Title Props

| Prop | Description |
| --- | --- |
| `level` (string) | HTML heading level. Options: "1", "2", "3", "4". Default: "2" |
| `text` (string) | The title text content. Default: null (uses slot content) |
| `size` (string) | Text size. Options: "sm", "md", "lg", "xl". Default: "lg" |
| `weight` (string) | Font weight. Options: "medium", "semibold", "bold". Default: "semibold" |

### Card Description Props

| Prop | Description |
| --- | --- |
| `text` (string) | The description text content. Default: null (uses slot content) |
| `size` (string) | Text size. Options: "sm", "base", "lg". Default: "sm" |

### Card Footer Props

The card footer component accepts all standard HTML attributes and passes them through to the container div. No specific props are defined.

## Style Guide

### Customizing Padding

The card component uses CSS variables for padding that can be overridden for custom spacing:

| Prop | Description |
| --- | --- |
| `--card-padding` | Controls the padding inside the card. Default value depends on the size prop. |

You can override the padding using CSS classes:

```blade title="card-custom-padding.blade.php"
<x-ui.card class="[--card-padding:--spacing(8)]">
    <!-- Card content with custom padding -->
</x-ui.card>
```

### Customizing Border Radius

The card component uses CSS variables for border radius:

| Prop | Description |
| --- | --- |
| `--card-radius` | Controls the border radius of the card. Default: `var(--radius-ui)` |

You can override the border radius using CSS classes:

```blade title="card-custom-radius.blade.php"
<x-ui.card class="[--card-radius:0.75rem]">
    <!-- Card content with custom border radius -->
</x-ui.card>

<x-ui.card class="[--card-radius:var(--radius-lg)]">
    <!-- Card content using predefined radius variable -->
</x-ui.card>
```

### Combining Customizations

You can combine multiple variable overrides for complete control over the card appearance:

```blade title="card-combined-customization.blade.php"
<x-ui.card class="[--ui-padding:--spacing(6)] [--ui-radius:1rem]">
    <!-- Card with custom padding and radius -->
</x-ui.card>
```
