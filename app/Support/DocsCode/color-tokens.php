<?php


return [
  'css-variables-colors' => [
    'lang' => 'css',
    'name' => 'app.css',
    'code' => <<<'CSS'
@theme inline {
    --font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --radius-ui: var(--radius-lg);
    --radius-card: var(--radius-lg);
    --radius-checkbox: var(--radius-md); 

    --color-white: var(--white);
    --color-dark: var(--color-gray-950);

    --color-primary: var(--primary);
    --color-secondary: var(--secondary);
    --color-accent: var(--accent);
    --color-info: var(--info);
    --color-warning: var(--warning);
    --color-danger: var(--danger);
    --color-success: var(--success);

    --color-fg-title: var(--fg-title);
    --color-fg-subtitle: var(--fg-subtitle);
    --color-fg: var(--fg);
    --color-fg-muted: var(--fg-muted);

    --color-bg: var(--bg);
    --color-bg-subtle: var(--bg-subtle);
    --color-bg-surface: var(--bg-surface);
    --color-bg-muted: var(--bg-muted);
    --color-bg-surface-elevated: var(--bg-surface-elevated);
    --color-card: var(--card);
    --color-card-gray: var(--card-gray);
    --color-popover: var(--bg);
    --color-popover-gray: var(--card-gray);
    --color-overlay: var(--overlay);
    --color-overlay-gray: var(--overlay-gray);
    --color-progressbar: var(--progressbar);

    --color-border-strong: var(--border-strong);
    --color-border-amphasis: var(--border-amphasis);
    --color-border: var(--border);
    --color-border-sub: var(--border-sub);
    --color-border-card: var(--border-card);
    --color-border-input: var(--border-input);



    --color-primary-50: ...;
    /* ... */
    --color-primary-950: ..;

    --color-secondary-50: ....;
    /* ..... */
    --color-secondary-950: ....;


    /* override the default gray  */
    --color-gray-50:...;
    /* ... */
    --color-gray-950:...;
}
CSS
  ]

];
