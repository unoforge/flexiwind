<?php


return [
    'ui-soft-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-soft-success {
    --ui-soft-bg: --alpha(var(--color-success-100) / 40%);
    --ui-soft-text: var(--color-success-600);
}

@utility ui-soft-warning {
    --ui-soft-bg: --alpha(var(--color-warning-100) / 40%);
    --ui-soft-text: var(--color-warning-600);
}

@utility ui-soft-danger {
    --ui-soft-bg: --alpha(var(--color-danger-100) / 40%);
    --ui-soft-text: var(--color-danger-600);
}
CSS,
    ],
    'ui-soft-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-soft-success {
    --ui-soft-bg: --alpha(var(--color-success-100) / 40%);
    --ui-soft-text: var(--color-success-600);

    &:is(.dark *) {
        --ui-soft-bg: --alpha(var(--color-success-900) / 30%);
        --ui-soft-text: var(--color-success-300);
    }
}

@utility ui-soft-warning {
    --ui-soft-bg: --alpha(var(--color-warning-100) / 40%);
    --ui-soft-text: var(--color-warning-600);

    &:is(.dark *) {
        --ui-soft-bg: --alpha(var(--color-warning-900) / 30%);
        --ui-soft-text: var(--color-warning-300);
    }
}

@utility ui-soft-danger {
    --ui-soft-bg: --alpha(var(--color-danger-100) / 40%);
    --ui-soft-text: var(--color-danger-600);

    &:is(.dark *) {
        --ui-soft-bg: --alpha(var(--color-danger-900) / 30%);
        --ui-soft-text: var(--color-danger-300);
    }
}
CSS,
    ],
    'ui-soft-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-soft-success {
        --ui-soft-bg: --alpha(var(--color-success-900) / 30%);
        --ui-soft-text: var(--color-success-300);
}

@utility ui-soft-warning {
    --ui-soft-bg: --alpha(var(--color-warning-900) / 30%);
    --ui-soft-text: var(--color-warning-300);
}

@utility ui-soft-danger {
    --ui-soft-bg: --alpha(var(--color-danger-900) / 30%);
    --ui-soft-text: var(--color-danger-300);
}
CSS,
    ],
];
