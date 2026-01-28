<?php

$btnSoftLight = <<<'CSS'
@utility btn-soft-primary {
    --btn-soft-bg-color: var(--color-primary-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-primary-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-primary-400) / 40%);
    --btn-soft-text-color: var(--color-primary-600);
    --btn-soft-text-color-hover: var(--color-primary-700);
}

@utility btn-soft-secondary {
    --btn-soft-bg-color: var(--color-secondary-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-secondary-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-secondary-400) / 40%);
    --btn-soft-text-color: var(--color-secondary-600);
    --btn-soft-text-color-hover: var(--color-secondary-700);
}

@utility btn-soft-accent {
    --btn-soft-bg-color: var(--color-accent-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-accent-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-accent-400) / 40%);
    --btn-soft-text-color: var(--color-accent-600);
    --btn-soft-text-color-hover: var(--color-accent-700);
}

@utility btn-soft-success {
    --btn-soft-bg-color: var(--color-success-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-success-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-success-400) / 40%);
    --btn-soft-text-color: var(--color-success-600);
    --btn-soft-text-color-hover: var(--color-success-700);
}

@utility btn-soft-warning {
    --btn-soft-bg-color: var(--color-warning-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-warning-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-warning-400) / 40%);
    --btn-soft-text-color: var(--color-warning-600);
    --btn-soft-text-color-hover: var(--color-warning-700);
}

@utility btn-soft-info {
    --btn-soft-bg-color: var(--color-info-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-info-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-info-400) / 40%);
    --btn-soft-text-color: var(--color-info-600);
    --btn-soft-text-color-hover: var(--color-info-700);
}

@utility btn-soft-danger {
    --btn-soft-bg-color: var(--color-danger-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-danger-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-danger-400) / 40%);
    --btn-soft-text-color: var(--color-danger-600);
    --btn-soft-text-color-hover: var(--color-danger-700);
}

@utility btn-soft-gray {
    --btn-soft-bg-color: var(--color-gray-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-gray-200) / 75%);
    --btn-soft-bg-color-press: --alpha(var(--color-gray-200) / 80%);
    --btn-soft-text-color: var(--color-gray-800);
    --btn-soft-text-color-hover: var(--color-gray-900);
}

@utility btn-soft-neutral {
    --btn-soft-bg-color: var(--color-gray-100);
    --btn-soft-bg-color-hover: var(--color-gray-900);
    --btn-soft-bg-color-press: var(--color-gray-950);
    --btn-soft-text-color: var(--color-gray-900);
    --btn-soft-text-color-hover: var(--color-white);
}
CSS;


$btnSoftBoth = <<<'CSS'
@utility btn-soft-primary {
    --btn-soft-bg-color: var(--color-primary-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-primary-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-primary-400) / 40%);
    --btn-soft-text-color: var(--color-primary-600);
    --btn-soft-text-color-hover: var(--color-primary-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-primary-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-primary-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-primary-600) / 25%);
        --btn-soft-text-color: var(--color-primary-300);
        --btn-soft-text-color-hover: var(--color-primary-300);
    }
}

@utility btn-soft-secondary {
    --btn-soft-bg-color: var(--color-secondary-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-secondary-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-secondary-400) / 40%);
    --btn-soft-text-color: var(--color-secondary-600);
    --btn-soft-text-color-hover: var(--color-secondary-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-secondary-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-secondary-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-secondary-600) / 25%);
        --btn-soft-text-color: var(--color-secondary-300);
        --btn-soft-text-color-hover: var(--color-secondary-300);
    }
}

@utility btn-soft-accent {
    --btn-soft-bg-color: var(--color-accent-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-accent-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-accent-400) / 40%);
    --btn-soft-text-color: var(--color-accent-600);
    --btn-soft-text-color-hover: var(--color-accent-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-accent-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-accent-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-accent-600) / 25%);
        --btn-soft-text-color: var(--color-accent-300);
        --btn-soft-text-color-hover: var(--color-accent-300);
    }
}

@utility btn-soft-success {
    --btn-soft-bg-color: var(--color-success-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-success-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-success-400) / 40%);
    --btn-soft-text-color: var(--color-success-600);
    --btn-soft-text-color-hover: var(--color-success-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-success-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-success-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-success-600) / 25%);
        --btn-soft-text-color: var(--color-success-300);
        --btn-soft-text-color-hover: var(--color-success-300);
    }
}

@utility btn-soft-warning {
    --btn-soft-bg-color: var(--color-warning-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-warning-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-warning-400) / 40%);
    --btn-soft-text-color: var(--color-warning-600);
    --btn-soft-text-color-hover: var(--color-warning-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-warning-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-warning-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-warning-600) / 25%);
        --btn-soft-text-color: var(--color-warning-300);
        --btn-soft-text-color-hover: var(--color-warning-300);
    }
}

@utility btn-soft-info {
    --btn-soft-bg-color: var(--color-info-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-info-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-info-400) / 40%);
    --btn-soft-text-color: var(--color-info-600);
    --btn-soft-text-color-hover: var(--color-info-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-info-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-info-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-info-600) / 25%);
        --btn-soft-text-color: var(--color-info-300);
        --btn-soft-text-color-hover: var(--color-info-300);
    }
}

