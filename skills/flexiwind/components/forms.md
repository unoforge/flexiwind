# Forms

Use this reference when composing Laravel or Livewire forms with Flexiwind.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [button.md](./button.md)
- [input.md](./input.md)
- [text-area.md](./text-area.md)
- [select.md](./select.md)
- [checkbox.md](./checkbox.md)
- [radio.md](./radio.md)
- [switch.md](./switch.md)
- [otp-input.md](./otp-input.md)
- [range.md](./range.md)

## Public Docs

- `https://flexiwind.unoforge.com/components/input`
- `https://flexiwind.unoforge.com/components/text-area`
- `https://flexiwind.unoforge.com/components/select`
- `https://flexiwind.unoforge.com/components/checkbox`
- `https://flexiwind.unoforge.com/components/radio`
- `https://flexiwind.unoforge.com/components/switch`
- `https://flexiwind.unoforge.com/components/otp`
- `https://flexiwind.unoforge.com/components/range`
- `https://flexiwind.unoforge.com/components/button`

## Good Defaults

- Use the documented `x-ui.*` primitives directly in forms.
- Preserve Laravel naming, validation, and old-input patterns.
- In Livewire, add `wire:*` directives on consumer markup instead of wrapping Flexiwind in custom adapters unless needed.
- Use `invalid` for invalid visual state where the component supports it.

## Grouped Inputs

For input or select with icons, prefixes, or suffixes:

- wrap with `x-ui.input.group`
- use `x-ui.input.leading` and `x-ui.input.trailing`
- set the nested `x-ui.input` to `variant="unstyled"`
- avoid passing `label` to the nested grouped input

This is one of the most important verified form rules in the current docs.

## Labels

Verified patterns:

- Simple fields may use the built-in `label` prop where supported.
- For custom layouts, use `x-ui.label`.
- Inline labels are supported on documented text inputs and selects.

## Livewire Notes

- Keep `wire:model`, `wire:submit`, and `wire:click` on the rendered form elements where appropriate.
- Do not add `wire:ignore` by default to Flexiwind form primitives.
- If a component has Alpine-driven behavior, verify the implementation first before changing update behavior.

## Avoid

- Do not use undocumented props like `error` when the real component uses `invalid`.
- Do not mix grouped input layout with the standalone `label` prop on the inner control.
- Do not replace Flexiwind primitives with raw HTML unless the docs or implementation do not support the pattern.
