<?php


return [
    'ui-outline-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-outline-success {
    --ui-outline-border: var(--color-success-600);
    --ui-outline-text: var(--color-success-600);
}

@utility ui-outline-warning {
    --ui-outline-border: var(--color-warning-600);
    --ui-outline-text: var(--color-warning-600);
}

@utility ui-outline-danger {
    --ui-outline-border: var(--color-danger-600);
    --ui-outline-text: var(--color-danger-600);
}
CSS,
    ],
    'ui-outline-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-outline-success {
    --ui-outline-border: var(--color-success-600);
    --ui-outline-text: var(--color-success-600);

    &:is(.dark *) {
        --ui-outline-border: var(--color-secondary-500);
        --ui-outline-text: var(--color-secondary-500);
    }
}

@utility ui-outline-warning {
    --ui-outline-border: var(--color-warning-600);
    --ui-outline-text: var(--color-warning-600);

    &:is(.dark *) {
        --ui-outline-border: var(--color-warning-500);
        --ui-outline-text: var(--color-warning-500);
    }
}

@utility ui-outline-danger {
    --ui-outline-border: var(--color-danger-600);
    --ui-outline-text: var(--color-danger-600);

    &:is(.dark *) {
        --ui-outline-border: var(--color-danger-500);
        --ui-outline-text: var(--color-danger-500);
    }
}
CSS,
    ],
    'ui-outline-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-outline-success {
    --ui-outline-border: var(--color-secondary-500);
    --ui-outline-text: var(--color-secondary-500);
}

@utility ui-outline-warning {
    --ui-outline-border: var(--color-warning-500);
    --ui-outline-text: var(--color-warning-500);
}

@utility ui-outline-danger {
    --ui-outline-border: var(--color-danger-500);
    --ui-outline-text: var(--color-danger-500);
}
CSS,
    ],
];
