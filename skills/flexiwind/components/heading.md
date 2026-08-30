## Demo

```html
<div class="space-y-4">
    <x-ui.heading level="1">Heading Level 1</x-ui.heading>
    <x-ui.heading level="2">Heading Level 2</x-ui.heading>
    <x-ui.heading level="3">Heading Level 3</x-ui.heading>
</div>
```

## Installation

```shell
php artisan flexi:add heading
```

## Public Docs

`https://flexiwind.unoforge.com/components/heading`

## API

| Prop | Description |
| --- | --- |
| level (1\|2\|3\|4\|5) | Heading level determining HTML tag (h1-h5) and size |
| intent (title\|body\|muted\|primary\|secondary\|destructive\|warning) | Semantic color intent |

## Guidance

- Use semantic heading levels (h1-h5), don't skip levels.
- Use `x-ui.heading` and `x-ui.text` instead of raw utility classes when you want documented typography primitives.

## Avoid

- Do not skip heading levels (e.g., h1 to h3) — it breaks the document outline for screen readers.
