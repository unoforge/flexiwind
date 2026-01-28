<?php

return [
    'btn-ghost-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility btn-ghost-primary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-primary-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-primary-100) / 70%);
    --btn-ghost-text-color: var(--color-primary-600);
    --btn-ghost-text-color-hover: var(--color-primary-700);
}

@utility btn-ghost-secondary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-secondary-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-secondary-100) / 70%);
    --btn-ghost-text-color: var(--color-secondary-600);
    --btn-ghost-text-color-hover: var(--color-secondary-700);
}

@utility btn-ghost-accent {
    --btn-ghost-bg-color-hover: --alpha(var(--color-accent-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-accent-100) / 70%);
    --btn-ghost-text-color: var(--color-accent-600);
    --btn-ghost-text-color-hover: var(--color-accent-700);
}

@utility btn-ghost-success {
    --btn-ghost-bg-color-hover: --alpha(var(--color-success-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-success-100) / 70%);
    --btn-ghost-text-color: var(--color-success-600);
    --btn-ghost-text-color-hover: var(--color-success-700);
}

@utility btn-ghost-warning {
    --btn-ghost-bg-color-hover: --alpha(var(--color-warning-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-warning-100) / 70%);
    --btn-ghost-text-color: var(--color-warning-600);
    --btn-ghost-text-color-hover: var(--color-warning-700);
}

@utility btn-ghost-info {
    --btn-ghost-bg-color-hover: --alpha(var(--color-info-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-info-100) / 70%);
    --btn-ghost-text-color: var(--color-info-600);
    --btn-ghost-text-color-hover: var(--color-info-700);
}

@utility btn-ghost-danger {
    --btn-ghost-bg-color-hover: --alpha(var(--color-danger-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-danger-100) / 70%);
    --btn-ghost-text-color: var(--color-danger-600);
    --btn-ghost-text-color-hover: var(--color-danger-700);
}

@utility btn-ghost-gray {
    --btn-ghost-bg-color-hover: --alpha(var(--color-gray-200) / 40%);
    --btn-ghost-bg-color-press: --alpha(var(--color-gray-200) / 75%);
    --btn-ghost-text-color: var(--color-gray-800);
    --btn-ghost-text-color-hover: var(--color-gray-900);
}

@utility btn-ghost-neutral {
    --btn-ghost-bg-color-hover: var(--color-gray-950);
    --btn-ghost-bg-color-press: var(--color-gray-900);
    --btn-ghost-text-color: var(--color-gray-900);
    --btn-ghost-text-color-hover: var(--color-white);
}
CSS,
    ],
    'btn-ghost-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility btn-ghost-primary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-primary-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-primary-600) / 25%);
    --btn-ghost-text-color: var(--color-primary-300);
    --btn-ghost-text-color-hover: var(--color-primary-200);
}

@utility btn-ghost-secondary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-secondary-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-secondary-600) / 25%);
    --btn-ghost-text-color: var(--color-secondary-300);
    --btn-ghost-text-color-hover: var(--color-secondary-200);
}

@utility btn-ghost-accent {
    --btn-ghost-bg-color-hover: --alpha(var(--color-accent-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-accent-600) / 25%);
    --btn-ghost-text-color: var(--color-accent-300);
    --btn-ghost-text-color-hover: var(--color-accent-200);
}

@utility btn-ghost-success {
    --btn-ghost-bg-color-hover: --alpha(var(--color-success-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-success-600) / 25%);
    --btn-ghost-text-color: var(--color-success-300);
    --btn-ghost-text-color-hover: var(--color-success-200);
}

@utility btn-ghost-warning {
    --btn-ghost-bg-color-hover: --alpha(var(--color-warning-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-warning-600) / 25%);
    --btn-ghost-text-color: var(--color-warning-300);
    --btn-ghost-text-color-hover: var(--color-warning-200);
}

@utility btn-ghost-info {
    --btn-ghost-bg-color-hover: --alpha(var(--color-info-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-info-600) / 25%);
    --btn-ghost-text-color: var(--color-info-300);
    --btn-ghost-text-color-hover: var(--color-info-200);
}

@utility btn-ghost-danger {
    --btn-ghost-bg-color-hover: --alpha(var(--color-danger-600) / 30%);
    --btn-ghost-bg-color-press: --alpha(var(--color-danger-600) / 25%);
    --btn-ghost-text-color: var(--color-danger-300);
    --btn-ghost-text-color-hover: var(--color-danger-200);
}

@utility btn-ghost-gray {
    --btn-ghost-bg-color-hover: --alpha(var(--color-gray-700) / 70%);
    --btn-ghost-bg-color-press: --alpha(var(--color-gray-800) / 60%);
    --btn-ghost-text-color: var(--color-gray-100);
    --btn-ghost-text-color-hover: var(--color-gray-50);
}

