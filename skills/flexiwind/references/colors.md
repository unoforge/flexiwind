## Color Tokens

Flexiwind uses semantic CSS variables and exposes them through Tailwind CSS v4 `@theme inline` utilities. Components should use semantic classes such as `bg-background `, `text-foreground`, `text-title-foreground`, `border-border`, and `text-destructive`.

Avoid hardcoded hex values and avoid legacy aliases such as `text-destructive`, `bg-danger`, `--color-bg`, or `--color-fg`.

## Theme Modes

Choose the mode during `php artisan flexi:init`.

| Mode | Description |
| --- | --- |
| Both | Defines `:root` light tokens and `.dark` tokens. Best default for apps with theme switching. |
| Light | Defines only light tokens in `:root`. |
| Dark | Defines dark-first tokens in `:root`. |

Theme stubs live in separate light and dark sets in the CLI. The generated `app.css` should be treated as the project theme entry point.

## Core Tokens

These are the public semantic variables authors should customize.

```css
:root {
    --background: hsl(0 0% 100%);
    --foreground: oklch(37% 0.013 285.805);
    --title-foreground: oklch(21% 0.006 285.885);

    --card: hsl(0 0% 100%);
    --card-foreground: var(--title-foreground);
    --popover: hsl(0 0% 100%);
    --popover-foreground: var(--foreground);
    --surface-background: oklch(98.5% 0 none);

    --primary: hsl(243 75% 59%);
    --primary-foreground: hsl(0 0% 100%);
    --secondary: hsl(187 92% 36%);
    --secondary-foreground: hsl(0 0% 100%);
    --accent: hsl(209 92% 36%);
    --accent-foreground: hsl(0 0% 100%);

    --muted: oklch(96.7% 0.001 286.375);
    --muted-foreground: oklch(44.2% 0.017 285.786);
    --destructive: oklch(57.7% 0.245 27.325);
    --destructive-foreground: hsl(0 0% 100%);
    --success: oklch(59.6% 0.145 163.225);
    --warning: oklch(64.6% 0.222 41.116);
    --info: oklch(58.8% 0.158 241.966);

    --border: oklch(92% 0.004 286.32);
    --input: oklch(92% 0.004 286.32);
    --ring: var(--primary);
    --border-strong: oklch(87.1% 0.006 286.286);
    --border-card: var(--border);
    --border-input: var(--input);
}
```

## Tailwind Mapping

The CLI registers tokens with `@theme inline`. Keep this mapping stable so utilities stay predictable.

```css
@theme inline {
    --color-background: var(--background);
    --color-foreground: var(--foreground);
    --color-title-foreground: var(--title-foreground);

    --color-card: var(--card);
    --color-card-foreground: var(--card-foreground);
    --color-popover: var(--popover);
    --color-popover-foreground: var(--popover-foreground);
    --color-surface: var(--surface-background);

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
    --color-border-strong: var(--border-strong);
    --color-border-card: var(--border-card);
    --color-border-input: var(--border-input);
}
```

## Usage

Use the generated utilities in components and snippets:

- Backgrounds: `bg-background `, `bg-muted`, `bg-card`, `surface-background`
- Text/icons: `text-foreground`, `text-title-foreground`, `text-muted-foreground`, `text-destructive`
- Borders/rings: `border-border`, `border-input`, `border-border-strong`, `ring-ring`

Use `destructive` for public intent names. `danger` may be normalized internally for backwards compatibility, but new examples and docs should not use it.
