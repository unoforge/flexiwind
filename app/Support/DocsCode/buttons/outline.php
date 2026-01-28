<?php



return [
    'btn-outline-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility btn-outline-primary {
    --btn-outline-bg: var(--color-primary-50);
    --btn-outline-color: var(--color-primary-200);
    --btn-outline-text-color: var(--color-primary-800);
    --btn-outline-bg-hover: --alpha(var(--color-primary-100) / 60%);
}

@utility btn-outline-secondary {
    --btn-outline-bg: var(--color-secondary-50);
    --btn-outline-color: var(--color-secondary-200);
    --btn-outline-text-color: var(--color-secondary-800);
    --btn-outline-bg-hover: --alpha(var(--color-secondary-100) / 60%);
}

@utility btn-outline-accent {
    --btn-outline-bg: var(--color-accent-50);
    --btn-outline-color: var(--color-accent-200);
    --btn-outline-text-color: var(--color-accent-800);
    --btn-outline-color-hover: var(--color-accent-100);
}

@utility btn-outline-success {
    --btn-outline-bg: var(--color-success-50);
    --btn-outline-color: var(--color-success-200);
    --btn-outline-text-color: var(--color-success-800);
    --btn-outline-bg-hover: --alpha(var(--color-success-100) / 60%);
}

@utility btn-outline-warning {
    --btn-outline-bg: var(--color-warning-50);
    --btn-outline-color: var(--color-warning-200);
    --btn-outline-text-color: var(--color-warning-800);
    --btn-outline-bg-hover: --alpha(var(--color-warning-100) / 60%);
}

@utility btn-outline-info {
    --btn-outline-bg: var(--color-info-50);
    --btn-outline-color: var(--color-info-200);
    --btn-outline-text-color: var(--color-info-800);
    --btn-outline-bg-hover: --alpha(var(--color-info-100) / 60%);
}

@utility btn-outline-danger {
    --btn-outline-bg: var(--color-danger-50);
    --btn-outline-color: var(--color-danger-200);
    --btn-outline-text-color: var(--color-danger-800);
    --btn-outline-bg-hover: --alpha(var(--color-danger-100) / 60%);
}

@utility btn-outline-gray {
    --btn-outline-bg: var(--color-gray-50);
    --btn-outline-color: var(--color-gray-200);
    --btn-outline-text-color: var(--color-gray-800);
    --btn-outline-bg-hover: --alpha(var(--color-gray-100) / 60%);
}

@utility btn-outline-neutral {
    --btn-outline-bg: var(--color-gray-100);
    --btn-outline-color: var(--color-gray-300);
    --btn-outline-text-color: var(--color-gray-800);
    --btn-outline-bg-hover: --alpha(var(--color-gray-200) / 60%);
}
CSS,
    ],
    'btn-outline-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility btn-outline-primary {
    --btn-outline-bg: var(--color-primary-50);
    --btn-outline-color: var(--color-primary-200);
    --btn-outline-text-color: var(--color-primary-800);
    --btn-outline-bg-hover: --alpha(var(--color-primary-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-primary-500) / 30%);
        --btn-outline-text-color: var(--color-primary-300);
        --btn-outline-bg: --alpha(var(--color-primary-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-primary-500) / 10%);
    }
}

@utility btn-outline-secondary {
    --btn-outline-bg: var(--color-secondary-50);
    --btn-outline-color: var(--color-secondary-200);
    --btn-outline-text-color: var(--color-secondary-800);
    --btn-outline-bg-hover: --alpha(var(--color-secondary-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-secondary-500) / 30%);
        --btn-outline-text-color: var(--color-secondary-300);
        --btn-outline-bg: --alpha(var(--color-secondary-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-secondary-500) / 10%);
    }
}

@utility btn-outline-accent {
    --btn-outline-bg: var(--color-accent-50);
    --btn-outline-color: var(--color-accent-200);
    --btn-outline-text-color: var(--color-accent-800);
    --btn-outline-color-hover: var(--color-accent-100);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-accent-500) / 30%);
        --btn-outline-text-color: var(--color-accent-300);
        --btn-outline-bg: --alpha(var(--color-accent-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-accent-500) / 10%);
    }
}

@utility btn-outline-success {
    --btn-outline-bg: var(--color-success-50);
    --btn-outline-color: var(--color-success-200);
    --btn-outline-text-color: var(--color-success-800);
    --btn-outline-bg-hover: --alpha(var(--color-success-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-success-500) / 30%);
        --btn-outline-text-color: var(--color-success-300);
        --btn-outline-bg: --alpha(var(--color-success-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-success-500) / 10%);
    }
}

