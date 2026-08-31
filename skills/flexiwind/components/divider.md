## Demo

```html
<div class="flex flex-col gap-4 w-full">
    <x-ui.divider class="border-primary"/>
    <x-ui.divider class="border-secondary"/>
    <x-ui.divider class="border-destructive"/>
    <x-ui.divider class="border-gray-500"/>
</div>
```

## Installation

```shell
php artisan flexi:add divider
```

## With label

```html
<x-ui.divider label="Label Start" class="before:bg-muted" label-class="pr-3 bg-background  text-foreground"/>
<x-ui.divider label="Label Center" class="before:bg-muted" label-placement="middle" label-class="px-3 bg-background  text-foreground"/>
<x-ui.divider label="Label End" class="before:bg-muted" label-placement="end" label-class="pl-3 bg-background  text-foreground"/>
<x-ui.divider label="Label Center" class="before:bg-muted" label-placement="middle" label-class="px-3 bg-emerald-600 dark:bg-emerald-500 text-sm text-white rounded-full py-px"/>
```

## With size

```html
<x-ui.divider size="2" class="border-primary"/>
<x-ui.divider size="3" class="border-primary"/>
<x-ui.divider label="Thick" size="3" class="before:bg-muted" label-placement="middle" label-class="px-3 bg-background  text-foreground"/>
```

## API

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| size | default\|2\|3 | default | Thickness (without label: border-\*, with label: divider-custom-\*) |
| label | string\|null | null | When set, renders a labeled divider with pseudo-element line |
| labelPlacement | start\|middle\|end | start | Label position along the divider line |
| labelClass | string | '' | Extra classes for the inner `<span>` (bg, text, padding, pill styles) |
| class | string | '' | Passed to the root element — use `border-*` without label, `before:bg-*` with label |

## Rendering modes

The component has two distinct rendering paths based on whether `label` is provided:

- **Without label**: renders `<hr class="w-full {size-class} {class}">`. Color via `border-*` utilities. Thickness via `size` prop (`default` → normal `<hr>`, `2` → `border-2`, `3` → `border-3`).
- **With label**: renders `<div class="divider-custom w-full {size-class} flex items-center {placement} {class}">` containing a `<span>`. The line is a `::before` pseudo-element. Color via `before:bg-*`, thickness via `size` (`divider-custom-1/2/3`).

## CSS architecture

The `divider-custom` utilities live in `resources/css/flexiwind/ui.css`:

```css
@utility divider-custom {
  @apply relative before:absolute before:inset-x-0 flex items-center;
}
@utility divider-custom-1 { @apply before:h-px; }
@utility divider-custom-2 { @apply before:h-[2px]; }
@utility divider-custom-3 { @apply before:h-[3px]; }
```

The `::before` pseudo-element creates the full-width line. The label `<span>` sits on top of it — its background (`bg-background ` or any color) covers the line behind the text.

## Guidance

- **Spacing**: Add vertical margin with `my-*` / `my-*` directly in `class`. Common: `my-6`, `my-8`, `my-4`, `mt-6 mb-6`.
- **Label background is required**: Always include a background on `label-class` (e.g., `bg-background `) to mask the line behind the text. Without it, the line shows through the label.
- **Label padding**: Use `px-*` for centered labels, `pr-*` for start, `pl-*` for end to create gap between text and line ends.
- **Label color**: `text-foreground` (regular), `text-muted-foreground` (subtle), `text-white` (on colored pills).
- **Pill-style labels**: Combine `bg-{color} text-{color} rounded-full py-px` in `label-class`.
- **As section separator**: Drop `<x-ui.divider class="before:bg-muted" />` between sections in forms, slideovers, cards.
- **In dropdowns**: `<x-ui.divider class="col-span-full -mx-1 py-0.5 border-border" />` — uses `border-border` because no label (renders `<hr>`).
- **In auth forms**: `<x-ui.divider label-placement="middle" label="Or continue with" class="before:bg-muted my-6" label-class="px-3 bg-background  text-muted-foreground text-sm" />`.

## Avoid

- Do not stack multiple dividers back-to-back — use spacing instead.
- Do not use `label-placement` without a `label` — it has no effect.
- Do not use `before:bg-*` on a divider without a label — it renders `<hr>`, not a pseudo-element.
- Do not use `border-*` on a labeled divider — the line is a `::before` pseudo-element, not a border.
- Do not forget `bg-*` on `label-class` — without it, the divider line bleeds through the text.
