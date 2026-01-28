<?php


return [
    'btn-flexi-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility btn-flexi-primary {
    --btn-flexi-bg: var(--color-primary-600);
    --btn-flexi-hover-bg: var(--color-primary-700);
    --btn-flexi-active-bg: var(--color-primary-800);
    --btn-flexi-shadow-a: var(--color-primary-700);
    --btn-flexi-shadow-b: var(--color-primary-500);
    --btn-flexi-shadow-c: var(--color-primary-400);
    --btn-flexi-shadow-active-a: var(--color-primary-900);
    --btn-flexi-shadow-active-b: var(--color-primary-700);
    --btn-flexi-shadow-active-c: var(--color-primary-600);
}

@utility btn-flexi-secondary {
    --btn-flexi-bg: var(--color-secondary-600);
    --btn-flexi-hover-bg: var(--color-secondary-700);
    --btn-flexi-active-bg: var(--color-secondary-800);
    --btn-flexi-shadow-a: var(--color-secondary-700);
    --btn-flexi-shadow-b: var(--color-secondary-500);
    --btn-flexi-shadow-c: var(--color-secondary-400);
    --btn-flexi-shadow-active-a: var(--color-secondary-900);
    --btn-flexi-shadow-active-b: var(--color-secondary-700);
    --btn-flexi-shadow-active-c: var(--color-secondary-600);
}

@utility btn-flexi-accent {
    --btn-flexi-bg: var(--color-accent-600);
    --btn-flexi-hover-bg: var(--color-accent-700);
    --btn-flexi-active-bg: var(--color-accent-800);
    --btn-flexi-shadow-a: var(--color-accent-700);
    --btn-flexi-shadow-b: var(--color-accent-500);
    --btn-flexi-shadow-c: var(--color-accent-400);
    --btn-flexi-shadow-active-a: var(--color-accent-900);
    --btn-flexi-shadow-active-b: var(--color-accent-700);
    --btn-flexi-shadow-active-c: var(--color-accent-600);
}

@utility btn-flexi-success {
    --btn-flexi-bg: var(--color-success-600);
    --btn-flexi-hover-bg: var(--color-success-700);
    --btn-flexi-active-bg: var(--color-success-800);
    --btn-flexi-shadow-a: var(--color-success-700);
    --btn-flexi-shadow-b: var(--color-success-500);
    --btn-flexi-shadow-c: var(--color-success-400);
    --btn-flexi-shadow-active-a: var(--color-success-900);
    --btn-flexi-shadow-active-b: var(--color-success-700);
    --btn-flexi-shadow-active-c: var(--color-success-600);
}

@utility btn-flexi-danger {
    --btn-flexi-bg: var(--color-danger-600);
    --btn-flexi-hover-bg: var(--color-danger-700);
    --btn-flexi-active-bg: var(--color-danger-800);
    --btn-flexi-shadow-a: var(--color-danger-700);
    --btn-flexi-shadow-b: var(--color-danger-500);
    --btn-flexi-shadow-c: var(--color-danger-400);
    --btn-flexi-shadow-active-a: var(--color-danger-900);
    --btn-flexi-shadow-active-b: var(--color-danger-700);
    --btn-flexi-shadow-active-c: var(--color-danger-600);
}

@utility btn-flexi-warning {
    --btn-flexi-bg: var(--color-warning-600);
    --btn-flexi-hover-bg: var(--color-warning-700);
    --btn-flexi-active-bg: var(--color-warning-800);
    --btn-flexi-shadow-a: var(--color-warning-700);
    --btn-flexi-shadow-b: var(--color-warning-500);
    --btn-flexi-shadow-c: var(--color-warning-400);
    --btn-flexi-shadow-active-a: var(--color-warning-900);
    --btn-flexi-shadow-active-b: var(--color-warning-700);
    --btn-flexi-shadow-active-c: var(--color-warning-600);
}