@utility btn-soft-danger {
    --btn-soft-bg-color: var(--color-danger-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-danger-400) / 60%);
    --btn-soft-bg-color-press: --alpha(var(--color-danger-400) / 40%);
    --btn-soft-text-color: var(--color-danger-600);
    --btn-soft-text-color-hover: var(--color-danger-700);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-danger-600) / 15%);
        --btn-soft-bg-color-hover: --alpha(var(--color-danger-600) / 30%);
        --btn-soft-bg-color-press: --alpha(var(--color-danger-600) / 25%);
        --btn-soft-text-color: var(--color-danger-300);
        --btn-soft-text-color-hover: var(--color-danger-300);
    }
}

@utility btn-soft-gray {
    --btn-soft-bg-color: var(--color-gray-50);
    --btn-soft-bg-color-hover: --alpha(var(--color-gray-200) / 75%);
    --btn-soft-bg-color-press: --alpha(var(--color-gray-200) / 80%);
    --btn-soft-text-color: var(--color-gray-800);
    --btn-soft-text-color-hover: var(--color-gray-900);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-gray-600) / 20%);
        --btn-soft-bg-color-hover: --alpha(var(--color-gray-600) / 40%);
        --btn-soft-bg-color-press: --alpha(var(--color-gray-600) / 25%);
        --btn-soft-text-color: var(--color-gray-100);
        --btn-soft-text-color-hover: var(--color-gray-50);
    }
}

@utility btn-soft-neutral {
    --btn-soft-bg-color: var(--color-gray-100);
    --btn-soft-bg-color-hover: var(--color-gray-900);
    --btn-soft-bg-color-press: var(--color-gray-950);
    --btn-soft-text-color: var(--color-gray-900);
    --btn-soft-text-color-hover: var(--color-white);

    &:is(.dark *) {
        --btn-soft-bg-color: --alpha(var(--color-gray-700) / 60%);
        --btn-soft-bg-color-hover: var(--color-white);
        --btn-soft-bg-color-press: var(--color-gray-200);
        --btn-soft-text-color: var(--color-gray-100);
        --btn-soft-text-color-hover: var(--color-gray-950);
    }
}
CSS;

return [
    'btn-soft-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => $btnSoftLight,
    ],
    'btn-soft-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => $btnSoftBoth,
    ],
    'btn-soft-dark' => [
        'lang' => 'css',
        'name' => 'dark.css',
        'code' => <<<'CSS'
@utility btn-soft-primary {
    --btn-soft-bg-color: --alpha(var(--color-primary-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-primary-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-primary-600) / 25%);
    --btn-soft-text-color: var(--color-primary-300);
    --btn-soft-text-color-hover: var(--color-primary-300);
}

@utility btn-soft-secondary {
    --btn-soft-bg-color: --alpha(var(--color-secondary-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-secondary-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-secondary-600) / 25%);
    --btn-soft-text-color: var(--color-secondary-300);
    --btn-soft-text-color-hover: var(--color-secondary-300);
}

@utility btn-soft-accent {
    --btn-soft-bg-color: --alpha(var(--color-accent-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-accent-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-accent-600) / 25%);
    --btn-soft-text-color: var(--color-accent-300);
    --btn-soft-text-color-hover: var(--color-accent-300);
}

@utility btn-soft-success {
    --btn-soft-bg-color: --alpha(var(--color-success-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-success-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-success-600) / 25%);
    --btn-soft-text-color: var(--color-success-300);
    --btn-soft-text-color-hover: var(--color-success-300);
}

@utility btn-soft-warning {
    --btn-soft-bg-color: --alpha(var(--color-warning-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-warning-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-warning-600) / 25%);
    --btn-soft-text-color: var(--color-warning-300);
    --btn-soft-text-color-hover: var(--color-warning-300);
}

@utility btn-soft-info {
    --btn-soft-bg-color: --alpha(var(--color-info-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-info-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-info-600) / 25%);
    --btn-soft-text-color: var(--color-info-300);
    --btn-soft-text-color-hover: var(--color-info-300);
}

@utility btn-soft-danger {
    --btn-soft-bg-color: --alpha(var(--color-danger-600) / 15%);
    --btn-soft-bg-color-hover: --alpha(var(--color-danger-600) / 30%);
    --btn-soft-bg-color-press: --alpha(var(--color-danger-600) / 25%);
    --btn-soft-text-color: var(--color-danger-300);
    --btn-soft-text-color-hover: var(--color-danger-300);
}

@utility btn-soft-gray {
    --btn-soft-bg-color: --alpha(var(--color-gray-600) / 20%);
    --btn-soft-bg-color-hover: --alpha(var(--color-gray-600) / 40%);
    --btn-soft-bg-color-press: --alpha(var(--color-gray-600) / 25%);
    --btn-soft-text-color: var(--color-gray-100);
    --btn-soft-text-color-hover: var(--color-gray-50);
}

@utility btn-soft-neutral {
    --btn-soft-bg-color: --alpha(var(--color-gray-700) / 60%);
    --btn-soft-bg-color-hover: var(--color-white);
    --btn-soft-bg-color-press: var(--color-gray-200);
    --btn-soft-text-color: var(--color-gray-100);
    --btn-soft-text-color-hover: var(--color-gray-950);
}
CSS,
    ],
];
