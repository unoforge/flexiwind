<?php

return [
    'ui-outline-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);
}
CSS,
    ],
    'ui-outline-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-primary);
        --ui-border-color: var(--color-primary);
    }
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-destructive);
        --ui-border-color: var(--color-destructive);
    }
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-success);
        --ui-border-color: var(--color-success);
    }
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-foreground);
    --ui-border-color: var(--color-border);

    &:is(.dark *) {
        --ui-color: transparent;
        --ui-fg: var(--color-muted-foreground);
        --ui-border-color: var(--color-foreground);
    }
}
CSS,
    ],
    'ui-outline-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-outline-primary {
    --ui-color: transparent;
    --ui-fg: var(--color-primary);
    --ui-border-color: var(--color-primary);
}

@utility ui-outline-destructive {
    --ui-color: transparent;
    --ui-fg: var(--color-destructive);
    --ui-border-color: var(--color-destructive);
}

@utility ui-outline-success {
    --ui-color: transparent;
    --ui-fg: var(--color-success);
    --ui-border-color: var(--color-success);
}

@utility ui-outline-gray {
    --ui-color: transparent;
    --ui-fg: var(--color-muted-foreground);
    --ui-border-color: var(--color-foreground);
}
CSS,
    ],
];