@utility btn-flexi-info {
    --btn-flexi-bg: var(--color-info-600);
    --btn-flexi-hover-bg: var(--color-info-700);
    --btn-flexi-active-bg: var(--color-info-800);
    --btn-flexi-shadow-a: var(--color-info-700);
    --btn-flexi-shadow-b: var(--color-info-500);
    --btn-flexi-shadow-c: var(--color-info-400);
    --btn-flexi-shadow-active-a: var(--color-info-900);
    --btn-flexi-shadow-active-b: var(--color-info-700);
    --btn-flexi-shadow-active-c: var(--color-info-600);
}

@utility btn-flexi-white {
    --btn-flexi-bg: var(--color-white);
    --btn-flexi-hover-bg: var(--color-gray-100);
    --btn-flexi-active-bg: var(--color-gray-50);
    --btn-flexi-shadow-a: var(--color-gray-300);
    --btn-flexi-shadow-b: var(--color-gray-200);
    --btn-flexi-shadow-c: var(--color-gray-50);
    --btn-flexi-shadow-active-a: var(--color-gray-400);
    --btn-flexi-shadow-active-b: var(--color-gray-300);
    --btn-flexi-shadow-active-c: var(--color-gray-500);
}

@utility btn-flexi-gray {
    --btn-flexi-bg: var(--color-gray-600);
    --btn-flexi-hover-bg: var(--color-gray-700);
    --btn-flexi-active-bg: var(--color-gray-800);
    --btn-flexi-shadow-a: var(--color-gray-700);
    --btn-flexi-shadow-b: var(--color-gray-500);
    --btn-flexi-shadow-c: var(--color-gray-400);
    --btn-flexi-shadow-active-a: var(--color-gray-900);
    --btn-flexi-shadow-active-b: var(--color-gray-700);
    --btn-flexi-shadow-active-c: var(--color-gray-600);
}

@utility btn-flexi-neutral {
    --btn-flexi-bg: var(--color-gray-900);
    --btn-flexi-hover-bg: var(--color-gray-800);
    --btn-flexi-active-bg: var(--color-gray-950);
    --btn-flexi-shadow-a: var(--color-gray-700);
    --btn-flexi-shadow-b: var(--color-gray-500);
    --btn-flexi-shadow-c: var(--color-gray-400);
    --btn-flexi-shadow-active-a: var(--color-gray-700);
    --btn-flexi-shadow-active-b: var(--color-gray-600);
    --btn-flexi-shadow-active-c: var(--color-gray-500);
}
CSS,
    ],
    'btn-flexi-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility btn-flexi-primary {
    --btn-flexi-bg: var(--color-primary-600);
    --btn-flexi-hover-bg: var(--color-primary-700);
    --btn-flexi-active-bg: var(--color-primary-800);
    --btn-flexi-shadow-a: var(--color-primary-700);
    --btn-flexi-shadow-b: var(--color-primary-500);
    --btn-flexi-shadow-c: var(--color-primary-400);
    --btn-flexi-shadow-active-a: var(--color-primary-900);
    --btn-flexi-shadow-active-b: var(--color-primary-700);
    --btn-flexi-shadow-active-c: var(--color-primary-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-primary-500);
        --btn-flexi-hover-bg: var(--color-primary-600);
        --btn-flexi-active-bg: var(--color-primary-500);
        --btn-flexi-shadow-a: var(--color-primary-700);
        --btn-flexi-shadow-b: var(--color-primary-600);
        --btn-flexi-shadow-c: var(--color-primary-400);
        --btn-flexi-shadow-active-a: var(--color-primary-600);
        --btn-flexi-shadow-active-b: var(--color-primary-500);
        --btn-flexi-shadow-active-c: var(--color-primary-400);
    }
}

@utility btn-flexi-secondary {
    --btn-flexi-bg: var(--color-secondary-600);
    --btn-flexi-hover-bg: var(--color-secondary-700);
    --btn-flexi-active-bg: var(--color-secondary-800);
    --btn-flexi-shadow-a: var(--color-secondary-700);
    --btn-flexi-shadow-b: var(--color-secondary-500);
    --btn-flexi-shadow-c: var(--color-secondary-400);
    --btn-flexi-shadow-active-a: var(--color-secondary-900);
    --btn-flexi-shadow-active-b: var(--color-secondary-700);
    --btn-flexi-shadow-active-c: var(--color-secondary-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-secondary-500);
        --btn-flexi-hover-bg: var(--color-secondary-600);
        --btn-flexi-active-bg: var(--color-secondary-500);
        --btn-flexi-shadow-a: var(--color-secondary-700);
        --btn-flexi-shadow-b: var(--color-secondary-600);
        --btn-flexi-shadow-c: var(--color-secondary-400);
        --btn-flexi-shadow-active-a: var(--color-secondary-600);
        --btn-flexi-shadow-active-b: var(--color-secondary-500);
        --btn-flexi-shadow-active-c: var(--color-secondary-400);
    }
}

