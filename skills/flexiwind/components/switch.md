## Demo

```html
<div class="flex items-center flex-wrap gap-3">
    <x-ui.switch name="switch_1" id="switch_1" />
    <x-ui.switch name="switch_def2" id="switch_def2" bg="muted" track="title" knob="muted" />
    <x-ui.switch name="switch_def3" id="switch_def3" bg="surface" track="surface" knob="bg" />
</div>
```

## Installation

```shell
php artisan flexi:add switch
```

## With label

Use the `label` prop for a simple inline label:

```html
<div class="flex flex-col gap-3">
    <x-ui.switch name="switch" id="switch" label="Use Dark Theme" />
    <x-ui.switch checked name="switch_lab1" id="switch_lab1" label="Checked" />
</div>
```

For more control over label position and layout, use an external `<label for="...">`:

```html
<div class="flex flex-col gap-3">
    <label for="switch_lab_2" class="flex items-center gap-x-1">
        <span class="text-sub-title me-3">No</span>
        <x-ui.switch name="switch_lab_2" id="switch_lab_2" />
        <span class="text-sub-title ms-3">Yes</span>
    </label>
</div>
```

## Sizes

```html
<div class="flex flex-col gap-3 w-full">
    <label for="switch_xs" class="flex items-center gap-x-1">
        <x-ui.switch size="xs" name="switch_xs" id="switch_xs" />
        <span class="text-sub-title ms-3">Xs</span>
    </label>
    <label for="switch_sm" class="flex items-center gap-x-1">
        <x-ui.switch size="sm" name="switch_sm" id="switch_sm" />
        <span class="text-sub-title ms-3">SM</span>
    </label>
    <label for="switch_normal" class="flex items-center gap-x-1">
        <x-ui.switch name="switch_normal" id="switch_normal" />
        <span class="text-sub-title ms-3">MD</span>
    </label>
    <label for="switch_lg" class="flex items-center gap-x-1">
        <x-ui.switch size="lg" name="switch_lg" id="switch_lg" />
        <span class="text-sub-title ms-3">LG</span>
    </label>
</div>
```

## Outlined

```html
<div class="flex items-center flex-wrap gap-6">
    <x-ui.switch outlined name="switch_outline1" id="switch_outline1" bg="bg" track="transparent" knob="muted" />
    <x-ui.switch outlined name="switch_outline2" id="switch_outline2" bg="bg" track="transparent" knob="muted" />
</div>
```

## References

### Switch Props

All props are optional unless noted.

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| id | string | auto | Input id — auto-generated from name or uniqid |
| name | string | — | Required for form submission |
| value | string | — | Input value |
| checked | boolean | false | Whether switch is toggled on |
| disabled | boolean | false | Disables interaction |
| size | string | 'md' | xs, sm, md, lg |
| outlined | boolean | false | Outlined style with ring |
| label | string | — | Renders an inline label next to the switch |
| bg | string | 'default' | Unchecked track background. See bg map below |
| track | string | 'default' | Checked track color (maps to CSS `color`). See track map |
| knob | string | 'white' | Knob color. See knob map |
| knobChecked | string | — | Knob color when checked (falls back to knob) |
| class | string | '' | Additional CSS classes |

### Semantic Color Maps

#### bg — unchecked track background

| Value | CSS Variable |
|-------|-------------|
| default | `--switch-bg:var(--color-bg-muted)` |
| muted | `--switch-bg:var(--color-bg-subtle)` |
| surface | `--switch-bg:var(--color-bg-surface)` |
| bg | `--switch-bg:var(--color-bg)` |

#### track — checked track color (uses CSS `color` with `checked:bg-current`)

| Value | CSS |
|-------|-----|
| default | `color:var(--color-primary-600)` |
| muted | `color:var(--color-bg-muted)` |
| surface | `color:var(--color-fg)` |
| neutral | `color:var(--color-fg-muted)` |
| title | `color:var(--color-fg-title)` |
| transparent | `color:transparent` |

Any arbitrary CSS color value also works (pass it as a string) — it will be used as `var(--color-{value})`.

#### knob — knob/dot color

| Value | CSS Variable |
|-------|-------------|
| white | `var(--color-white)` |
| bg | `var(--color-bg)` |
| muted | `var(--color-fg-muted)` |
| neutral | `var(--color-fg)` |

Any arbitrary color value also works — it will be used as `var(--color-{value})`.

#### knobChecked

When set, applies `--knob-bg-checked` for a different knob color in the checked state. Falls back to `--knob-bg` when omitted.

### Styling Examples

```html
<!-- Default switch -->
<x-ui.switch name="s1" id="s1" />

<!-- Custom colors via semantic props -->
<x-ui.switch name="s2" id="s2" bg="surface" track="title" knob="neutral" />

<!-- Outlined with custom knob -->
<x-ui.switch outlined name="s3" id="s3" bg="bg" track="transparent" knob="muted" />

<!-- With label -->
<x-ui.switch name="s4" id="s4" label="Enable notifications" />

<!-- Checked with different knob color -->
<x-ui.switch checked name="s5" id="s5" knob="muted" knobChecked="white" />
```

### Size Classes

| Prop | Classes Applied |
| --- | --- |
| xs | `switch-xs` + `switch-base-xs` |
| sm | `switch-sm` + `switch-base-sm` |
| md | `switch-md` + `switch-base-md` (default) |
| lg | `switch-lg` + `switch-base-lg` |

When `outlined="true"`, the component adds `ring ring-border-strong shadow`.

## Avoid

- Do not use `variant`, `intent`, or custom CSS variables for styling — use the semantic props (`bg`, `track`, `knob`, `knobChecked`) instead.
- Do not omit `name` — it is required for form submission.
- Do not pass `class` with background colors that conflict with `bg` prop — the `bg` prop sets `--switch-bg`.
