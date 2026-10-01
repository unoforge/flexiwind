---
title: "Delete, then undo"
group: "Recipes"
order: 20
tier: "pro"
state: "new"
description: "Ask before deleting, delete right away, and offer Undo in a toast instead of a second confirmation."
seoDescription: "Confirm a deletion in a modal and undo it from a toast with Livewire, soft deletes and Flexiwind."
keywords: "delete confirmation, undo delete, soft delete livewire, toast undo, laravel restore"
---

## The result

Delete a file: a short confirmation names it, the file leaves the list, and the toast offers **Undo** for six seconds.

:::raw
<x-docs.preview-ui>
    <livewire:cookbook-delete-undo />
</x-docs.preview-ui>
:::

## Why undo beats a second warning

A confirmation that people click without reading protects nobody. Ask once, with the name of what goes away, then make the mistake cheap to fix: the data stays in the database with [soft deletes](https://laravel.com/docs/eloquent#soft-deleting), and the toast brings it back.

## The component

```blade title="resources/views/components/⚡project-files.blade.php"
<?php

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    #[Locked]
    public ?int $deletingId = null;

    /** @return Collection<int, File> */
    #[Computed]
    public function files(): Collection
    {
        return auth()->user()->team->files()->latest()->get();
    }

    #[Computed]
    public function pending(): ?File
    {
        return $this->deletingId ? auth()->user()->team->files()->find($this->deletingId) : null;
    }

    public function confirmDelete(int $id): void
    {
        $file = auth()->user()->team->files()->findOrFail($id);
        $this->authorize('delete', $file);

        $this->deletingId = $file->id;
        $this->dispatch('modal:delete-file:open');
    }

    public function delete(): void
    {
        $file = auth()->user()->team->files()->findOrFail($this->deletingId);
        $this->authorize('delete', $file);

        $file->delete(); // SoftDeletes: the row stays, deleted_at is set.
        $this->deletingId = null;

        $this->dispatch('modal:delete-file:close');
        $this->dispatch('toast',
            message: "{$file->name} deleted",
            action: ['label' => 'Undo', 'event' => 'file-restore', 'params' => ['id' => $file->id]],
            duration: 6000,
        );
    }

    #[On('file-restore')]
    public function restore(int $id): void
    {
        $file = auth()->user()->team->files()->onlyTrashed()
            ->where('deleted_at', '>', now()->subMinutes(5))
            ->findOrFail($id);
        $this->authorize('restore', $file);

        $file->restore();

        $this->dispatch('toast', type: 'success', message: "{$file->name} restored");
    }
};
?>
```

## The view

```blade title="resources/views/components/⚡project-files.blade.php"
<div>
    <ul class="divide-y divide-border rounded-ui border border-border">
        @foreach ($this->files as $file)
            <li wire:key="file-{{ $file->id }}" class="flex items-center gap-3 px-4 py-3">
                <span class="flex-1 truncate text-sm font-medium">{{ $file->name }}</span>
                <x-ui.button size="sm" variant="ghost" intent="gray"
                    wire:click="confirmDelete({{ $file->id }})" aria-label="Delete {{ $file->name }}">
                    <span aria-hidden="true" class="iconify ph--trash size-4"></span>
                </x-ui.button>
            </li>
        @endforeach
    </ul>

    <x-ui.modal id="delete-file">
        <x-ui.modal.content size="sm" :closable="false" class="flex flex-col items-center gap-y-3 p-(--gutter) text-center">
            <x-ui.modal.title>Delete {{ $this->pending?->name ?? 'this file' }}?</x-ui.modal.title>
            <x-ui.modal.description>It leaves the list now. You can undo for a few seconds.</x-ui.modal.description>
            <div class="flex justify-center gap-x-3 pt-3">
                <x-ui.modal.close variant="outline" intent="gray">Keep it</x-ui.modal.close>
                <x-ui.button size="sm" intent="destructive" wire:click="delete" wire:loading.attr="disabled" wire:target="delete">
                    Delete
                </x-ui.button>
            </div>
        </x-ui.modal.content>
    </x-ui.modal>
</div>
```

## How it works

1. The trash button calls `confirmDelete($id)`: the component checks the file, keeps its id and opens the modal, which now shows its name.
2. **Delete** soft-deletes the file, closes the modal and dispatches a toast with an action. The action is plain data: a label, a Livewire event and its parameters.
3. **Undo** dispatches `file-restore` with `{ id: 3 }`. Any component listening with `#[On('file-restore')]` receives it as `restore(int $id)`.

## Security

- The toast runs in the browser: the id that comes back with **Undo** is untrusted. `restore()` looks it up again, among the team's trashed files only, and checks the `restore` policy.
- The undo window is enforced on the server (`deleted_at` within five minutes), not by the toast's duration. A replayed event after that finds nothing.
- `#[Locked]` keeps `$deletingId` out of the browser's reach: the Delete button can only delete the file that was confirmed.

## Variations

- **Several at once**: keep an array of locked ids, delete them in one query, and pass them all in `params`.
- **Purge for good**: schedule `File::onlyTrashed()->where('deleted_at', '<', now()->subDays(30))->forceDelete()` with [model pruning](https://laravel.com/docs/eloquent#pruning-models).
- **No modal for small things**: for a draft or a filter, skip the confirmation and rely on Undo alone.
