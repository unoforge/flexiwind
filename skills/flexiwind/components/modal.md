## Demo

```html
<x-ui.modal.trigger modal-id="edit-profile" variant="solid" intent="primary">
    Show Modal
</x-ui.modal.trigger>

<x-ui.modal id="edit-profile">
    <x-ui.modal.content>
        <x-ui.modal.header
            title="Edit profile"
            description="Make changes to your profile here. Click save when you're done." />
        <x-ui.modal.body>
            <p>Content here.</p>
        </x-ui.modal.body>
        <x-ui.modal.footer>
            <x-ui.button>Save changes</x-ui.button>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>
```

## Installation

```shell
php artisan flexi:add modal
```

Requires Flexilla JS: `npm i @flexilla/modal`

### With Alpine/Livewire

```js
import { ModalPlugin } from "./plugins/modal";
Alpine.plugin(ModalPlugin);
```

### Without Alpine

```js
import { Modal } from "@flexilla/modal";
Modal.autoInit('[data-app-modal]');
```

## Public Docs

`https://flexiwind.unoforge.com/components/modal`

## API

### Modal Props

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| id | string | - | Required unique identifier |

### Modal Content Props

| Prop | Type | Default | Description |
| --- | --- | --- | --- |
| size | string | 'md' | xs, sm, md, lg, xl, 2xl, 3xl, 4xl, full |
| closable | boolean | true | Show close button |
| gutter | boolean | true | Default padding |
| enterAnimation | string | 'modal-animation-in .4s linear' | CSS animation on open |
| exitAnimation | string | 'modal-animation-out .1s linear' | CSS animation on close |

### Subcomponents

| Component | Description |
| --- | --- |
| x-ui.modal | Wrapper; receives the `id` |
| x-ui.modal.trigger | Opens the modal. Must have `modal-id` attribute matching modal's `id` |
| x-ui.modal.content | Main container, handles sizing |
| x-ui.modal.header | Header; accepts `title` and `description` props directly, or rich slot content |
| x-ui.modal.title | Modal title |
| x-ui.modal.description | Optional description |
| x-ui.modal.body | Main content area (scrollable) |
| x-ui.modal.footer | Action buttons |
| x-ui.modal.close | Close button (inherits x-ui.button props) |

### Events

| Event | Description |
| --- | --- |
| modal:{id}:open | Dispatch to open the modal programmatically |
| modal:{id}:close | Dispatch to close the modal programmatically |

## Guidance

- Modal uses a real `<dialog>` element — it is `hidden` when closed, so the trigger **must be placed outside** the `<x-ui.modal>` wrapper. A trigger inside the modal would be invisible and unclickable.
- The `id` goes on `x-ui.modal`, not on `x-ui.modal.content`.
- `x-ui.modal.header` with `title`/`description` props is the canonical form. Use the slot only for complex, custom header layouts.
- When `closable="true"` (default on content), an X button is auto-added to the content corner. Add `x-ui.modal.close` manually only when you set `:closable="false"` on the content and want a custom close button elsewhere (e.g., in the footer).
- `alert-dialog` is built on top of modal primitives — there is no standalone `x-ui.alert-dialog`.

## Avoid

- Do not place `x-ui.modal.trigger` inside `<x-ui.modal>` — the dialog is hidden when closed; the trigger will be invisible.
- Do not put `id` on `x-ui.modal.content`; it belongs on `x-ui.modal`.
- Do not nest `<x-ui.button>` inside `<x-ui.modal.trigger>` — the trigger already renders as a button and accepts button props directly.
- Do not add `x-ui.modal.close` inside the header when `closable` is true on the content — the X button is already auto-added by the content.
- Do not nest a `<button>` or `<x-ui.button>` inside `<x-ui.modal.close>` — close inherits `x-ui.button` props. Passing text or an icon is fine.