@utility btn-outline-warning {
    --btn-outline-bg: var(--color-warning-50);
    --btn-outline-color: var(--color-warning-200);
    --btn-outline-text-color: var(--color-warning-800);
    --btn-outline-bg-hover: --alpha(var(--color-warning-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-warning-500) / 30%);
        --btn-outline-text-color: var(--color-warning-300);
        --btn-outline-bg: --alpha(var(--color-warning-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-warning-500) / 10%);
    }
}

@utility btn-outline-info {
    --btn-outline-bg: var(--color-info-50);
    --btn-outline-color: var(--color-info-200);
    --btn-outline-text-color: var(--color-info-800);
    --btn-outline-bg-hover: --alpha(var(--color-info-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-info-500) / 30%);
        --btn-outline-text-color: var(--color-info-300);
        --btn-outline-bg: --alpha(var(--color-info-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-info-500) / 10%);
    }
}

@utility btn-outline-danger {
    --btn-outline-bg: var(--color-danger-50);
    --btn-outline-color: var(--color-danger-200);
    --btn-outline-text-color: var(--color-danger-800);
    --btn-outline-bg-hover: --alpha(var(--color-danger-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-danger-500) / 30%);
        --btn-outline-text-color: var(--color-danger-300);
        --btn-outline-bg: --alpha(var(--color-danger-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-danger-500) / 10%);
    }
}

@utility btn-outline-gray {
    --btn-outline-bg: var(--color-gray-50);
    --btn-outline-color: var(--color-gray-200);
    --btn-outline-text-color: var(--color-gray-800);
    --btn-outline-bg-hover: --alpha(var(--color-gray-100) / 60%);

    &:is(.dark *) {
        --btn-outline-color: --alpha(var(--color-gray-500) / 30%);
        --btn-outline-text-color: var(--color-gray-300);
        --btn-outline-bg: --alpha(var(--color-gray-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-gray-500) / 15%);
    }
}

@utility btn-outline-neutral {
    --btn-outline-bg: var(--color-gray-100);
    --btn-outline-color: var(--color-gray-300);
    --btn-outline-text-color: var(--color-gray-800);
    --btn-outline-bg-hover: --alpha(var(--color-gray-200) / 60%);

    &:is(.dark *) {
        --btn-outline-color: var(--color-white);
        --btn-outline-text-color: var(--color-white);
        --btn-outline-bg: --alpha(var(--color-gray-500) / 5%);
        --btn-outline-bg-hover: --alpha(var(--color-gray-500) / 10%);
    }
}
CSS,
    ],
    'btn-outline-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility btn-outline-primary {
    --btn-outline-color: --alpha(var(--color-primary-500) / 30%);
    --btn-outline-text-color: var(--color-primary-300);
    --btn-outline-bg: --alpha(var(--color-primary-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-primary-500) / 10%);
}

@utility btn-outline-secondary {
    --btn-outline-color: --alpha(var(--color-secondary-500) / 30%);
    --btn-outline-text-color: var(--color-secondary-300);
    --btn-outline-bg: --alpha(var(--color-secondary-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-secondary-500) / 10%);
}

@utility btn-outline-accent {
    --btn-outline-color: --alpha(var(--color-accent-500) / 30%);
    --btn-outline-text-color: var(--color-accent-300);
    --btn-outline-bg: --alpha(var(--color-accent-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-accent-500) / 10%);
}

@utility btn-outline-success {
    --btn-outline-color: --alpha(var(--color-success-500) / 30%);
    --btn-outline-text-color: var(--color-success-300);
    --btn-outline-bg: --alpha(var(--color-success-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-success-500) / 10%);
}

@utility btn-outline-warning {
    --btn-outline-color: --alpha(var(--color-warning-500) / 30%);
    --btn-outline-text-color: var(--color-warning-300);
    --btn-outline-bg: --alpha(var(--color-warning-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-warning-500) / 10%);
}

@utility btn-outline-info {
    --btn-outline-color: --alpha(var(--color-info-500) / 30%);
    --btn-outline-text-color: var(--color-info-300);
    --btn-outline-bg: --alpha(var(--color-info-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-info-500) / 10%);
}

@utility btn-outline-danger {
    --btn-outline-color: --alpha(var(--color-danger-500) / 30%);
    --btn-outline-text-color: var(--color-danger-300);
    --btn-outline-bg: --alpha(var(--color-danger-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-danger-500) / 10%);
}

@utility btn-outline-gray {
    --btn-outline-color: --alpha(var(--color-gray-500) / 30%);
    --btn-outline-text-color: var(--color-gray-300);
    --btn-outline-bg: --alpha(var(--color-gray-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-gray-500) / 15%);
}

@utility btn-outline-neutral {
    --btn-outline-color: var(--color-white);
    --btn-outline-text-color: var(--color-white);
    --btn-outline-bg: --alpha(var(--color-gray-500) / 5%);
    --btn-outline-bg-hover: --alpha(var(--color-gray-500) / 10%);
}
CSS,
    ],
];
