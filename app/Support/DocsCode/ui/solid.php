<?php

return [
    'ui-solid-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-muted);
    --ui-fg: var(--color-foreground);
}

@utility ui-solid-neutral {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-white);
}
CSS,
    ],
    'ui-solid-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-muted);
    --ui-fg: var(--color-foreground);

    &:is(.dark *) {
        --ui-color: var(--color-foreground);
        --ui-fg: var(--color-muted-foreground);
    }
}

@utility ui-solid-neutral {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-white);

    &:is(.dark *) {
        --ui-color: var(--color-white);
        --ui-fg: var(--color-foreground);
    }
}
CSS,
    ],
    'ui-solid-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-solid-primary {
    --ui-color: var(--color-primary);
    --ui-fg: var(--color-primary-foreground);
}

@utility ui-solid-secondary {
    --ui-color: var(--color-secondary);
    --ui-fg: var(--color-secondary-foreground);
}

@utility ui-solid-accent {
    --ui-color: var(--color-accent);
    --ui-fg: var(--color-accent-foreground);
}

@utility ui-solid-success {
    --ui-color: var(--color-success);
    --ui-fg: var(--color-white);
}

@utility ui-solid-destructive {
    --ui-color: var(--color-destructive);
    --ui-fg: var(--color-white);
}

@utility ui-solid-gray {
    --ui-color: var(--color-foreground);
    --ui-fg: var(--color-muted-foreground);
}

@utility ui-solid-neutral {
    --ui-color: var(--color-white);
    --ui-fg: var(--color-foreground);
}
CSS,
    ],
];
