<?php

return [
    'btn-solid-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
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
CSS,
    ],
    'btn-solid-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
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
CSS,
    ],
    'btn-solid-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
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
CSS,
    ],
];
