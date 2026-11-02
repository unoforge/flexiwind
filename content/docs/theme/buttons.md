---
title: "Buttons"
group: "Design System"
order: 30
tier: "free"
description: "Global button styles, variants, sizes, and interaction states powered by Flexiwind utilities."
seoDescription: "Configure and customize Flexiwind button styles, variants, sizes, and states for consistent actions."
keywords: "Buttons, Button Variants, UI Actions, Design System, Primary Secondary Buttons"
---

## Prerequisites

Create a dedicated file such as `button-styles.css` for button variants.
Keep button styles centralized so all intents stay consistent across the app.

Load this file after base token definitions and before app-specific overrides.
This order ensures variant classes pick up your final theme values.

## Variants

Each variant defines the visual treatment of the button.
Intents (such as primary, secondary, success, or destructive) control semantic meaning.
Combine both to build a predictable button system.

### Solid variants

:::tabs
```css title="both"
@utility btn-solid-primary {
    --btn-color: var(--color-primary);
    --btn-fg: var(--color-primary-foreground);
}

@utility btn-solid-secondary {
    --btn-color: var(--color-secondary);
    --btn-fg: var(--color-secondary-foreground);
}

@utility btn-solid-accent {
    --btn-color: var(--color-accent);
    --btn-fg: var(--color-accent-foreground);
}

@utility btn-solid-destructive {
    --btn-color: var(--color-destructive);
    --btn-fg: var(--color-destructive-foreground);
}

@utility btn-solid-neutral {
    --btn-color: var(--color-foreground);
    --btn-fg: var(--color-white);

    &:is(.dark *) {
        --btn-color: var(--color-muted);
        --btn-fg: var(--color-foreground);
    }
}

@utility btn-solid-success {
    --btn-color: var(--color-success);
    --btn-fg: var(--color-white);
}

@utility btn-solid-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-white);
}
@utility btn-solid-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-white);
}
```

```css title="light"
@utility btn-solid-primary {
    --btn-color: var(--color-primary);
    --btn-fg: var(--color-primary-foreground);
}

@utility btn-solid-secondary {
    --btn-color: var(--color-secondary);
    --btn-fg: var(--color-secondary-foreground);
}

@utility btn-solid-accent {
    --btn-color: var(--color-accent);
    --btn-fg: var(--color-accent-foreground);
}

@utility btn-solid-destructive {
    --btn-color: var(--color-destructive);
    --btn-fg: var(--color-destructive-foreground);
}

@utility btn-solid-neutral {
    --btn-color: var(--color-foreground);
    --btn-fg: var(--color-white);
}

@utility btn-solid-success {
    --btn-color: var(--color-success);
    --btn-fg: var(--color-white);
}

@utility btn-solid-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-white);
}
@utility btn-solid-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-white);
}
```

```css title="dark"
@utility btn-solid-primary {
    --btn-color: var(--color-primary);
    --btn-fg: var(--color-primary-foreground);
}

@utility btn-solid-secondary {
    --btn-color: var(--color-secondary);
    --btn-fg: var(--color-secondary-foreground);
}

@utility btn-solid-accent {
    --btn-color: var(--color-accent);
    --btn-fg: var(--color-accent-foreground);
}

@utility btn-solid-destructive {
    --btn-color: var(--color-destructive);
    --btn-fg: var(--color-destructive-foreground);
}

@utility btn-solid-neutral {
    --btn-color: var(--color-muted);
    --btn-fg: var(--color-foreground);
}

@utility btn-solid-success {
    --btn-color: var(--color-success);
    --btn-fg: var(--color-white);
}

@utility btn-solid-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-white);
}
@utility btn-solid-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-white);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-buttons />
:::
::::

### Outline variants

:::tabs
```css title="both"
@utility btn-outline-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);
    --btn-border-color: var(--color-border);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-muted-foreground);
        --btn-border-color: var(--color-foreground);
    }
}

@utility btn-outline-primary {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-primary);
    --btn-border-color: color-mix(in oklab, var(--color-primary) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-primary) 8%, var(--color-background));
}
@utility btn-outline-destructive {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-destructive);
    --btn-border-color: color-mix(in oklab, var(--color-destructive) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-destructive) 8%, var(--color-background));
}
@utility btn-outline-success {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-success);
    --btn-border-color: color-mix(in oklab, var(--color-success) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-success) 8%, var(--color-background));
}
@utility btn-outline-warning {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-warning);
    --btn-border-color: color-mix(in oklab, var(--color-warning) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-warning) 8%, var(--color-background));
}
@utility btn-outline-info {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-info);
    --btn-border-color: color-mix(in oklab, var(--color-info) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-info) 8%, var(--color-background));
}
```

```css title="light"
@utility btn-outline-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);
    --btn-border-color: var(--color-border);
}

