## Demo

```html
<div class="w-full space-y-3">
    <x-ui.select name="select-country" id="select-country">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
</div>
```

## Installation

```shell
php artisan flexi:add select
```

## Public Docs

`https://flexiwind.unoforge.com/components/select`

## With label

```html
<div class="w-full space-y-4">
    <x-ui.select label="Country" name="select-country_label" id="select-country_label">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
    <x-ui.select inlined-label label="Country" label-class="min-w-max" name="select-country_inlined" id="select-country_inlined"
        variant="flush" class="bg-muted">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
</div>
```

## With Icon


```html
<form action="#" class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.select variant="unstyled" name="select-country_label_1" id="select-country_label_1" class="ps-9 px-3">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
        <x-ui.input.leading absolute class="text-muted-foreground">
            <x-ui.icon name="ph--flag" class="text-sm" />
        </x-ui.input.leading>
    </x-ui.input.group>

    <x-ui.input.group>
        <x-ui.input.leading aria-hidden="true"
            class="py-2 px-3 text-muted-foreground bg-muted rounded-l-ui">
            <x-ui.icon name="ph--flag" class="size-4" />
        </x-ui.input.leading>
        <x-ui.select variant="unstyled" class="rounded-r-ui px-3" name="select-country_label_2" id="select-country_label_2">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
    </x-ui.input.group>
</form>
```

## Icon Indicator

```html
<div class="relative w-full">
    <x-ui.select name="select-country" id="select-country" class="pe-9" :indicator="false">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
    <span aria-hidden="true"
        class="absolute right-3 inset-y-px text-muted-foreground pointer-events-none flex items-center">
        <x-ui.icon name="ph--caret-up-down" class="text-sm" />                             
    </span>
</div>
```

## References

### Composition

| Prop | Description |
| --- | --- |
| x-ui.select | The main select component |
| x-ui.input.group | A container wrapper for select groups that provides consistent styling and layout |
| x-ui.input.leading | A leading element container for selects, typically used for icons or text that appears before the select content. Can be positioned absolutely or inline. |
| x-ui.input.trailing | A trailing element container for selects, typically used for icons or text that appears after the select content. Can be positioned absolutely or inline. |

### Select Props

To configure the select component you can use the following props. All props are optional.

| Prop | Description |
| --- | --- |
| size (string) | The size of the select. Options: "sm", "md", "lg", "none". Default: "md" |
| disabled (boolean) | Whether the select is disabled. Default: false |
| readonly (boolean) | Whether the select is readonly. Default: false |
| label (string) | The label text for the select. Default: null |
| variant (string) | The variant of the select. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| labelPosition (top\|inline) | Position of the label relative to the select. Options: "top", "inline". Default: "top" |
| labelClass (string) | Additional CSS classes for the label. Default: '' |
| indicator (boolean) | Controls the dropdown indicator visibility. Default: true |
| class (string) | Additional CSS classes for the select. Default: '' |

### Group Props

The select component uses the same input group component. See input component references for group props.

## Avoid

- Do not pass `label` to a select inside `x-ui.input.group` — use `x-ui.label` separately.
- Do not use `variant="default"` inside a group — use `variant="unstyled"`.
- The select is a styled native `<select>` — do not expect a custom dropdown menu system.