@utility btn-flexi-accent {
    --btn-flexi-bg: var(--color-accent-600);
    --btn-flexi-hover-bg: var(--color-accent-700);
    --btn-flexi-active-bg: var(--color-accent-800);
    --btn-flexi-shadow-a: var(--color-accent-700);
    --btn-flexi-shadow-b: var(--color-accent-500);
    --btn-flexi-shadow-c: var(--color-accent-400);
    --btn-flexi-shadow-active-a: var(--color-accent-900);
    --btn-flexi-shadow-active-b: var(--color-accent-700);
    --btn-flexi-shadow-active-c: var(--color-accent-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-accent-500);
        --btn-flexi-hover-bg: var(--color-accent-600);
        --btn-flexi-active-bg: var(--color-accent-500);
        --btn-flexi-shadow-a: var(--color-accent-700);
        --btn-flexi-shadow-b: var(--color-accent-600);
        --btn-flexi-shadow-c: var(--color-accent-400);
        --btn-flexi-shadow-active-a: var(--color-accent-600);
        --btn-flexi-shadow-active-b: var(--color-accent-500);
        --btn-flexi-shadow-active-c: var(--color-accent-400);
    }
}

@utility btn-flexi-success {
    --btn-flexi-bg: var(--color-success-600);
    --btn-flexi-hover-bg: var(--color-success-700);
    --btn-flexi-active-bg: var(--color-success-800);
    --btn-flexi-shadow-a: var(--color-success-700);
    --btn-flexi-shadow-b: var(--color-success-500);
    --btn-flexi-shadow-c: var(--color-success-400);
    --btn-flexi-shadow-active-a: var(--color-success-900);
    --btn-flexi-shadow-active-b: var(--color-success-700);
    --btn-flexi-shadow-active-c: var(--color-success-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-success-500);
        --btn-flexi-hover-bg: var(--color-success-600);
        --btn-flexi-active-bg: var(--color-success-500);
        --btn-flexi-shadow-a: var(--color-success-700);
        --btn-flexi-shadow-b: var(--color-success-600);
        --btn-flexi-shadow-c: var(--color-success-400);
        --btn-flexi-shadow-active-a: var(--color-success-600);
        --btn-flexi-shadow-active-b: var(--color-success-500);
        --btn-flexi-shadow-active-c: var(--color-success-400);
    }
}

@utility btn-flexi-danger {
    --btn-flexi-bg: var(--color-danger-600);
    --btn-flexi-hover-bg: var(--color-danger-700);
    --btn-flexi-active-bg: var(--color-danger-800);
    --btn-flexi-shadow-a: var(--color-danger-700);
    --btn-flexi-shadow-b: var(--color-danger-500);
    --btn-flexi-shadow-c: var(--color-danger-400);
    --btn-flexi-shadow-active-a: var(--color-danger-900);
    --btn-flexi-shadow-active-b: var(--color-danger-700);
    --btn-flexi-shadow-active-c: var(--color-danger-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-danger-500);
        --btn-flexi-hover-bg: var(--color-danger-600);
        --btn-flexi-active-bg: var(--color-danger-500);
        --btn-flexi-shadow-a: var(--color-danger-700);
        --btn-flexi-shadow-b: var(--color-danger-600);
        --btn-flexi-shadow-c: var(--color-danger-400);
        --btn-flexi-shadow-active-a: var(--color-danger-600);
        --btn-flexi-shadow-active-b: var(--color-danger-500);
        --btn-flexi-shadow-active-c: var(--color-danger-400);
    }
}

