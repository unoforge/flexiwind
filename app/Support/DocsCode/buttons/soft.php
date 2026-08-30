<?php

return [
    'btn-soft-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
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
CSS,
    ],
    'btn-soft-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
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
CSS,
    ],
    'btn-soft-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
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
CSS,
    ],
];