@utility btn-ghost-neutral {
    --btn-ghost-bg-color-hover: var(--color-white);
    --btn-ghost-bg-color-press: var(--color-gray-200);
    --btn-ghost-text-color: var(--color-gray-100);
    --btn-ghost-text-color-hover: var(--color-gray-950);
}
CSS,
    ],
    'btn-ghost-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility btn-ghost-primary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-primary-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-primary-100) / 70%);
    --btn-ghost-text-color: var(--color-primary-600);
    --btn-ghost-text-color-hover: var(--color-primary-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-primary-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-primary-600) / 25%);
        --btn-ghost-text-color: var(--color-primary-300);
        --btn-ghost-text-color-hover: var(--color-primary-200);
    }
}

@utility btn-ghost-secondary {
    --btn-ghost-bg-color-hover: --alpha(var(--color-secondary-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-secondary-100) / 70%);
    --btn-ghost-text-color: var(--color-secondary-600);
    --btn-ghost-text-color-hover: var(--color-secondary-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-secondary-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-secondary-600) / 25%);
        --btn-ghost-text-color: var(--color-secondary-300);
        --btn-ghost-text-color-hover: var(--color-secondary-200);
    }
}

@utility btn-ghost-accent {
    --btn-ghost-bg-color-hover: --alpha(var(--color-accent-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-accent-100) / 70%);
    --btn-ghost-text-color: var(--color-accent-600);
    --btn-ghost-text-color-hover: var(--color-accent-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-accent-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-accent-600) / 25%);
        --btn-ghost-text-color: var(--color-accent-300);
        --btn-ghost-text-color-hover: var(--color-accent-200);
    }
}

@utility btn-ghost-success {
    --btn-ghost-bg-color-hover: --alpha(var(--color-success-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-success-100) / 70%);
    --btn-ghost-text-color: var(--color-success-600);
    --btn-ghost-text-color-hover: var(--color-success-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-success-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-success-600) / 25%);
        --btn-ghost-text-color: var(--color-success-300);
        --btn-ghost-text-color-hover: var(--color-success-200);
    }
}

@utility btn-ghost-warning {
    --btn-ghost-bg-color-hover: --alpha(var(--color-warning-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-warning-100) / 70%);
    --btn-ghost-text-color: var(--color-warning-600);
    --btn-ghost-text-color-hover: var(--color-warning-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-warning-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-warning-600) / 25%);
        --btn-ghost-text-color: var(--color-warning-300);
        --btn-ghost-text-color-hover: var(--color-warning-200);
    }
}

@utility btn-ghost-info {
    --btn-ghost-bg-color-hover: --alpha(var(--color-info-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-info-100) / 70%);
    --btn-ghost-text-color: var(--color-info-600);
    --btn-ghost-text-color-hover: var(--color-info-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-info-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-info-600) / 25%);
        --btn-ghost-text-color: var(--color-info-300);
        --btn-ghost-text-color-hover: var(--color-info-200);
    }
}

@utility btn-ghost-danger {
    --btn-ghost-bg-color-hover: --alpha(var(--color-danger-100) / 50%);
    --btn-ghost-bg-color-press: --alpha(var(--color-danger-100) / 70%);
    --btn-ghost-text-color: var(--color-danger-600);
    --btn-ghost-text-color-hover: var(--color-danger-700);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-danger-600) / 30%);
        --btn-ghost-bg-color-press: --alpha(var(--color-danger-600) / 25%);
        --btn-ghost-text-color: var(--color-danger-300);
        --btn-ghost-text-color-hover: var(--color-danger-200);
    }
}

@utility btn-ghost-gray {
    --btn-ghost-bg-color-hover: --alpha(var(--color-gray-200) / 40%);
    --btn-ghost-bg-color-press: --alpha(var(--color-gray-200) / 75%);
    --btn-ghost-text-color: var(--color-gray-800);
    --btn-ghost-text-color-hover: var(--color-gray-900);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: --alpha(var(--color-gray-700) / 70%);
        --btn-ghost-bg-color-press: --alpha(var(--color-gray-800) / 60%);
        --btn-ghost-text-color: var(--color-gray-100);
        --btn-ghost-text-color-hover: var(--color-gray-50);
    }
}

@utility btn-ghost-neutral {
    --btn-ghost-bg-color-hover: var(--color-gray-950);
    --btn-ghost-bg-color-press: var(--color-gray-900);
    --btn-ghost-text-color: var(--color-gray-900);
    --btn-ghost-text-color-hover: var(--color-white);

    &:is(.dark *) {
        --btn-ghost-bg-color-hover: var(--color-white);
        --btn-ghost-bg-color-press: var(--color-gray-200);
        --btn-ghost-text-color: var(--color-gray-100);
        --btn-ghost-text-color-hover: var(--color-gray-950);
    }
}
CSS,
    ],
];
