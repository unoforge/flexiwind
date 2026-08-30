# Styling Principles

Use this reference for Flexiwind theming and visual consistency.

## Public Docs

- `https://flexiwind.unoforge.com/docs/theme`
- `https://flexiwind.unoforge.com/docs/theme/colors`
- `https://flexiwind.unoforge.com/docs/theme/buttons`
- `https://flexiwind.unoforge.com/docs/theme/utilities`
- `https://flexiwind.unoforge.com/docs/dark-mode`

## Core Principles

- Use semantic tokens instead of hardcoded color values.
- Change token values in the theme layer instead of patching each component one by one.
- Keep token names stable so existing utilities keep working.
- Reuse documented utilities such as `ui-card` and `inner-radius` where applicable.

## Verified Theme Vocabulary

Documented semantic roles include:

- `primary`
- `secondary`
- `accent`
- `info`
- `success`
- `warning`
- `destructive`
- `gray`

Documented utility-oriented token families include:

- background tokens such as `bg-background `, `bg-muted`, `bg-card`
- foreground tokens such as `text-foreground` and `text-muted-foreground`
- border tokens such as `border-border` and `border-border-strong`

## Dark Mode

The docs describe two supported approaches:

- Livewire or Alpine based theme setup
- a non-Livewire path using Flexilla utilities

Choose the documented path that matches the project stack instead of mixing them.