@utility btn-flexi-warning {
    --btn-flexi-bg: var(--color-warning-600);
    --btn-flexi-hover-bg: var(--color-warning-700);
    --btn-flexi-active-bg: var(--color-warning-800);
    --btn-flexi-shadow-a: var(--color-warning-700);
    --btn-flexi-shadow-b: var(--color-warning-500);
    --btn-flexi-shadow-c: var(--color-warning-400);
    --btn-flexi-shadow-active-a: var(--color-warning-900);
    --btn-flexi-shadow-active-b: var(--color-warning-700);
    --btn-flexi-shadow-active-c: var(--color-warning-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-warning-500);
        --btn-flexi-hover-bg: var(--color-warning-600);
        --btn-flexi-active-bg: var(--color-warning-500);
        --btn-flexi-shadow-a: var(--color-warning-700);
        --btn-flexi-shadow-b: var(--color-warning-600);
        --btn-flexi-shadow-c: var(--color-warning-400);
        --btn-flexi-shadow-active-a: var(--color-warning-600);
        --btn-flexi-shadow-active-b: var(--color-warning-500);
        --btn-flexi-shadow-active-c: var(--color-warning-400);
    }
}

@utility btn-flexi-info {
    --btn-flexi-bg: var(--color-info-600);
    --btn-flexi-hover-bg: var(--color-info-700);
    --btn-flexi-active-bg: var(--color-info-800);
    --btn-flexi-shadow-a: var(--color-info-700);
    --btn-flexi-shadow-b: var(--color-info-500);
    --btn-flexi-shadow-c: var(--color-info-400);
    --btn-flexi-shadow-active-a: var(--color-info-900);
    --btn-flexi-shadow-active-b: var(--color-info-700);
    --btn-flexi-shadow-active-c: var(--color-info-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-info-500);
        --btn-flexi-hover-bg: var(--color-info-600);
        --btn-flexi-active-bg: var(--color-info-500);
        --btn-flexi-shadow-a: var(--color-info-700);
        --btn-flexi-shadow-b: var(--color-info-600);
        --btn-flexi-shadow-c: var(--color-info-400);
        --btn-flexi-shadow-active-a: var(--color-info-600);
        --btn-flexi-shadow-active-b: var(--color-info-500);
        --btn-flexi-shadow-active-c: var(--color-info-400);
    }
}

@utility btn-flexi-white {
    --btn-flexi-bg: var(--color-white);
    --btn-flexi-hover-bg: var(--color-gray-100);
    --btn-flexi-active-bg: var(--color-gray-50);
    --btn-flexi-shadow-a: var(--color-gray-300);
    --btn-flexi-shadow-b: var(--color-gray-200);
    --btn-flexi-shadow-c: var(--color-gray-50);
    --btn-flexi-shadow-active-a: var(--color-gray-400);
    --btn-flexi-shadow-active-b: var(--color-gray-300);
    --btn-flexi-shadow-active-c: var(--color-gray-500);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-gray-900);
        --btn-flexi-hover-bg: var(--color-gray-800);
        --btn-flexi-active-bg: var(--color-gray-900);
        --btn-flexi-shadow-a: var(--color-gray-800);
        --btn-flexi-shadow-b: var(--color-gray-900);
        --btn-flexi-shadow-c: var(--color-gray-800);
        --btn-flexi-shadow-active-a: var(--color-gray-700);
        --btn-flexi-shadow-active-b: var(--color-gray-800);
        --btn-flexi-shadow-active-c: var(--color-gray-900);
    }
}

@utility btn-flexi-gray {
    --btn-flexi-bg: var(--color-gray-600);
    --btn-flexi-hover-bg: var(--color-gray-700);
    --btn-flexi-active-bg: var(--color-gray-800);
    --btn-flexi-shadow-a: var(--color-gray-700);
    --btn-flexi-shadow-b: var(--color-gray-500);
    --btn-flexi-shadow-c: var(--color-gray-400);
    --btn-flexi-shadow-active-a: var(--color-gray-900);
    --btn-flexi-shadow-active-b: var(--color-gray-700);
    --btn-flexi-shadow-active-c: var(--color-gray-600);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-gray-500);
        --btn-flexi-hover-bg: var(--color-gray-600);
        --btn-flexi-active-bg: var(--color-gray-500);
        --btn-flexi-shadow-a: var(--color-gray-600);
        --btn-flexi-shadow-b: var(--color-gray-500);
        --btn-flexi-shadow-c: var(--color-gray-600);
        --btn-flexi-shadow-active-a: var(--color-gray-600);
        --btn-flexi-shadow-active-b: var(--color-gray-500);
        --btn-flexi-shadow-active-c: var(--color-gray-400);
    }
}

