<?php

return [
    'css-variables-color-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
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
CSS
    ],

];
