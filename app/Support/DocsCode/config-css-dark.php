<?php


return [
  'css-variables-color-dark' => [
    'lang' => 'css',
    'name' => 'dark',
    'code' => <<<'CSS'
:root {

    --primary: var(--color-primary-500);
    --secondary: var(--color-secondary-500);
    --accent: var(--color-accent-500);
    --info: var(--color-info-500);
    --warning: var(--color-warning-500);
    --danger: var(--color-danger-500);
    --success: var(--color-success-500);


    --ui-input-focus-outline: var(--primary);
    --ui-input-place-holder: var(--color-gray-500);
    --ui-input-invalid-outline: var(--danger);
    --ring-offset-color: var(--bg);

    --fg-title: var(--color-white);
    --fg-subtitle: var(--color-gray-100);
    --fg: var(--color-gray-300);
    --fg-muted: var(--color-gray-400);

    --bg: var(--color-gray-950);
    --bg-subtle: var(--color-gray-900);
    --bg-surface: --alpha(var(--color-gray-900)/70%);
    --bg-muted: var(--color-gray-800);
    --bg-surface-elevated: var(--color-gray-700);
    --checkbox-bg: var(--bg);


    --progressbar: var(--bg-muted);
    --bg-range:var(--bg-muted);

    --card: var(--bg);
    --card-gray: var(--bg-subtle);
    --overlay: var(--bg);
    --overlay-gray: var(--bg-subtle);

    --border-strong: var(--color-gray-700);
    --border-amphasis: var(--color-gray-600);
    --border: var(--color-gray-900);
    --border-sub: var(--color-gray-900);
    --border-card:var(--color-gray-800);
    --border-input:var(--color-gray-800);

    --focus-ring: --alpha(var(--c-primary-800)/30%);


    --dropdown-item-bg-hover: var(--color-gray-900);
    --dropdown-item-fg: var(--color-gray-200);
    --dropdown-item-outline: var(--primary);
    --dropdown-item-fg-hover: var(--color-gray-50);
    --dropdown-item-danger-bg-hover: --alpha(var(--color-danger-500)/10%);
    --dropdown-item-danger-fg: var(--color-danger-500);
    --dropdown-item-danger-outline: var(--danger);
}
CSS
  ]

];
