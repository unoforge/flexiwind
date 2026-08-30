## Demo

```html
<x-ui.slideover.trigger slide-over-id="settings" variant="outline" intent="gray">
    Edit Setting
</x-ui.slideover.trigger>

<x-ui.slideover id="settings">
    <x-ui.slideover.content>
        <x-ui.slideover.header
            title="Update User Settings"
            description="Make changes to your account here. Click save when you're done." />
        <x-ui.slideover.body>
            <p>Content here.</p>
        </x-ui.slideover.body>
        <x-ui.slideover.footer>
            <x-ui.button intent="neutral">Save changes</x-ui.button>
            <x-ui.slideover.close variant="outline" intent="gray">Close</x-ui.slideover.close>
        </x-ui.slideover.footer>
    </x-ui.slideover.content>
</x-ui.slideover>
```

## Installation

```shell
php artisan flexi:add slideover
```

Requires Flexilla JS: `npm i @flexilla/offcanvas`

### With Alpine/Livewire

```js
import { OffcanvasPlugin } from "./plugins/offcanvas";
Alpine.plugin(OffcanvasPlugin);
```

### Without Alpine

```js
import { Offcanvas } from "@flexilla/offcanvas";
Offcanvas.autoInit('[data-app-offcanvas]');
```

## Public Docs

`https://flexiwind.unoforge.com/components/slideover`

## API

### Slideover Props

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| id | string | - | Required unique identifier |
| position | string | 'right' | right, left, top, bottom |
| size | string | 'md' | sm, md, lg, xl, 2xl, 3xl |
| closable | boolean | true | Close button and ESC key |
| staticBackdrop | boolean | false | Prevent outside click/ESC close |
| scrollableBody | boolean | false | Allow page scroll while open |

### Subcomponents

| Component | Description |
| --- | --- |
| x-ui.slideover | Wrapper; receives the `id` |
| x-ui.slideover.trigger | Opens the slideover. Must have `slide-over-id` attribute |
| x-ui.slideover.content | Main container |
| x-ui.slideover.header | Header; accepts `title` and `description` props directly, or rich slot content |
| x-ui.slideover.title | Slideover title |
| x-ui.slideover.description | Optional description |
| x-ui.slideover.body | Main content area |
| x-ui.slideover.footer | Action buttons |
| x-ui.slideover.close | Close button |

### Events

| Event | Description |
| --- | --- |
| sheet:{id}:open | Dispatch to open programmatically |
| sheet:{id}:close | Dispatch to close programmatically |

## Guidance

- The trigger must be placed **outside** the `<x-ui.slideover>` wrapper — the slideover panel starts as `opacity-0` (invisible), so a trigger inside it would never be visible or clickable.
- The `id` goes on `x-ui.slideover`, not on `x-ui.slideover.content`.
- `x-ui.slideover.header` with `title`/`description` props is the canonical form. Use the slot only for complex, custom header layouts.
- When `closable="true"` (default), an X button is auto-added to the panel corner. Use `x-ui.slideover.close` manually only when you need a custom close button in the footer and you set `:closable="false"`.

## Avoid

- Do not place `x-ui.slideover.trigger` inside `<x-ui.slideover>` — it will be invisible.
- Do not use `slideover-id` — the correct attribute is `slide-over-id` (kebab-case of `slideOverId`).
- Do not put `id` on `x-ui.slideover.content`; it belongs on `x-ui.slideover`.
- Do not nest `<x-ui.button>` inside `<x-ui.slideover.trigger>` — the trigger already renders as a button and accepts button props directly.
- Do not manually add `x-ui.slideover.close` in the header when `closable` is true — the panel already provides the X button automatically.