@utility btn-flexi-neutral {
    --btn-flexi-bg: var(--color-gray-900);
    --btn-flexi-hover-bg: var(--color-gray-800);
    --btn-flexi-active-bg: var(--color-gray-950);
    --btn-flexi-shadow-a: var(--color-gray-700);
    --btn-flexi-shadow-b: var(--color-gray-500);
    --btn-flexi-shadow-c: var(--color-gray-400);
    --btn-flexi-shadow-active-a: var(--color-gray-700);
    --btn-flexi-shadow-active-b: var(--color-gray-600);
    --btn-flexi-shadow-active-c: var(--color-gray-500);

    &:is(.dark *) {
        --btn-flexi-bg: var(--color-white);
        --btn-flexi-hover-bg: var(--color-gray-100);
        --btn-flexi-active-bg: var(--color-gray-50);
        --btn-flexi-shadow-a: var(--color-gray-100);
        --btn-flexi-shadow-b: var(--color-gray-200);
        --btn-flexi-shadow-c: var(--color-gray-50);
        --btn-flexi-shadow-active-a: var(--color-gray-200);
        --btn-flexi-shadow-active-b: var(--color-gray-300);
        --btn-flexi-shadow-active-c: var(--color-gray-50);
    }
}
CSS,
    ],
    'btn-flexi-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' =><<<'CSS'
@utility btn-flexi-primary {
    --btn-flexi-bg: var(--color-primary-500);
    --btn-flexi-hover-bg: var(--color-primary-600);
    --btn-flexi-active-bg: var(--color-primary-500);
    --btn-flexi-shadow-a: var(--color-primary-700);
    --btn-flexi-shadow-b: var(--color-primary-600);
    --btn-flexi-shadow-c: var(--color-primary-400);
    --btn-flexi-shadow-active-a: var(--color-primary-600);
    --btn-flexi-shadow-active-b: var(--color-primary-500);
    --btn-flexi-shadow-active-c: var(--color-primary-400);

}

@utility btn-flexi-secondary {
    --btn-flexi-bg: var(--color-secondary-500);
    --btn-flexi-hover-bg: var(--color-secondary-600);
    --btn-flexi-active-bg: var(--color-secondary-500);
    --btn-flexi-shadow-a: var(--color-secondary-700);
    --btn-flexi-shadow-b: var(--color-secondary-600);
    --btn-flexi-shadow-c: var(--color-secondary-400);
    --btn-flexi-shadow-active-a: var(--color-secondary-600);
    --btn-flexi-shadow-active-b: var(--color-secondary-500);
    --btn-flexi-shadow-active-c: var(--color-secondary-400);
}

@utility btn-flexi-accent {
    --btn-flexi-bg: var(--color-accent-500);
    --btn-flexi-hover-bg: var(--color-accent-600);
    --btn-flexi-active-bg: var(--color-accent-500);
    --btn-flexi-shadow-a: var(--color-accent-700);
    --btn-flexi-shadow-b: var(--color-accent-600);
    --btn-flexi-shadow-c: var(--color-accent-400);
    --btn-flexi-shadow-active-a: var(--color-accent-600);
    --btn-flexi-shadow-active-b: var(--color-accent-500);
    --btn-flexi-shadow-active-c: var(--color-accent-400);
}

