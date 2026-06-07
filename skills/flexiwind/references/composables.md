# Composables & Patterns

Recipes for common Flexiwind patterns — modal control, form handling, and Livewire integration.

## Modal Programmatic Control

### Open/Close via Events

Dispatch custom events to control modals from anywhere:

```js
// Open a modal
window.dispatchEvent(new CustomEvent('modal:myModalId:open'));

// Close a modal
window.dispatchEvent(new CustomEvent('modal:myModalId:close'));
```

### From Livewire

```php
// In a Livewire component
$this->dispatch('modal:myModalId:open');
$this->dispatch('modal:myModalId:close');
```

### Prevent Close (Before-Hide)

Use the `before-hide` event to prevent a modal from closing:

```js
const modal = document.querySelector('#confirm-modal');
modal.addEventListener("before-hide", (event) => {
    // Call setExitAction(true) to prevent closing
    event.detail.setExitAction(true);
});
```

## Confirm Dialog Pattern

A complete confirm dialog with Livewire:

### Blade
```php

<?php
use Livewire\Component;
use App\Models\Author;

new class extends Component {
    public Author $author;
    public bool $isPending = false;

    public function mount(Author $author): void
    {
        $this->author = $author;
    }

    public function confirm(): void
    {
        $this->isPending = true;
        try {
            $this->author->user->update(['is_approved' => true]);
            $this->dispatch('modal:confirmAuthor-'.$this->author->id . ':close');
            $this->dispatch('author-status-changed');
        } finally {
            $this->isPending = false;
        }
    }
};
?>

<x-ui.modal.trigger intent="primary" modal-id="confirmAuthor-{{ $author->id }}">
    Confirm Author
</x-ui.modal.trigger>

<x-ui.modal id="confirmAuthor-{{ $author->id }}" class="justify-center items-center">
    <x-ui.modal.content size="sm" :closable="false"
        class="p-(--gutter) flex flex-col gap-y-4 items-center text-center">
        <div class="w-max h-max p-3 rounded-full ui-soft ui-soft-gray border border-border">
            <span aria-hidden="true" class="flex iconify ph--question text-xl"></span>
        </div>
        <x-ui.modal.title>
            Confirm subscription ({{ $author->user->name }})
        </x-ui.modal.title>
        <x-ui.modal.description>
            Are you sure?
        </x-ui.modal.description>
        <div class="flex justify-center gap-x-3 pt-4">
            <x-ui.button wire:click="confirm" wire:loading.attr="disabled"
                :disabled="$isPending" intent="success" size="sm">
                <span wire:loading.remove>Yes, Confirm</span>
                <span wire:loading>Confirming...</span>
            </x-ui.button>
            <x-ui.modal.close size="sm" variant="outline">
                Cancel
            </x-ui.modal.close>
        </div>
    </x-ui.modal.content>
</x-ui.modal>
```


## Form Handling

### Basic Form
```blade
<form wire:submit="save" class="space-y-4">
    <x-ui.input
        type="email"
        label="Email"
        wire:model="email"
        placeholder="you@example.com"
    />

    <x-ui.select label="Role" wire:model="role">
        <option value="">Select...</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </x-ui.select>

    <x-ui.button type="submit" intent="primary">Save</x-ui.button>
</form>
```

### Validation State
```blade
<x-ui.input
    type="email"
    label="Email"
    wire:model="email"
    :invalid="$errors->has('email')"
/>
```

## Slideover Programmatic Control

Same event pattern as modal:

```js
// Open
dispatch('slideover:mySlideoverId:open');
// Close
dispatch('slideover:mySlideoverId:close');
```
