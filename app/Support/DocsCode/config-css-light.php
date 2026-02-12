<?php


return [
  'css-variables-color-light' => [
    'lang' => 'css',
    'name' => 'light',
    'code' => <<<'CSS'
:root {
    --primary: var(--color-primary-600);
    --secondary: var(--color-secondary-600);
    --accent: var(--color-accent-600);
    --info: var(--color-info-600);
    --warning: var(--color-warning-600);
    --danger: var(--color-danger-600);
    --success: var(--color-success-600);

    --fg-title: var(--color-gray-900);
    --fg-subtitle: var(--color-gray-800);
    --fg: var(--color-gray-700);
    --fg-muted: var(--color-gray-600);

    --bg: var(--color-white);
    --bg-subtle: var(--color-gray-100);
    --bg-surface: var(--color-gray-50);
    --bg-muted: var(--color-gray-200);
    --bg-surface-elevated: var(--color-gray-300);
    --card: var(--color-bg);
    --card-gray: var(--color-bg-subtle);
    --overlay: var(--color-bg);
    --overlay-gray: var(--color-bg-subtle);

    --progressbar: var(--color-bg-muted);
    --bg-range:var(--color-bg-muted);

    --border-strong: var(--color-gray-300);
    --border-amphasis: var(--color-gray-400);
    --border: var(--color-gray-200);
    --border-sub: var(--color-gray-100);
    --border-card:var(--color-gray-200);
    --border-input: var(--color-gray-200);


    --ui-input-focus-outline: var(--color-primary);
    --ui-input-place-holder: var(--color-gray-500);
    --ui-input-invalid-outline: var(--color-danger);
    --ring-bg: var(--color-primary);
    --ring-offset-color: var(--color-bg);

    --focus-ring: var(--color-primary-200);

    --ui-radius: var(--radius-lg);
    --card-radius: var(--radius-lg);
    --checkbox-radius: var(--radius-sm);
    --checkbox-bg: var(--color-bg);

    --dropdown-item-outline: var(--color-primary);
    --dropdown-item-bg-hover: var(--color-gray-100);
    --dropdown-item-fg: var(--color-gray-800);
    --dropdown-item-fg-hover: var(--color-gray-900);


    --dropdown-item-danger-outline: var(--color-danger);
    --dropdown-item-danger-bg-hover: var(--color-danger-100);
    --dropdown-item-danger-fg: var(--color-danger-600);
}
CSS
  ]

];
