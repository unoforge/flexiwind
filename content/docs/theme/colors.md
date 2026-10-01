---
title: "Color Tokens"
group: "Design System"
order: 20
tier: "free"
description: "Semantic color tokens for backgrounds, text, borders, states, and emphasis. Built to support light and dark themes out of the box."
seoDescription: "Explore Flexiwind’s semantic color tokens for building accessible and theme-ready user interfaces."
keywords: "Color Tokens, Semantic Colors, UI Colors, Light Mode, Dark Mode, Design System"
---

## Prerequisites

Define semantic color variables in your CSS, then register them in `@theme` so Tailwind utilities like `bg-primary` and `text-foreground` are generated.

Avoid hardcoded hex values in components.
Change token values in one place and all components update automatically.

## Theme Modes

Choose one mode strategy based on product requirements.
Most applications should start with `both` to support light and dark interfaces.

| Mode | Description |
| --- | --- |
| `both` | Define variables for both light and dark modes. Best default for applications with user theme switching. |
| `light` | Define only light mode variables. Use this when dark mode is intentionally not supported. |
| `dark` | Define only dark mode variables. Useful for dark-first products and internal tools. |

## Variable Tokens

These are the CSS variables your theme defines. Update the values to match your brand,
but keep token names stable so utility usage in templates stays unchanged.

:::tabs
```css title="both"
:root {
    --primary: oklch(54.6% 0.215 262.88);
    --primary-foreground: oklch(100% 0 0);
    --secondary: oklch(62.7% 0.194 149.21);
    --secondary-foreground: oklch(100% 0 0);
    --accent: oklch(66.6% 0.179 58.32);
    --accent-foreground: oklch(100% 0 0);
    --destructive: oklch(57.7% 0.245 27.33);
    --destructive-foreground: oklch(100% 0 0);
    --success: oklch(62.7% 0.194 149.21);
    --warning: oklch(76.9% 0.188 70.08);
    --info: oklch(68.5% 0.169 237.32);

    --background: oklch(100% 0 0);
    --foreground: oklch(21% 0.034 264.67);
    --title-foreground: var(--card-foreground);
    --card: oklch(100% 0 0);
    --card-foreground: var(--foreground);
    --popover: oklch(100% 0 0);
    --popover-foreground: var(--foreground);
    --muted: oklch(96.7% 0.003 264.54);
    --muted-foreground: oklch(44.6% 0.03 256.8);

    --border: oklch(92.8% 0.006 264.53);
    --input: oklch(92.8% 0.006 264.53);
    --ring: var(--primary);

    --surface-background: oklch(98.5% 0.002 247.84);
    --border-strong: oklch(87.2% 0.01 258.34);
    --border-card: var(--border);
    --border-input: var(--input);
}

.dark {
    --primary: oklch(62.3% 0.214 259.82);
    --secondary: oklch(72.3% 0.192 149.58);
    --accent: oklch(76.9% 0.188 70.08);
    --accent-foreground: oklch(14.5% 0 0);
    --destructive: oklch(63.7% 0.237 25.33);
    --success: oklch(72.3% 0.192 149.58);

    --background: oklch(13% 0.028 261.69);
    --foreground: oklch(87.2% 0.01 258.34);
    --title-foreground: var(--card-foreground);
    --card: oklch(13% 0.028 261.69);
    --popover: oklch(13% 0.028 261.69);
    --muted: oklch(21% 0.034 264.67);
    --muted-foreground: oklch(70.7% 0.022 261.33);

    --border: oklch(21% 0.034 264.67);
    --input: oklch(27.8% 0.033 256.85);
    --ring: var(--primary);

    --surface-background: color-mix(in oklab, var(--muted) 70%, transparent);
    --border-strong: oklch(37.3% 0.034 259.73);
    --border-card: var(--input);
    --border-input: var(--input);
}
```

