<?php

return [
    'btn-ghost-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-foreground);
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);
}
CSS,
    ],
    'btn-ghost-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-muted-foreground);
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);
}
CSS,
    ],
    'btn-ghost-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility btn-ghost-gray {
    --btn-color: transparent;
    --btn-fg: var(--color-foreground);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-muted-foreground);
    }
}

@utility btn-ghost-success {
    --btn-color: transparent;
    --btn-fg: var(--color-success);

    &:is(.dark *) {
        --btn-color: transparent;
        --btn-fg: var(--color-success);
    }
}
CSS,
    ],
];
