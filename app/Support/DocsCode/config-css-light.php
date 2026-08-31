<?php

return [
    'css-variables-color-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
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
CSS
    ],

];
