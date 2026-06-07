## Demo

```html
<div class="space-y-2">
    <x-ui.text>Default muted text</x-ui.text>
    <x-ui.text intent="body">Body text for paragraphs</x-ui.text>
    <x-ui.text intent="title">Title text for emphasis</x-ui.text>
</div>
```

## Installation

```shell
php artisan flexi:add text
```

## Public Docs

`https://flexiwind.unoforge.com/components/text`

## API

| Prop | Description |
| --- | --- |
| intent (muted\|body\|title\|caption\|primary\|secondary\|warning\|danger) | Semantic color intent |
| as (string) | HTML tag to render. Default: p |

## Guidance

- Use `x-ui.text` for semantic text with intent-based coloring.
- Use `as` prop to change the HTML element (e.g., `as="span"`).

## Avoid

- Do not invent intent values beyond what the component supports.
- Do not wrap `x-ui.text` inside `x-ui.heading` or vice versa — use the right component for the right purpose.
