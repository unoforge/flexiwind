<?php

return [
  'pagination-utilities' => [
    'lang' => 'css',
    'name' => 'pagination-utilities',
    'code' => <<<'CSS'
@utility btn-pagination-link-variables {
  --ring-bg-color: var(--btn-pagination-link-ring-color, transparent);
  --link-bg: var(--btn-pagination-link-bg, transparent);
  --link-text-color: var(--btn-pagination-link-text-color, var(--color-fg-muted));
  --link-hover-bg: var(--btn-pagination-link-hover-bg, --alpha(var(--color-bg-muted)/60%));
}

@utility btn-pagination-active {
  --ring-bg-color: var(--btn-pagination-active-link-ring-color, var(--color-border));
  --link-bg: var(--btn-pagination-active-link-bg, transparent);
  --link-text-color: var(--btn-pagination-active-link-text-color, var(--color-fg-title));
  --link-hover-bg: var(--btn-pagination-active-link-hover-bg, --alpha(var(--color-bg-muted)/80%));
}
CSS
  ],
  'pagination-custom-theme' => [
    'lang' => 'css',
    'name' => 'pagination-custom-theme',
    'code' => <<<'CSS'
/* Custom pagination theme */
:root {
  /* Regular pagination links */
  --btn-pagination-link-ring-color: var(--color-border);
  --btn-pagination-link-bg: var(--color-bg-surface);
  --btn-pagination-link-text-color: var(--color-fg);
  --btn-pagination-link-hover-bg: var(--color-bg-muted);
  
  /* Active pagination links */
  --btn-pagination-active-link-ring-color: var(--color-primary);
  --btn-pagination-active-link-bg: var(--color-primary);
  --btn-pagination-active-link-text-color: var(--color-primary-50);
  --btn-pagination-active-link-hover-bg: var(--color-primary);
}
CSS
  ]
];