@utility btn-flexi-success {
    --btn-flexi-bg: var(--color-success-500);
    --btn-flexi-hover-bg: var(--color-success-600);
    --btn-flexi-active-bg: var(--color-success-500);
    --btn-flexi-shadow-a: var(--color-success-700);
    --btn-flexi-shadow-b: var(--color-success-600);
    --btn-flexi-shadow-c: var(--color-success-400);
    --btn-flexi-shadow-active-a: var(--color-success-600);
    --btn-flexi-shadow-active-b: var(--color-success-500);
    --btn-flexi-shadow-active-c: var(--color-success-400);
}

@utility btn-flexi-danger {
    --btn-flexi-bg: var(--color-danger-500);
    --btn-flexi-hover-bg: var(--color-danger-600);
    --btn-flexi-active-bg: var(--color-danger-500);
    --btn-flexi-shadow-a: var(--color-danger-700);
    --btn-flexi-shadow-b: var(--color-danger-600);
    --btn-flexi-shadow-c: var(--color-danger-400);
    --btn-flexi-shadow-active-a: var(--color-danger-600);
    --btn-flexi-shadow-active-b: var(--color-danger-500);
    --btn-flexi-shadow-active-c: var(--color-danger-400);
}

@utility btn-flexi-warning {
    --btn-flexi-bg: var(--color-warning-500);
    --btn-flexi-hover-bg: var(--color-warning-600);
    --btn-flexi-active-bg: var(--color-warning-500);
    --btn-flexi-shadow-a: var(--color-warning-700);
    --btn-flexi-shadow-b: var(--color-warning-600);
    --btn-flexi-shadow-c: var(--color-warning-400);
    --btn-flexi-shadow-active-a: var(--color-warning-600);
    --btn-flexi-shadow-active-b: var(--color-warning-500);
    --btn-flexi-shadow-active-c: var(--color-warning-400);
}

@utility btn-flexi-info {
    --btn-flexi-bg: var(--color-info-500);
    --btn-flexi-hover-bg: var(--color-info-600);
    --btn-flexi-active-bg: var(--color-info-500);
    --btn-flexi-shadow-a: var(--color-info-700);
    --btn-flexi-shadow-b: var(--color-info-600);
    --btn-flexi-shadow-c: var(--color-info-400);
    --btn-flexi-shadow-active-a: var(--color-info-600);
    --btn-flexi-shadow-active-b: var(--color-info-500);
    --btn-flexi-shadow-active-c: var(--color-info-400);
}

@utility btn-flexi-white {
    --btn-flexi-bg: var(--color-gray-900);
    --btn-flexi-hover-bg: var(--color-gray-800);
    --btn-flexi-active-bg: var(--color-gray-900);
    --btn-flexi-shadow-a: var(--color-gray-800);
    --btn-flexi-shadow-b: var(--color-gray-900);
    --btn-flexi-shadow-c: var(--color-gray-800);
    --btn-flexi-shadow-active-a: var(--color-gray-700);
    --btn-flexi-shadow-active-b: var(--color-gray-800);
    --btn-flexi-shadow-active-c: var(--color-gray-900);
}

@utility btn-flexi-gray {
    --btn-flexi-bg: var(--color-gray-500);
    --btn-flexi-hover-bg: var(--color-gray-600);
    --btn-flexi-active-bg: var(--color-gray-500);
    --btn-flexi-shadow-a: var(--color-gray-600);
    --btn-flexi-shadow-b: var(--color-gray-500);
    --btn-flexi-shadow-c: var(--color-gray-600);
    --btn-flexi-shadow-active-a: var(--color-gray-600);
    --btn-flexi-shadow-active-b: var(--color-gray-500);
    --btn-flexi-shadow-active-c: var(--color-gray-400);
}

@utility btn-flexi-neutral {
    --btn-flexi-bg: var(--color-white);
    --btn-flexi-hover-bg: var(--color-gray-100);
    --btn-flexi-active-bg: var(--color-gray-50);
    --btn-flexi-shadow-a: var(--color-gray-100);
    --btn-flexi-shadow-b: var(--color-gray-200);
    --btn-flexi-shadow-c: var(--color-gray-50);
    --btn-flexi-shadow-active-a: var(--color-gray-200);
    --btn-flexi-shadow-active-b: var(--color-gray-300);
    --btn-flexi-shadow-active-c: var(--color-gray-50);
}
CSS,
    ],
];
