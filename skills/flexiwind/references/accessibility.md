# Accessibility

Use this reference when advising on accessible Flexiwind usage.

## General Rules

- prefer the documented Flexiwind primitives over custom clickable `div` or `span` elements
- preserve semantic HTML such as real `button`, `a`, `input`, `select`, and `dialog` behavior
- keep labels associated with form controls
- preserve keyboard access when composing dropdowns, dialogs, tabs, and disclosures

## Verified Notes

- `x-ui.button` renders a real `button` or `a` depending on `href`
- `x-ui.input` and `x-ui.select` can generate labels through their documented label support
- `x-ui.modal` uses a `dialog` element in the current implementation
- sidebar overlays and interactive overlays rely on stateful Alpine/data-attribute behavior, so avoid breaking those semantics during customization

## Practical Advice

- use built-in label support for simple forms
- use `x-ui.label` for custom layouts
- keep disabled states semantic instead of only visual
- prefer clear modal titles and descriptions when using modal primitives
