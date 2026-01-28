<?php


return [
    'ui-solid-light' => [
        'lang' => 'css',
        'name' => 'light',
        'code' => <<<'CSS'
@utility ui-solid-gray {
    --ui-solid-bg: var(--color-gray-100);
    --ui-solid-text: var(--color-gray-700);
}
@utility ui-solid-success {
    --ui-solid-bg: var(--color-success-600);
    --ui-solid-text: var(--color-white);
}

@utility ui-solid-warning {
    --ui-solid-bg: var(--color-warning-600);
    --ui-solid-text: var(--color-white);
}

@utility ui-solid-danger {
    --ui-solid-bg: var(--color-danger-600);
    --ui-solid-text: var(--color-white);
}

@utility ui-solid-neutral {
    --ui-solid-bg: var(--color-gray-900);
    --ui-solid-text: var(--color-white);
}
CSS,
    ],
    'ui-solid-both' => [
        'lang' => 'css',
        'name' => 'both',
        'code' => <<<'CSS'
@utility ui-solid-gray {
    --ui-solid-bg: var(--color-gray-100);
    --ui-solid-text: var(--color-gray-700);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-gray-900);
        --ui-solid-text: var(--color-gray-300);
    }
}
@utility ui-solid-success {
    --ui-solid-bg: var(--color-success-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-success-500);
    }
}

@utility ui-solid-warning {
    --ui-solid-bg: var(--color-warning-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-warning-500);
    }
}

@utility ui-solid-danger {
    --ui-solid-bg: var(--color-danger-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-danger-500);
    }
}

@utility ui-solid-neutral {
    --ui-solid-bg: var(--color-gray-900);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-white);
        --ui-solid-text: var(--color-gray-900);
    }
}
@utility ui-solid-success {
    --ui-solid-bg: var(--color-success-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-success-500);
    }
}

@utility ui-solid-warning {
    --ui-solid-bg: var(--color-warning-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-warning-500);
    }
}

@utility ui-solid-danger {
    --ui-solid-bg: var(--color-danger-600);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-danger-500);
    }
}

@utility ui-solid-neutral {
    --ui-solid-bg: var(--color-gray-900);
    --ui-solid-text: var(--color-white);

    &:is(.dark *) {
        --ui-solid-bg: var(--color-white);
        --ui-solid-text: var(--color-gray-900);
    }
}
CSS,
    ],
    'ui-solid-dark' => [
        'lang' => 'css',
        'name' => 'dark',
        'code' => <<<'CSS'
@utility ui-solid-gray {
    --ui-solid-bg: var(--color-gray-900);
    --ui-solid-text: var(--color-gray-300);
}
@utility ui-solid-success {
    --ui-solid-text: var(--color-white);
    --ui-solid-bg: var(--color-success-500);
}

@utility ui-solid-warning {
    --ui-solid-text: var(--color-white);
    --ui-solid-bg: var(--color-warning-500);

}

@utility ui-solid-danger {
    --ui-solid-text: var(--color-white);
    --ui-solid-bg: var(--color-danger-500);
}

@utility ui-solid-neutral {
`   --ui-solid-bg: var(--color-white);
    --ui-solid-text: var(--color-gray-900);`
}
CSS,
    ],
];
