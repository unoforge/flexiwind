## Prerequisites

Flexiwind color tokens are defined with CSS variables and consumed through Tailwind utilities. Ensure your main stylesheet (usually app.css ) is loaded globally, and load Flexiwind token definitions before custom overrides.

Avoid hardcoded hex values in components. Use semantic tokens so theme updates happen in one place.

## Theme Modes

Choose one mode strategy based on product requirements. Most applications should start with both to support light and dark interfaces.

| Mode | Description |
| --- | --- |
| both | Define variables for both light and dark modes. Best default for applications with user theme switching. |
| light | Define only light mode variables. Use this when dark mode is intentionally not supported. |
| dark | Define only dark mode variables. Useful for dark-first products and internal tools. |

## Variable Tokens

Start from the mode that matches your project, then adjust only semantic token values. Keep token names stable to avoid breaking class usage in templates.

### Both

```css
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
    --card: var(--color-bg);
    --card-gray: var(--color-bg-subtle);
    --overlay: var(--color-bg);
    --overlay-gray: var(--color-bg-subtle);

    --progressbar: var(--color-bg-muted);
    --bg-range:var(--color-bg-muted);

    --border-strong: var(--color-gray-300);
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
    --checkbox-checked-color: var(--color-primary);

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

    --border-strong: var(--color-gray-700);
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
```

### Light only
```css
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
    --card: var(--color-bg);
    --card-gray: var(--color-bg-subtle);
    --overlay: var(--color-bg);
    --overlay-gray: var(--color-bg-subtle);

    --progressbar: var(--color-bg-muted);
    --bg-range:var(--color-bg-muted);

    --border-strong: var(--color-gray-300);
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
    --checkbox-checked-color: var(--color-primary);

    --dropdown-item-outline: var(--color-primary);
    --dropdown-item-bg-hover: var(--color-gray-100);
    --dropdown-item-fg: var(--color-gray-800);
    --dropdown-item-fg-hover: var(--color-gray-900);

    --dropdown-item-danger-outline: var(--color-danger);
    --dropdown-item-danger-bg-hover: var(--color-danger-100);
    --dropdown-item-danger-fg: var(--color-danger-600);
}
```


### Dark Only
```css
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

    
    --checkbox-bg: var(--bg);
    --ui-radius: var(--radius-lg);
    --card-radius: var(--radius-lg);
    --checkbox-radius: var(--radius-sm);
    --checkbox-checked-color: var(--color-primary);

    --progressbar: var(--bg-muted);
    --bg-range:var(--bg-muted);

    --card: var(--bg);
    --card-gray: var(--bg-subtle);
    --overlay: var(--bg);
    --overlay-gray: var(--bg-subtle);

    --border-strong: var(--color-gray-700);
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
```

## Theme Settings

Register color tokens in @theme so utilities are generated consistently. Once registered, use classes like bg-primary , text-fg , and border-border throughout your UI.

app.css
```css
@theme inline {
    --font-sans: "Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    --radius-ui: var(--ui-radius);
    --radius-card: var(--card-radius);
    --radius-checkbox: var(--checkbox-radius); 
    

    --color-white: var(--color-white);
    --color-dark: var(--color-gray-950);

    --color-primary: var(--primary);
    --color-secondary: var(--secondary);
    --color-accent: var(--accent);
    --color-info: var(--info);
    --color-warning: var(--warning);
    --color-danger: var(--danger);
    --color-success: var(--success);

    --color-fg-title: var(--fg-title);
    --color-fg-subtitle: var(--fg-subtitle);
    --color-fg: var(--fg);
    --color-fg-muted: var(--fg-muted);

    --color-bg: var(--bg);
    --color-bg-subtle: var(--bg-subtle);
    --color-bg-surface: var(--bg-surface);
    --color-bg-muted: var(--bg-muted);
    --color-card: var(--card);
    --color-card-gray: var(--card-gray);
    --color-popover: var(--bg);
    --color-popover-gray: var(--card-gray);
    --color-overlay: var(--overlay);
    --color-overlay-gray: var(--overlay-gray);
    --color-progressbar: var(--progressbar);

    --color-border-strong: var(--border-strong);
    --color-border: var(--border);
    --color-border-sub: var(--border-sub);
    --color-border-card: var(--border-card);
    --color-border-input: var(--border-input);

    --color-primary-50: ...;
    /* ... */
    --color-primary-950: ..;

    --color-secondary-50: ....;
    /* ..... */
    --color-secondary-950: ....;

    /* override the default gray  */
    --color-gray-50:...;
    /* ... */
    --color-gray-950:...;
}
```
