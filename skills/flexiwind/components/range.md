## Demo

```html
<div class="flex flex-col space-y-5 w-full">
    <x-ui.range name="range_slide" min="0" max="100" class="text-primary" />
    <x-ui.range name="range_slide" min="0" max="80" value="20" class="text-secondary" />
</div>
```

## Installation

```shell
php artisan flexi:add range
```

## Public Docs

`https://flexiwind.unoforge.com/components/range`

## API

| Prop | Description |
| --- | --- |
| size (xs\|sm\|md) | Controls track and thumb sizing |
| min (number\|string) | Lower bound for slider value |
| max (number\|string) | Upper bound for slider value |
| customIndicator (string\|null) | Custom classes for visual progress indicator |
| thumbBackground (default\|current) | Uses current text color for thumb. Default: 'default' |
| radius (boolean) | Controls rounded treatment. Default: true |

## Guidance

- Use `class="text-{intent}"` to color the range slider (e.g., `text-primary`, `text-destructive`).
- Use `step` attribute for discrete values.
- The component is a styled native `<input type="range">`.

## Avoid

- Do not use `min`/`max` without values — range requires both for proper behavior.
- Do not expect custom dropdowns or tooltips — the range is a native HTML slider.
