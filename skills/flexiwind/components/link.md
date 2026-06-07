## Demo

```html
<x-ui.link underlined href="#" class="text-fg hover:text-fg-title">
    Profile Page
</x-ui.link>
```

## Installation

```shell
php artisan flexi:add link
```

## Public Docs

`https://flexiwind.unoforge.com/components/link`

## API

| Prop | Description |
| --- | --- |
| href (string) | Destination URL. Internal links stay in same tab. |
| asButton (boolean) | Renders as button-styled action with link semantics |
| underlined (boolean) | Applies underline styling |
| underlineOffset (none\|1\|2\|3\|4\|8) | Controls underline offset |
| ariaLabel (string\|null) | Custom accessible label; recommended for icon-only links |
| disabled (boolean) | Adds disabled attributes and removes focusability |

## Examples

### As button

```html
<x-ui.link href="#" as-button intent="neutral">
    Click me
</x-ui.link>
<x-ui.link href="#" as-button variant="soft" intent="gray">
    Click me
    <span aria-hidden="true" class="flex iconify ph--caret-right text-sm"></span>
</x-ui.link>
```

## Guidance

- Use `x-ui.link` for consistent links that match Flexiwind styling.
- The link component supports `variant` and `intent` props when used with `asButton`.

## Avoid

- Do not use raw `<a>` tags when `x-ui.link` covers the need — the link component provides consistent styling and accessibility.
