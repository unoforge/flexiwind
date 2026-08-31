## Installation

```shell
php artisan flexi:add field
```

## Demo

`x-ui.field` wraps any form control with label, hint, and error message.

```html
<form class="space-y-4 max-w-sm w-full">
    <x-ui.field label="Email" for="email" hint="We'll never share your email" required>
        <x-ui.input type="email" id="email" placeholder="you@example.com" />
    </x-ui.field>

    <x-ui.field label="Password" for="password" required hint="8+ characters with a mix of letters, numbers & symbols"
        :error="$errors->first('password')">
        <x-ui.input type="password" id="password" :invalid="$errors->has('password')" />
    </x-ui.field>

    <x-ui.field label="Bio" for="bio" hint="Tell us about yourself">
        <x-ui.textarea id="bio" rows="3" placeholder="I'm a..." />
    </x-ui.field>

    <x-ui.field label="Country" for="country" required>
        <x-ui.select id="country">
            <option value="">Select...</option>
            <option value="us">United States</option>
            <option value="fr">France</option>
        </x-ui.select>
    </x-ui.field>
</form>
```

## Without label (hint or error only)

```html
<x-ui.field hint="Password must be 8+ characters">
    <x-ui.input type="password" />
</x-ui.field>

<x-ui.field :error="$errors->first('password')">
    <x-ui.input type="password" :invalid="$errors->has('password')" />
</x-ui.field>
```

## With inline label

For inline labels, pass `flex-row items-center gap-2` via `class` and wrap the label yourself:

```html
<div class="flex items-center gap-4">
    <x-ui.label for="notify-email" class="min-w-max">Email notifications</x-ui.label>
    <x-ui.switch id="notify-email" />
</div>
```

For inline-labeled text inputs, use the built-in `label` prop with `label-position="inline"` instead.

## In grid layouts

```html
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <x-ui.field label="First Name" for="first-name" required>
        <x-ui.input id="first-name" placeholder="John" />
    </x-ui.field>
    <x-ui.field label="Last Name" for="last-name" required>
        <x-ui.input id="last-name" placeholder="Doe" />
    </x-ui.field>
</div>
<x-ui.field label="Email" for="email" required>
    <x-ui.input type="email" id="email" placeholder="john@company.com" />
</x-ui.field>
```

## With Livewire validation

```blade
<x-ui.field label="Email" for="email" :error="$errors->first('email')">
    <x-ui.input type="email" id="email" wire:model="email" :invalid="$errors->has('email')" />
</x-ui.field>
```

## API

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| label | string\|null | null | Label text displayed above the control |
| for | string\|null | null | `for` attribute on the label (matches input `id`) |
| hint | string\|null | null | Helper text in `text-muted-foreground` below the control (hidden when `error` is set) |
| error | string\|bool\|null | null | Error text in `text-destructive` below the control (replaces hint). Boolean `true` hides hint without showing text |
| required | boolean | false | Adds a red asterisk `*` next to the label |
| labelClass | string | '' | Extra classes on the label element |
| class | string | '' | Extra classes on the wrapper `<div>` |

## Guidance

- The control inside the slot must manage its own `invalid` state — field only handles label + hint + error display.
- Always pass `id` to the input and match it with `for` on the field.
- Error overrides hint — when `error` is set, hint is automatically hidden.
- Use `required` to show the asterisk; the control itself still needs `required` or Livewire validation.
- For simple standalone fields without hint/error, the built-in `label` prop on input/textarea/select is sufficient.

## Avoid

- Do not pass `label` to the inner input when using `x-ui.field` — use `x-ui.field`'s `label` prop instead.
- Do not use `group-wrapper-class` on inputs inside `x-ui.field` — the field handles layout.
