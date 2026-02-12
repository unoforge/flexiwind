<?php


return [
  'css-variables-color-both' => [
    'lang' => 'css',
    'name' => 'both',
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


.dark {
    --primary: var(--color-primary-500);
    --secondary: var(--color-secondary-500);
    --accent: var(--color-accent-500);
    --info: var(--color-info-500);
    --warning: var(--color-warning-500);
    --danger: var(--color-danger-500);
    --success: var(--color-success-500);

    --fg-title: var(--color-white);
    --fg-subtitle: var(--color-gray-100);
    --fg: var(--color-gray-300);
    --fg-muted: var(--color-gray-400);

    --bg: var(--color-gray-950);
    --bg-subtle: var(--color-gray-900);
    --bg-surface: --alpha(var(--color-gray-900)/70%);
    --bg-muted: var(--color-gray-800);
    --bg-surface-elevated: var(--color-gray-700);

    --border-strong: var(--color-gray-700);
    --border-amphasis: var(--color-gray-600);
    --border: var(--color-gray-900);
    --border-sub: var(--color-gray-900);
    --border-card:var(--color-gray-800);
    --border-input:var(--color-gray-800);
    --focus-ring: --alpha(var(--c-primary-800)/30%);
    --dropdown-item-bg-hover: var(--color-gray-900);
    --dropdown-item-fg: var(--color-gray-200);
    --dropdown-item-fg-hover: var(--color-gray-50);
    --dropdown-item-danger-bg-hover: --alpha(var(--color-danger-500)/10%);
    --dropdown-item-danger-fg: var(--color-danger-500);
}
CSS
  ]

];
