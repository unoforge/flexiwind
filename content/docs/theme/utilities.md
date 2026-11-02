---
title: "UI Utilities & Variants"
group: "Design System"
order: 40
tier: "free"
description: "High-level UI helpers and variants such as ui-solid, ui-soft, ui-subtle, ui-card, and other composable utilities."
seoDescription: "Discover Flexiwind’s UI utilities and variants to build consistent components faster with minimal markup."
keywords: "UI Utilities, UI Variants, ui-solid, ui-soft, ui-subtle, ui-card, Design Helpers"
---

## Prerequisites

Create a dedicated file such as `utilities.css` for reusable theme utilities.
Keep these utilities separate from component files to avoid duplicated style logic.

Import utility definitions after theme tokens so utility classes can consume final variable values.

## Variants

Utility variants mirror the same semantic intent system used across themed components.
Choose a variant family, then apply the intent classes that match your use case.

### Solid variants

:::tabs
```css title="both"
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-muted);
    --ui-fg: var(--color-foreground);

    &:is(.dark *) {
        --ui-color: var(--color-foreground);
        --ui-fg: var(--color-muted-foreground);
    }
}

@utility ui-solid-neutral {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-white);

    &:is(.dark *) {
        --ui-color: var(--color-white);
        --ui-fg: var(--color-foreground);
    }
}

@utility ui-solid-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-solid-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="light"
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-muted);
    --ui-fg: var(--color-foreground);
}

@utility ui-solid-neutral {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-white);
}

@utility ui-solid-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-solid-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="dark"
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-muted-foreground);
}

@utility ui-solid-neutral {
    --ui-color: var(--color-white);
    --ui-fg: var(--color-foreground);
}

@utility ui-solid-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-solid-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-ui />
:::
::::

### Outline variants

:::tabs
```css title="both"
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-primary);
        --ui-border-color: var(--color-primary);
    }
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-destructive);
        --ui-border-color: var(--color-destructive);
    }
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-success);
        --ui-border-color: var(--color-success);
    }
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-muted-foreground);
        --ui-border-color: var(--color-foreground);
    }
}

@utility ui-outline-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-outline-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="light"
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);
}

@utility ui-outline-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-outline-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="dark"
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-muted-foreground);
    --ui-border-color: var(--color-foreground);
}

@utility ui-outline-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-outline-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-ui variant="outline" />
:::
::::

### Soft variants

:::tabs
```css title="both"
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
        --ui-fg: var(--color-primary);
    }
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
        --ui-fg: var(--color-destructive);
    }
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
        --ui-fg: var(--color-success);
    }
}

@utility ui-soft-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
        --ui-fg: var(--color-muted-foreground);
    }
}

@utility ui-soft-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-soft-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="light"
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
}

@utility ui-soft-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
}

@utility ui-soft-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-soft-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="dark"
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
}

@utility ui-soft-gray {
    --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
    --ui-fg: var(--color-muted-foreground);
}

@utility ui-soft-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-soft-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-ui variant="soft" />
:::
::::

### Subtle variants

:::tabs
```css title="both"
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
        --ui-fg: var(--color-primary);
        --ui-border-color: color-mix(in oklab, var(--color-primary) 30%, transparent);
    }
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
        --ui-fg: var(--color-destructive);
        --ui-border-color: color-mix(in oklab, var(--color-destructive) 30%, transparent);
    }
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
        --ui-fg: var(--color-success);
        --ui-border-color: color-mix(in oklab, var(--color-success) 30%, transparent);
    }
}

@utility ui-subtle-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
        --ui-fg: var(--color-muted-foreground);
        --ui-border-color: color-mix(in oklab, var(--color-muted-foreground) 30%, transparent);
    }
}

@utility ui-subtle-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-subtle-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="light"
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-subtle-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);
}

@utility ui-subtle-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-subtle-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```

```css title="dark"
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: color-mix(in oklab, var(--color-primary) 30%, transparent);
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: color-mix(in oklab, var(--color-destructive) 30%, transparent);
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: color-mix(in oklab, var(--color-success) 30%, transparent);
}

@utility ui-subtle-gray {
    --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
    --ui-fg: var(--color-muted-foreground);
    --ui-border-color: color-mix(in oklab, var(--color-muted-foreground) 30%, transparent);
}

@utility ui-subtle-warning {
    --ui-color: var(--color-warning);
    --ui-fg: var(--color-white);
}
@utility ui-subtle-info {
    --ui-color: var(--color-info);
    --ui-fg: var(--color-white);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-ui variant="subtle" />
:::
::::

## Utilities

### Card Utility

`ui-card` applies shared card spacing and radius using theme variables.
Use it as a base utility when you want cards to follow token-driven sizing.

| Prop | Description |
| --- | --- |
| `ui-card` | Applies padding and radius from `--card-padding` and `--card-radius`. |

**How it works:**

- Uses `p-(--card-padding)` for internal spacing
- Uses `rounded-(--card-radius)` for outer radius
- Can be overridden per component when needed

**Customization:**

- Override `--card-padding` for compact or spacious layouts
- Override `--card-radius` for roundness style changes
- Keep variable names stable so utility class usage stays unchanged

### Inner Radius Utility

`inner-radius` keeps inner elements aligned with the card's inner curve.
It subtracts card padding from the outer radius to avoid visual overflow.

| Prop | Description |
| --- | --- |
| `inner-radius` | Computes `calc(var(--card-radius) - var(--card-padding))` for inner content blocks. |

**Why it's useful:**

- Prevents inner surfaces from clipping beyond the card shape
- Keeps nested UI visually aligned with outer radius
- Works well for media blocks, nested actions, and inset containers

**Usage example:**

```blade title="inner-radius-example.blade.php"
<!-- Card with custom padding and radius -->
<x-ui.card class="[--ui-padding:--spacing(6)] [--ui-radius:1rem]">
    <!-- Inner element with calculated radius -->
    <div class="inner-radius bg-primary text-white p-4">
        Content that fits perfectly
    </div>
</x-ui.card>
```
