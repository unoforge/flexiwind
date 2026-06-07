## Prerequisites

Create a dedicated file such as button-styles.css for button variants. Keep button styles centralized so all intents stay consistent across the app.

Load this file after base token definitions and before app-specific overrides. This order ensures variant classes pick up your final theme values.

## Variants

Each variant defines the visual treatment of the button. Intents (such as primary, secondary, success, or danger) control semantic meaning. Combine both to build a predictable button system.

### Solid variants


```css
@utility btn-solid-primary {
    --btn-solid-top-shadow: var(--color-primary-500);
    --btn-solid-bottom-shadow: var(--color-primary-700);
    --btn-solid-top-shadow-hover: var(--color-primary-600);
    --btn-solid-bottom-shadow-hover: var(--color-primary-800);
    --btn-solid-color: var(--color-primary-600);
    --btn-solid-color-hover: var(--color-primary-700);
    --btn-solid-color-press: var(--color-primary-800);
}
```


### Outline variants

```css
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
```


### Soft variants

```css
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
```

### Ghost variants


```css
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
```