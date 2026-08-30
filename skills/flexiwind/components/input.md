## Demo

```html
<form class="space-y-4 w-full">
    <x-ui.input placeholder="Start typing..."/>
    <x-ui.input placeholder="Start typing..." variant="flush" class="bg-muted"/>
</form>
```

## Installation

```shell
php artisan flexi:add input
```

## Public Docs

`https://flexiwind.unoforge.com/components/input`

## With label


```html
<form class="space-y-4 w-full">
    <x-ui.input type="email" placeholder="Start typing..." label="Your Email"/>
    <x-ui.input type="email" placeholder="Start typing..." inlined-label label="Your Email" label-class="min-w-max"/>
</form>
```

## Input Groups

Input groups allow you to compose inputs with leading or trailing elements such as icons, prefixes, suffixes, or actions.

When using x-ui.input.group , the input itself must be rendered in variant mode.

- Always set variant to unstyled for the input
- Never pass label to the input
- Styling and layout are handled by the group container

### Leading

```html
<form class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="email" placeholder="jackdoe" class="ps-9 px-3" />
        <x-ui.input.leading absolute class="text-foreground text-sm">
            <x-ui.icon name="ph--at" class="size-4" />
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="24" class="ps-11 px-3" />
        <x-ui.input.leading absolute
            class="text-sm text-foreground">
            CDF
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="my-website.com" class="ps-16" />
        <x-ui.input.leading absolute
            class="text-sm text-foreground">
            https://
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group class="flex">
        <x-ui.input.leading aria-hidden="true"
            class="px-3 text-foreground bg-muted/80 rounded-l-ui">
            <x-ui.icon name="ph--at" class="size-4" />
        </x-ui.input.leading>
        <x-ui.input variant="unstyled" type="text" placeholder="johndoe" class="rounded-r-ui px-3" />
    </x-ui.input.group>
</form>
```

### Trailing

```html
<form class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="email" placeholder="johndoe" class="pe-9 px-3" />
        <x-ui.input.trailing absolute class="text-foreground">
            <x-ui.icon name="ph--at" class="size-4" />
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="24" class="pe-11 px-3" />
        <x-ui.input.trailing absolute class="text-sm text-foreground">
            CDF
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="Your email here" class="pe-16 px-3" />
        <x-ui.input.trailing absolute class="text-sm text-foreground">
            @gmail.com    
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="jackdoe" class="rounded-r-ui px-3 flex-1" />
        <x-ui.input.trailing class="px-3 text-foreground bg-muted/80 rounded-r-ui">
            <x-ui.icon name="ph--at" class="size-4" />
        </x-ui.input.trailing>
    </x-ui.input.group>
</form>
```

In some cases, the trailing/leading element can be visually separated and styled as part of the control. As you can see in given examples.

## Summary

- Use the label prop for simple inputs
- Use x-ui.label for custom layouts
- Use x-ui.input.group for composed inputs
- Always use variant inside groups
- Never mix labels with grouped inputs

## Avoid

- Do not pass `label` to an input inside `x-ui.input.group` — labels are not supported in grouped mode.
- Do not use `variant="default"` inside a group — use `variant="unstyled"`.
- Do not use `invalid` as a string; it is a boolean prop.

## References

### Composition

| Prop | Description |
| --- | --- |
| x-ui.input | The main input component |
| x-ui.input.group | A container wrapper for input groups that provides consistent styling and layout |
| x-ui.input.leading | A leading element container for inputs, typically used for icons or text that appears before the input content. Can be positioned absolutely or inline. |
| x-ui.input.trailing | A trailing element container for inputs, typically used for icons or text that appears after the input content. Can be positioned absolutely or inline. |

### Input Props

To configure the input component you can use the following props. All props are optional.

| Prop | Description |
| --- | --- |
| type (string) | The input type. Default: "text" |
| size (string) | The size of the input. Options: "sm", "md", "lg", "none". Default: "md" |
| invalid (boolean) | Whether the input is invalid or not for visual, default : false. |
| disabled (boolean) | Whether the input is disabled. Default: false |
| readonly (boolean) | Whether the input is readonly. Default: false |
| label (string) | The label text for the input. Default: null |
| variant (string) | The variant of the input. Options: "default", "ghost", "flush", "unstyled". Default: "default" |
| labelPosition (top\|inline) | Position of the label relative to the input. Options: "top", "inline". Default: "top" |
| labelClass (string) | Additional CSS classes for the label. Default: '' |

### Group Props

| Prop | Description |
| --- | --- |
| size (string) | The size of the group. Options: "sm", "md", "lg", "xl", "none". Default: "md" |
| variant (string) | The variant of the group. Options: "default", "ghost", "flush", "unstyled". Default: "default" |

### Leading/Trailing Props

| Prop | Description |
| --- | --- |
| absolute (boolean) | Whether the element should be positioned absolutely within the input. Default: false |
| class (string) | Additional CSS classes for the element. Default: '' |
| clickable (boolean) | Whether the element should be clickable. Default: false |
