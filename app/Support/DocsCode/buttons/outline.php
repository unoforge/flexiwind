<?php

return [
    'btn-outline-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility btn-outline-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);
    --btn-border-color: var(--color-border);
}
CSS,
    ],
    'btn-outline-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility btn-outline-gray {
    --btn-color: var(--color-background);
    --btn-fg: var(--color-foreground);
    --btn-border-color: var(--color-border);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-muted-foreground);
        --btn-border-color: var(--color-foreground);
    }
}
CSS,
    ],
    'btn-outline-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility btn-outline-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-muted-foreground);
    --btn-border-color: var(--color-foreground);
}
CSS,
    ],
];
