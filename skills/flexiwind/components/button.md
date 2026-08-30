## Usage

```html
<x-ui.button aria-label="Default button">
    Click Me
</x-ui.button>
```

## Installation

```shell
php artisan flexi:add button
```

## Public Docs

`https://flexiwind.unoforge.com/components/button`

## Button Principles

In Flexiwind, a button is defined by three core dimensions: variant, intent, and size. This separation ensures visual consistency, clear action hierarchy, and full themeability.

Variant controls the visual treatment of the button, while intent communicates the meaning of the action. If you want to customize the variant, take a look at the button utilities page.

## API

| Prop                                        | Description                                                       |
| ------------------------------------------- | ----------------------------------------------------------------- |
| variant (solid\|soft\|outline\|ghost\|none) | Controls visual style and default intent behavior.                |
| intent (string\|null)                       | Semantic color tone. Falls back to variant defaults when omitted. |
| size (xs\|sm\|md\|lg\|xl)                   | Defines button dimensions and typography.                         |
| iconOnly (boolean)                          | Switches to icon-size geometry for icon-only actions.             |
| disabled (boolean)                          | Disables interaction and applies accessibility attributes.        |
| href (string\|null)                         | When set, renders as anchor; external links open in a new tab.    |

## Examples

### Sizes

```html
<x-ui.button size="xs">
    Click me
</x-ui.button>
    <x-ui.button size="sm">
    Click me
</x-ui.button>
    <x-ui.button size="md">
    Click me
</x-ui.button>
    <x-ui.button size="lg">
    Click me
</x-ui.button>
    <x-ui.button size="xl">
    Click me
</x-ui.button>
```

### Icons

```html
<x-ui.button size="xs" iconOnly>
    <x-ui.icon name="ph--atom" />
</x-ui.button>
<x-ui.button size="sm" iconOnly>
    <x-ui.icon name="ph--atom" />
</x-ui.button>
<x-ui.button size="md" iconOnly>
    <x-ui.icon name="ph--atom" />
</x-ui.button>
<x-ui.button size="lg" iconOnly>
    <x-ui.icon name="ph--atom" />
</x-ui.button>
<x-ui.button size="xl" iconOnly>
    <x-ui.icon name="ph--atom" />
</x-ui.button>
```

### With icon

```html
<x-ui.button aria-label="Default button">
    <x-ui.icon name="ph--atom" class="mr-1.5" />
    leading
</x-ui.button>
<x-ui.button aria-label="Default button">
    trailing
    <x-ui.icon name="ph--atom" class="ml-1.5" />
</x-ui.button>
```

## Guidance

- Use `variant` for visual treatment and `intent` for semantic tone.
- Use `href` for navigation-style buttons — it renders an `<a>` tag.
- External `href` values open in a new tab.
- Use `iconOnly` with `aria-label` for icon-only buttons.

## Avoid

- Do not use raw `<button>` tags when `x-ui.button` covers the need.
- Do not scatter button variant styling across templates — centralize intent utilities in `resources/css/flexiwind/intents.css`.
- Do not invent variant names outside `solid`, `soft`, `outline`, `ghost`, `none`.
- Do not nest `<x-ui.link>` inside `<x-ui.button>` or vice versa. For a link that looks like a button, use `x-ui.button href` (renders as `<a>`) or `x-ui.link asButton`.
- Do not nest interactive elements (buttons, links) inside `<x-ui.link>` — it renders as an `<a>` tag.
