<?php

return [
    'ui-soft-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
}

@utility ui-soft-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);
}
CSS,
    ],
    'ui-soft-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
        --ui-fg: var(--color-primary);
    }
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
        --ui-fg: var(--color-destructive);
    }
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
        --ui-fg: var(--color-success);
    }
}

@utility ui-soft-gray {
    --ui-color: var(--color-background);
    --ui-fg: var(--color-foreground);

    &:is(.dark *) {
        --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
        --ui-fg: var(--color-muted-foreground);
    }
}
CSS,
    ],
    'ui-soft-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-soft-primary {
    --ui-color: color-mix(in oklab, var(--color-primary) 15%, transparent);
    --ui-fg: var(--color-primary);
}

@utility ui-soft-destructive {
    --ui-color: color-mix(in oklab, var(--color-destructive) 15%, transparent);
    --ui-fg: var(--color-destructive);
}

@utility ui-soft-success {
    --ui-color: color-mix(in oklab, var(--color-success) 15%, transparent);
    --ui-fg: var(--color-success);
}

@utility ui-soft-gray {
    --ui-color: color-mix(in oklab, var(--color-muted-foreground) 15%, transparent);
    --ui-fg: var(--color-muted-foreground);
}
CSS,
    ],
];
