<?php

return [
    'ui-subtle-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-subtle-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);
}
CSS,
    ],
    'ui-subtle-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
        --ui-fg: var(--color-primary);
        --ui-border-color: color-mix(in oklab, var(--color-primary) 30%, transparent);
    }
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
        --ui-fg: var(--color-destructive);
        --ui-border-color: color-mix(in oklab, var(--color-destructive) 30%, transparent);
    }
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
        --ui-fg: var(--color-success);
        --ui-border-color: color-mix(in oklab, var(--color-success) 30%, transparent);
    }
}

@utility ui-subtle-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
        --ui-fg: var(--color-muted-foreground);
        --ui-border-color: color-mix(in oklab, var(--color-muted-foreground) 30%, transparent);
    }
}
CSS,
    ],
    'ui-subtle-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-subtle-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
    --ui-border-color: color-mix(in oklab, var(--color-primary) 30%, transparent);
}

@utility ui-subtle-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
    --ui-border-color: color-mix(in oklab, var(--color-destructive) 30%, transparent);
}

@utility ui-subtle-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
    --ui-border-color: color-mix(in oklab, var(--color-success) 30%, transparent);
}

@utility ui-subtle-gray {
    --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
    --ui-fg: var(--color-muted-foreground);
    --ui-border-color: color-mix(in oklab, var(--color-muted-foreground) 30%, transparent);
}
CSS,
    ],
];
