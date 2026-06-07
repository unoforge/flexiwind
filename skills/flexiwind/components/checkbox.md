## Demo

```html
<div class="flex flex-col gap-3">
    <x-ui.checkbox id="def_check_checked" label="Default checkbox (Checked)" checked/>
    <x-ui.checkbox id="def_check" label="Example 2"/>
</div>
```

## Installation

```shell
php artisan flexi:add checkbox
```

## Public Docs

`https://flexiwind.unoforge.com/components/checkbox`

## API

| Prop | Description |
| --- | --- |
| id (string\|null) | Input id. If omitted, name is used. |
| name (string) | Input name attribute. |
| value (string) | Submitted value when checked. |
| checked (boolean) | Sets initial checked state. |
| disabled (boolean) | Disables interaction and applies disabled styles. |
| size (sm\|md\|lg) | Controls checkbox visual size. |
| label (string) | Optional inline label rendered next to the checkbox. |

## Accessibility

- Always provide a meaningful label, either via label or an external label element.
- For grouped checkboxes, wrap related options in a fieldset with a clear legend.
- Avoid using color alone to communicate checked or error states.

## Avoid

- Do not use `checked` as a dynamic Blade expression without `:checked="..."` syntax.
- Do not skip the `id` or `name` attribute — both are required for form submission and label association.
