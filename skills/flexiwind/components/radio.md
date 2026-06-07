## Demo

```html
<div class="flex flex-col gap-3">
    <x-ui.radio name="radio_demo" id="def_radio_check" label="Default Radio(selected)" checked/>
    <x-ui.radio name="radio_demo" id="def_radio" label="Example 2"/>
</div>
```

## Installation

```shell
php artisan flexi:add radio
```

## Public Docs

`https://flexiwind.unoforge.com/components/radio`

## Disabled


```html
<div class="flex flex-col gap-3">
    <x-ui.radio disabled id="def_radio_check_demo" label="Default Radio(selected)" checked/>
    <x-ui.radio disabled id="def_radio_demo" label="Example 2"/>
</div>
```

## Best Practices

- Keep option labels short and mutually exclusive.
- Preselect a sensible default when possible.
- Use a clear group label so the choice context is obvious.

## API

| Prop | Description |
| --- | --- |
| id (string\|null) | Input id. Falls back to name if omitted. |
| name (string) | Shared group name for mutually exclusive selection. |
| value (string) | Submitted value for this option. |
| checked (boolean) | Marks this option as selected by default. |
| disabled (boolean) | Disables the radio option. |
| size (sm\|md\|lg) | Controls control size. |
| label (string) | Optional inline label rendered with the radio. |

## Avoid

- All radio buttons in a group must share the same `name` attribute for mutual exclusivity.
- Do not omit `id` — it is required for label association.
