# Data Display

Use this reference for Flexiwind components that present information, status, or loading state.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [table.md](./table.md)
- [avatar.md](./avatar.md)
- [badge.md](./badge.md)
- [alert.md](./alert.md)
- [callout.md](./callout.md)
- [progress.md](./progress.md)
- [meter.md](./meter.md)
- [skeleton.md](./skeleton.md)
- [kbd.md](./kbd.md)

## Public Docs

- `https://flexiwind.unoforge.com/components/table`
- `https://flexiwind.unoforge.com/components/avatar`
- `https://flexiwind.unoforge.com/components/badge`
- `https://flexiwind.unoforge.com/components/alert`
- `https://flexiwind.unoforge.com/components/callout`
- `https://flexiwind.unoforge.com/components/progress`
- `https://flexiwind.unoforge.com/components/meter`
- `https://flexiwind.unoforge.com/components/skeleton`
- `https://flexiwind.unoforge.com/components/kbd`
- `https://flexiwind.unoforge.com/components/icon`
- `https://flexiwind.unoforge.com/components/text`
- `https://flexiwind.unoforge.com/components/heading`

## Verified Blade Primitives

- `x-ui.table`
- `x-ui.table.row`
- `x-ui.table.cell`
- `x-ui.table.column`
- `x-ui.table.columns`
- `x-ui.table.rows`
- `x-ui.avatar`
- `x-ui.avatar-placeholder`
- `x-ui.badge`
- `x-ui.alert`
- `x-ui.callout`
- `x-ui.callout.title`
- `x-ui.callout.description`
- `x-ui.progress`
- `x-ui.meter`
- `x-ui.skeleton`
- `x-ui.kbd`
- `x-ui.icon`
- `x-ui.text`
- `x-ui.heading`

## Notes

- `table` has multiple subcomponents in the repo; prefer those over made-up `thead/tbody` wrappers under `x-ui`.
- `avatar-placeholder` exists as its own primitive.
- `callout` is a composed component with title and description helpers.

## Avoid

- Do not document `x-ui.placeholder` as a public Flexiwind primitive here; there is an implementation file, but it is not part of the current public component catalog page.
- Do not invent badge or alert variants that are not demonstrated in the docs or supported by the shared styling model.
