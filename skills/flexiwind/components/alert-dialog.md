## Demo

```html
<x-ui.modal id="confirm-action">
    <x-ui.modal.trigger modal-id="confirm-action">
        <x-ui.button>Show Modal</x-ui.button>
    </x-ui.modal.trigger>
    <x-ui.modal.content size="sm">
        <x-ui.modal.header>
            <x-ui.modal.title>Confirm your action</x-ui.modal.title>
            <x-ui.modal.description>Are you sure you want to proceed with this action?</x-ui.modal.description>
            <x-ui.modal.close/>
        </x-ui.modal.header>
        <x-ui.modal.footer>
            <x-ui.button>Yes, Proceed</x-ui.button>
            <x-ui.button variant="ghost" intent="gray">No, Cancel</x-ui.button>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>
```

## Installation

Alert dialog relies on the modal system. Install and review modal usage first. See [modal.md](./modal.md).

```shell
php artisan flexi:add modal
```

## Public Docs

`https://flexiwind.unoforge.com/components/alert-dialog`

## Guidance

- Alert Dialog is **not** a standalone primitive — it's built on top of `x-ui.modal` and its subcomponents.
- Do not document `x-ui.alert-dialog` as a Blade component; no such file exists.
- Use `x-ui.modal`, `x-ui.modal.content`, `x-ui.modal.header`, `x-ui.modal.title`, `x-ui.modal.description`, and `x-ui.modal.footer`.

## Avoid

- Do not invent `x-ui.alert-dialog` — it does not exist as a standalone primitive.
