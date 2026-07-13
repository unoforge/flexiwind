# Best Practices

Use these repo-verified rules when guiding Flexiwind usage.

## Start From The Docs

- open the matching public docs URL first
- verify the implementation in `resources/views/components/ui` before documenting props or composition
- if docs and implementation disagree, trust the implementation for exact behavior and mention the docs page as the user-facing reference

## Prefer Existing Flexiwind Patterns

- use documented `x-ui.*` primitives before raw HTML
- use subcomponents that already exist, such as card, modal, slideover, tabs, pagination, accordion, and callout families
- use blocks when the user needs a complete section or app shell instead of a single primitive

## Keep Guidance Exact

- use the real install slug from the docs page
- use the real Blade primitive from the implementation file
- distinguish between docs page names and Blade component names when they differ

Examples:

- docs page `text-area`, Blade primitive `x-ui.textarea`
- docs page `aspect-ratio`, install slug `aspect`, Blade primitive `x-ui.aspect`
- docs page `sidebar`, install slug `sidebar-wrapper`, Blade primitive `x-ui.sidebar-wrapper`

## Use Correct Component Composition

- trigger components (`x-ui.modal.trigger`, `x-ui.slideover.trigger`, `x-ui.dropdown.trigger`) render as `<button>` elements — pass button props directly instead of nesting a button inside
- `x-ui.dropdown.trigger` accepts `variant`, `intent`, `size`, and other `x-ui.button` props
- for links that should look like buttons, use `x-ui.button href` (renders as `<a>`) or `x-ui.link asButton` — never nest both
- `x-ui.modal.close` inherits `x-ui.button` props — do not nest a button inside it. Pass text or an icon through the slot.

## Theming

- prefer semantic tokens and documented utilities over hardcoded colors
- use the theme docs before suggesting class-level overrides
- keep button and utility styling centralized when customizing a product theme

Public docs:

- `https://flexiwind.unoforge.com/docs/theme`
- `https://flexiwind.unoforge.com/docs/theme/colors`
- `https://flexiwind.unoforge.com/docs/theme/buttons`
- `https://flexiwind.unoforge.com/docs/theme/utilities`
