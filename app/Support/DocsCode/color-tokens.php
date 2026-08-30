<?php

return [
    'css-variables-colors' => [
        'lang' => 'css',
        'name' => 'app.css',
        'code' => <<<'CSS'
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
CSS
    ],

];
