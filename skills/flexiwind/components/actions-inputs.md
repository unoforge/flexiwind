# Actions And Inputs

Use this reference for Flexiwind action and input components that are documented and present in the repo.

## Public Docs

- `https://flexiwind.unoforge.com/components/button`
- `https://flexiwind.unoforge.com/components/input`
- `https://flexiwind.unoforge.com/components/text-area`
- `https://flexiwind.unoforge.com/components/select`
- `https://flexiwind.unoforge.com/components/checkbox`
- `https://flexiwind.unoforge.com/components/radio`
- `https://flexiwind.unoforge.com/components/switch`
- `https://flexiwind.unoforge.com/components/otp`
- `https://flexiwind.unoforge.com/components/range`

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

## Verified Install Commands

- `php artisan flexi:add button`
- `php artisan flexi:add input`
- `php artisan flexi:add text-area`
- `php artisan flexi:add select`
- `php artisan flexi:add checkbox`
- `php artisan flexi:add radio`
- `php artisan flexi:add switch`
- `php artisan flexi:add otp`
- `php artisan flexi:add range`

## Verified Blade Primitives

- `x-ui.button`
- `x-ui.input`
- `x-ui.textarea`
- `x-ui.select`
- `x-ui.select.option`
- `x-ui.checkbox`
- `x-ui.radio`
- `x-ui.switch`
- `x-ui.otp`
- `x-ui.otp.input`
- `x-ui.range`
- `x-ui.label`

## Button

Verified in the docs and component implementation:

- `variant`: `solid|soft|outline|ghost|none`
- `size`: `xs|sm|md|lg|xl|none`
- `iconOnly`: boolean
- `disabled`: boolean
- `href`: renders an anchor when present

Guidance:

- Use `variant` for visual treatment and `intent` for semantic tone.
- Prefer `href` for navigation-style buttons.
- External `href` values open in a new tab in the current implementation.

## Input And Select

These have a strict documented composition pattern.

Use:

- `x-ui.input`
- `x-ui.select`
- `x-ui.input.group`
- `x-ui.input.leading`
- `x-ui.input.trailing`

Verified rule from the docs:

- Inside `x-ui.input.group`, the inner input should use `variant="unstyled"`.
- Do not pass `label` to the grouped input.
- Let the group wrapper handle layout and surrounding presentation.

Also valid for select:

- `x-ui.select` reuses the same input-group family.

## OTP

Verified behavior:

- `x-ui.otp` is the wrapper component.
- `x-ui.otp.input` is a nested primitive.
- The implementation supports predefined validation shortcuts such as `number`, `alpha`, and `alphanumeric`.

## What Not To Invent

- Do not document loading props that are not in the component files.
- Do not rename `textarea` to a different Blade primitive.
- Do not claim select has a custom Flexiwind menu system here; the implementation is a styled native `<select>`.
- Do not skip the grouped input rules for composed input or select layouts.
