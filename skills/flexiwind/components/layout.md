# Layout

Use this reference for structural Flexiwind building blocks.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [card.md](./card.md)
- [divider.md](./divider.md)
- [aspect-ratio.md](./aspect-ratio.md)

## Public Docs

- `https://flexiwind.unoforge.com/components/card`
- `https://flexiwind.unoforge.com/components/divider`
- `https://flexiwind.unoforge.com/components/aspect-ratio`
- `https://flexiwind.unoforge.com/components/link`
- `https://flexiwind.unoforge.com/components/heading`
- `https://flexiwind.unoforge.com/components/text`

## Verified Blade Primitives

- `x-ui.card`
- `x-ui.card.header`
- `x-ui.card.title`
- `x-ui.card.description`
- `x-ui.card.content`
- `x-ui.card.footer`
- `x-ui.divider`
- `x-ui.aspect`
- `x-ui.link`
- `x-ui.heading`
- `x-ui.text`

## Card Guidance

- Prefer card composition instead of custom wrappers when building panels or sections.
- Use the card subcomponents for structure rather than hand-rolled spacing when the design matches the documented pattern.
- Let theme utilities and semantic tokens drive the surface styling.

## Aspect Ratio

Verified naming nuance:

- the docs page is `/components/aspect-ratio`
- the install command is `php artisan flexi:add aspect`
- the Blade primitive is `x-ui.aspect`

Do not rename this to `x-ui.aspect-ratio`.

## Link, Heading, Text

- Use `x-ui.link` for consistent links when the design should match Flexiwind.
- Use `x-ui.heading` and `x-ui.text` when you want documented typography primitives instead of raw utility classes.

## Avoid

- Do not invent navbar or sidebar sub-primitives under `x-ui` unless they are actually present in the repo.
- Do not assume the docs page slug equals the Blade component name.
