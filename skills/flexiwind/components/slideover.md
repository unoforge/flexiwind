## Demo

```html
<x-ui.slideover id="settings">
<x-ui.slideover.trigger slideover-id="settings" variant="solid" intent="primary">
    Edit Setting
</x-ui.slideover.trigger>
    <x-ui.slideover.content>
        <x-ui.slideover.header>
            <x-ui.slideover.title>Update User Settings</x-ui.slideover.title>
            <x-ui.slideover.close/>
        </x-ui.slideover.header>
        <x-ui.slideover.body>
            <p>Make changes to your account here.</p>
        </x-ui.slideover.body>
        <x-ui.slideover.footer>
            <x-ui.button>Save changes</x-ui.button>
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
| x-ui.slideover.trigger | Opens the slideover. Must have `slideover-id` attribute |
| x-ui.slideover.content | Main container |
| x-ui.slideover.header | Header with title and close |
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

- Slideover mirrors modal composition style.
- The `id` goes on `x-ui.slideover`, not on `x-ui.slideover.content`.

## Avoid

- Do not flatten into a single tag.
- Do not put `id` on `x-ui.slideover.content`; it belongs on `x-ui.slideover`.
- Do not nest `<x-ui.button>` inside `<x-ui.slideover.trigger>` — the trigger already renders as a button and accepts button props directly.