```css title="light"
:root {
    --primary: oklch(54.6% 0.215 262.88);
    --primary-foreground: oklch(100% 0 0);
    --secondary: oklch(62.7% 0.194 149.21);
    --secondary-foreground: oklch(100% 0 0);
    --accent: oklch(66.6% 0.179 58.32);
    --accent-foreground: oklch(100% 0 0);
    --destructive: oklch(57.7% 0.245 27.33);
    --destructive-foreground: oklch(100% 0 0);
    --success: oklch(62.7% 0.194 149.21);
    --warning: oklch(76.9% 0.188 70.08);
    --info: oklch(68.5% 0.169 237.32);

    --background: oklch(100% 0 0);
    --foreground: oklch(21% 0.034 264.67);
    --title-foreground: var(--card-foreground);
    --card: oklch(100% 0 0);
    --card-foreground: var(--foreground);
    --popover: oklch(100% 0 0);
    --popover-foreground: var(--foreground);
    --muted: oklch(96.7% 0.003 264.54);
    --muted-foreground: oklch(44.6% 0.03 256.8);

    --border: oklch(92.8% 0.006 264.53);
    --input: oklch(92.8% 0.006 264.53);
    --ring: var(--primary);

    --surface-background: oklch(98.5% 0.002 247.84);
    --border-strong: oklch(87.2% 0.01 258.34);
    --border-card: var(--border);
    --border-input: var(--input);
}
```

```css title="dark"
:root {
    --primary: oklch(62.3% 0.214 259.82);
    --primary-foreground: oklch(100% 0 0);
    --secondary: oklch(72.3% 0.192 149.58);
    --secondary-foreground: oklch(100% 0 0);
    --accent: oklch(76.9% 0.188 70.08);
    --accent-foreground: oklch(14.5% 0 0);
    --destructive: oklch(63.7% 0.237 25.33);
    --destructive-foreground: oklch(100% 0 0);
    --success: oklch(72.3% 0.192 149.58);
    --warning: oklch(76.9% 0.188 70.08);
    --info: oklch(68.5% 0.169 237.32);

    --background: oklch(13% 0.028 261.69);
    --foreground: oklch(87.2% 0.01 258.34);
    --title-foreground: var(--card-foreground);
    --card: oklch(13% 0.028 261.69);
    --card-foreground: var(--foreground);
    --popover: oklch(13% 0.028 261.69);
    --popover-foreground: var(--foreground);
    --muted: oklch(21% 0.034 264.67);
    --muted-foreground: oklch(70.7% 0.022 261.33);

    --border: oklch(21% 0.034 264.67);
    --input: oklch(27.8% 0.033 256.85);
    --ring: var(--primary);

    --surface-background: color-mix(in oklab, var(--muted) 70%, transparent);
    --border-strong: oklch(37.3% 0.034 259.73);
    --border-card: var(--input);
    --border-input: var(--input);
}
```
:::

## Theme Settings

Register your tokens in `@theme` so Tailwind generates utility classes for them.
This connects your CSS variables to classes like `bg-primary`, `text-foreground`, and `border-border`.

```css title="app.css"
@theme inline {
    --font-sans: "Geist Sans", ui-sans-serif, system-ui, sans-serif;
    --radius-ui: var(--ui-radius);
    --radius-card: var(--card-radius);

    /* ═══ Intent tokens ═══ */

    --color-background: var(--background);
    --color-foreground: var(--foreground);
    --color-title-foreground: var(--title-foreground);

    --color-card: var(--card);
    --color-card-foreground: var(--card-foreground);

    --color-popover: var(--popover);
    --color-popover-foreground: var(--popover-foreground);

    --color-primary: var(--primary);
    --color-primary-foreground: var(--primary-foreground);

    --color-secondary: var(--secondary);
    --color-secondary-foreground: var(--secondary-foreground);

    --color-accent: var(--accent);
    --color-accent-foreground: var(--accent-foreground);

    --color-muted: var(--muted);
    --color-muted-foreground: var(--muted-foreground);

    --color-destructive: var(--destructive);
    --color-destructive-foreground: var(--destructive-foreground);

    --color-success: var(--success);
    --color-warning: var(--warning);
    --color-info: var(--info);

    --color-border: var(--border);
    --color-input: var(--input);
    --color-ring: var(--ring);

    /* ═══ Flexiwind extensions ═══ */

    --color-surface: var(--surface-background);
    --color-border-strong: var(--border-strong);
    --color-border-card: var(--border-card);
    --color-border-input: var(--border-input);
}
```
