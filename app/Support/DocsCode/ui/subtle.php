<?php


return [
    'ui-subtle-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-subtle-success {
    --ui-subtle-bg: --alpha(var(--color-success-100) / 40%);
    --ui-subtle-text: var(--color-success-600);
    --ui-subtle-border: var(--color-success-300);
}

@utility ui-subtle-warning {
    --ui-subtle-bg: --alpha(var(--color-warning-100) / 40%);
    --ui-subtle-text: var(--color-warning-600);
    --ui-subtle-border: var(--color-warning-300);
}

@utility ui-subtle-danger {
    --ui-subtle-bg: --alpha(var(--color-danger-100) / 40%);
    --ui-subtle-text: var(--color-danger-600);
    --ui-subtle-border: var(--color-danger-300);
}

CSS,
    ],
    'ui-subtle-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-subtle-success {
    --ui-subtle-bg: --alpha(var(--color-success-100) / 40%);
    --ui-subtle-text: var(--color-success-600);
    --ui-subtle-border: var(--color-success-300);

    &:is(.dark *) {
        --ui-subtle-bg: --alpha(var(--color-success-900) / 30%);
        --ui-subtle-text: var(--color-success-300);
        --ui-subtle-border: --alpha(var(--color-success-900) / 60%);
    }
}

@utility ui-subtle-warning {
    --ui-subtle-bg: --alpha(var(--color-warning-100) / 40%);
    --ui-subtle-text: var(--color-warning-600);
    --ui-subtle-border: var(--color-warning-300);

    &:is(.dark *) {
        --ui-subtle-bg: --alpha(var(--color-warning-900) / 30%);
        --ui-subtle-text: var(--color-warning-300);
        --ui-subtle-border: --alpha(var(--color-warning-900) / 60%);
    }
}

@utility ui-subtle-danger {
    --ui-subtle-bg: --alpha(var(--color-danger-100) / 40%);
    --ui-subtle-text: var(--color-danger-600);
    --ui-subtle-border: var(--color-danger-300);

    &:is(.dark *) {
        --ui-subtle-bg: --alpha(var(--color-danger-900) / 30%);
        --ui-subtle-text: var(--color-danger-300);
        --ui-subtle-border: --alpha(var(--color-danger-900) / 60%);
    }
}
CSS,
    ],
    'ui-subtle-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-subtle-success {
    --ui-subtle-bg: --alpha(var(--color-success-900) / 30%);
    --ui-subtle-text: var(--color-success-300);
    --ui-subtle-border: --alpha(var(--color-success-900) / 60%);
}

@utility ui-subtle-warning {
    --ui-subtle-bg: --alpha(var(--color-warning-900) / 30%);
    --ui-subtle-text: var(--color-warning-300);
    --ui-subtle-border: --alpha(var(--color-warning-900) / 60%);
}

@utility ui-subtle-danger {
    --ui-subtle-bg: --alpha(var(--color-danger-900) / 30%);
    --ui-subtle-text: var(--color-danger-300);
    --ui-subtle-border: --alpha(var(--color-danger-900) / 60%);
}
CSS,
    ],
];
