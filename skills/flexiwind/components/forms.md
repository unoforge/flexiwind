# Forms

Use this reference when composing Laravel or Livewire forms with Flexiwind.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [button.md](./button.md)
- [field.md](./field.md)
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
- `https://flexiwind.unoforge.com/components/field`

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

## Field Wrapper

`x-ui.field` is the recommended way to build forms with label + hint + error + required indicator:

```blade
<x-ui.field label="Email" for="email" hint="We'll never share it" required
    :error="$errors->first('email')">
    <x-ui.input type="email" id="email" :invalid="$errors->has('email')" />
</x-ui.field>
```

Use cases:
- Forms with validation (Livewire or server-side)
- Forms with helper text under inputs
- Required fields with asterisk
- Grid layouts — each field naturally takes its grid cell without `group-wrapper-class`

## Labels

Verified patterns:

- Simple standalone fields without hint/error — use the built-in `label` prop on input/textarea/select.
- Advanced forms with hint/error/required — use `x-ui.field` wrapper.
- For inline labels with text inputs, use `label-position="inline"` on the input.
- For inline labels with switches/checkboxes, use `x-ui.label` directly.
- `x-ui.field` handles the label `for` attribute — do not pass `label` to the inner control when using it.

## Livewire Notes

- Keep `wire:model`, `wire:submit`, and `wire:click` on the rendered form elements where appropriate.
- Do not add `wire:ignore` by default to Flexiwind form primitives.
- If a component has Alpine-driven behavior, verify the implementation first before changing update behavior.

## Avoid

- Do not use undocumented props like `error` when the real component uses `invalid`.
- Do not mix grouped input layout with the standalone `label` prop on the inner control.
- Do not replace Flexiwind primitives with raw HTML unless the docs or implementation do not support the pattern.
- Do not pass `label` to an inner input when using `x-ui.field` — use `x-ui.field`'s `label` prop.
- Do not use `group-wrapper-class` — use `x-ui.field` instead for grid layout control.
