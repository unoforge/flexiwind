---
title: "Modals and feedback"
group: "Tips & snippets"
order: 20
tier: "pro"
state: "new"
description: "Open and close modals from Livewire, confirm with toasts, and keep people informed while things load."
seoDescription: "Flexiwind tips for Livewire modals and toasts: open and close from PHP, toast after redirect, undo actions, promise toasts."
keywords: "livewire open modal from php, close modal livewire, laravel toast notification, toast after redirect, undo toast"
---

## Open and close a modal from PHP

Every modal listens to two browser events named after its id. Dispatch them from a Livewire action:

```php
$this->dispatch('modal:edit-member:open');
$this->dispatch('modal:edit-member:close');
```

Open from PHP when the modal needs data first (fill the form, then open); otherwise open it in the browser with `x-on:click="$modal('edit-member').showModal()"` and save a round trip.

## Keep the modal inside its component

Put `<x-ui.modal>` in the same Livewire component as the action that fills it. The modal stays in place in the page — the browser shows it on top anyway — so Livewire keeps updating its fields and its error messages.

## A toast for every action that saves

People should never wonder whether it worked. Dispatch a toast at the end of the action, with what changed in the message.

```php
$this->dispatch('toast', type: 'success', message: "{$project->name} created");
```

Put the toaster once in your layout: `<x-ui.toaster />`.

## A toast after a redirect

When the action redirects, flash the toast in the session: the next page shows it.

```php
return redirect()->route('projects.show', $project)
    ->with('toast', ['type' => 'success', 'message' => 'Project created']);
```

## Undo instead of "Are you sure?"

A toast can carry an action. Its button dispatches a Livewire event back to your component:

```php
$this->dispatch('toast',
    message: 'Project archived',
    action: ['label' => 'Undo', 'event' => 'project-restore', 'params' => ['id' => $project->id]],
);

#[On('project-restore')]
public function restore(int $id): void
{
    // The id comes back from the browser: find it again, check the policy.
}
```

The full pattern, with soft deletes and an undo window: [Delete, then undo](/cookbook/recipes/delete-with-undo).

## A toast that follows a long action

For an action that takes seconds, show a loading toast that turns into the result. From Alpine, wrap the Livewire call:

```blade
<x-ui.button x-on:click="$toast.promise($wire.export(), {
    loading: 'Preparing the export…',
    success: 'Export ready',
    error: 'The export failed',
})">
    Export
</x-ui.button>
```

## Focus the first field

A modal form should be typed into right away. `autofocus` on the first field does it when the modal opens:

```blade
<x-ui.input id="project-name" wire:model="name" autofocus />
```