@utility btn-outline-primary {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-primary);
    --btn-border-color: color-mix(in oklab, var(--color-primary) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-primary) 8%, var(--color-background));
}
@utility btn-outline-destructive {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-destructive);
    --btn-border-color: color-mix(in oklab, var(--color-destructive) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-destructive) 8%, var(--color-background));
}
@utility btn-outline-success {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-success);
    --btn-border-color: color-mix(in oklab, var(--color-success) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-success) 8%, var(--color-background));
}
@utility btn-outline-warning {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-warning);
    --btn-border-color: color-mix(in oklab, var(--color-warning) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-warning) 8%, var(--color-background));
}
@utility btn-outline-info {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-info);
    --btn-border-color: color-mix(in oklab, var(--color-info) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-info) 8%, var(--color-background));
}
```

```css title="dark"
@utility btn-outline-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-muted-foreground);
    --btn-border-color: var(--color-foreground);
}

@utility btn-outline-primary {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-primary);
    --btn-border-color: color-mix(in oklab, var(--color-primary) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-primary) 8%, var(--color-background));
}
@utility btn-outline-destructive {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-destructive);
    --btn-border-color: color-mix(in oklab, var(--color-destructive) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-destructive) 8%, var(--color-background));
}
@utility btn-outline-success {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-success);
    --btn-border-color: color-mix(in oklab, var(--color-success) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-success) 8%, var(--color-background));
}
@utility btn-outline-warning {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-warning);
    --btn-border-color: color-mix(in oklab, var(--color-warning) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-warning) 8%, var(--color-background));
}
@utility btn-outline-info {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-info);
    --btn-border-color: color-mix(in oklab, var(--color-info) 45%, transparent);
    --btn-hover-color: color-mix(in oklab, var(--color-info) 8%, var(--color-background));
}
```
:::

::::preview-box
:::raw
<x-docs.demo-buttons variant="outline" />
:::
::::

### Soft variants

:::tabs
```css title="both"
@utility btn-soft-primary {
    --btn-color: var(--color-primary);
    --btn-fg: var(--color-primary);

    &:is(.dark *) {
        --btn-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
        --btn-fg: var(--color-primary);
    }
}

@utility btn-soft-destructive {
    --btn-color: var(--color-destructive);
    --btn-fg: var(--color-destructive);

    &:is(.dark *) {
        --btn-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
        --btn-fg: var(--color-destructive);
    }
}

@utility btn-soft-success {
    --btn-color: var(--color-success);
    --btn-fg: var(--color-success);

    &:is(.dark *) {
        --btn-color: color-mix(in oklab, var(--color-success) 15%, transparent);
        --btn-fg: var(--color-success);
    }
}

@utility btn-soft-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);

    &:is(.dark *) {
        --btn-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
        --btn-fg: var(--color-muted-foreground);
    }
}

@utility btn-soft-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-warning);
}
@utility btn-soft-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-info);
}
```

```css title="light"
@utility btn-soft-primary {
    --btn-color: var(--color-primary);
    --btn-fg: var(--color-primary);
}

@utility btn-soft-destructive {
    --btn-color: var(--color-destructive);
    --btn-fg: var(--color-destructive);
}

@utility btn-soft-success {
    --btn-color: var(--color-success);
    --btn-fg: var(--color-success);
}

@utility btn-soft-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);
}

@utility btn-soft-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-warning);
}
@utility btn-soft-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-info);
}
```

```css title="dark"
@utility btn-soft-primary {
    --btn-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --btn-fg: var(--color-primary);
}

@utility btn-soft-destructive {
    --btn-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --btn-fg: var(--color-destructive);
}

@utility btn-soft-success {
    --btn-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --btn-fg: var(--color-success);
}

@utility btn-soft-gray {
    --btn-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
    --btn-fg: var(--color-muted-foreground);
}

@utility btn-soft-warning {
    --btn-color: var(--color-warning);
    --btn-fg: var(--color-warning);
}
@utility btn-soft-info {
    --btn-color: var(--color-info);
    --btn-fg: var(--color-info);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-buttons variant="soft" />
:::
::::

### Ghost variants

:::tabs
```css title="both"
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-foreground);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-muted-foreground);
    }
}

@utility btn-ghost-destructive {
    --btn-color: transparent;
    --btn-fg: var(--color-destructive);
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-success);
    }
}
```

```css title="light"
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-foreground);
}

@utility btn-ghost-destructive {
    --btn-color: transparent;
    --btn-fg: var(--color-destructive);
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);
}
```

```css title="dark"
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-muted-foreground);
}

@utility btn-ghost-destructive {
    --btn-color: transparent;
    --btn-fg: var(--color-destructive);
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);
}
```
:::

::::preview-box
:::raw
<x-docs.demo-buttons variant="ghost" />
:::
::::
