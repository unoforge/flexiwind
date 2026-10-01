---
title: "Edit a row in a modal"
group: "Recipes"
order: 10
tier: "pro"
state: "new"
description: "A table of team members, an Edit button per row, a modal form that validates, saves, closes and confirms with a toast."
seoDescription: "Edit an Eloquent record in a modal with Livewire and Flexiwind: prefilled form, validation, authorization, toast."
keywords: "livewire modal form, edit in modal, laravel crud modal, livewire validation, flexiwind recipe"
---

## The result

Click **Edit** on a row, change the name, email or role, save. Try an email already used by someone else, or leave the name empty.

:::raw
<x-docs.preview-ui>
    <livewire:cookbook-edit-member />
</x-docs.preview-ui>
:::

## What it combines

- [Table](/components/table) for the list, [Modal](/components/modal) for the form, [Listbox](/components/listbox) for the role, [Toast](/components/toast) for the confirmation.
- One Livewire component: the modal lives next to the table it edits, so there is no state to pass around.

## The component

The demo keeps its rows in memory; here is the same component with Eloquent. Members are read through the team of the person signed in, so an id from another team is never found.

```blade title="resources/views/components/⚡team-members.blade.php"
<?php

use App\Enums\Role;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

new class extends Component
{
    #[Locked]
    public ?int $editingId = null;

    public string $name = '';

    public string $email = '';

    public string $role = '';

    /** @return Collection<int, Member> */
    #[Computed]
    public function members(): Collection
    {
        return auth()->user()->team->members()->orderBy('name')->get();
    }

    public function edit(int $id): void
    {
        $member = $this->findMember($id);

        $this->editingId = $member->id;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->role = $member->role->value;
        $this->resetValidation();

        $this->dispatch('modal:edit-member:open');
    }

    public function save(): void
    {
        $member = $this->findMember($this->editingId);

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:255', Rule::unique('members')->ignore($member)],
            'role' => ['required', Rule::enum(Role::class)],
        ]);

        $member->update($validated);

        $this->dispatch('modal:edit-member:close');
        $this->dispatch('toast', type: 'success', message: "{$member->name} updated");
        $this->reset('editingId', 'name', 'email', 'role');
    }

    private function findMember(?int $id): Member
    {
        abort_if($id === null, 404);

        $member = auth()->user()->team->members()->findOrFail($id);

        $this->authorize('update', $member);

        return $member;
    }
};
?>
```

## The view

```blade title="resources/views/components/⚡team-members.blade.php"
<div>
    <x-ui.table>
        <x-ui.table.columns>
            <x-ui.table.column>Member</x-ui.table.column>
            <x-ui.table.column>Role</x-ui.table.column>
            <x-ui.table.column align="right"><span class="sr-only">Actions</span></x-ui.table.column>
        </x-ui.table.columns>
        <x-ui.table.rows>
            @foreach ($this->members as $member)
                <x-ui.table.row wire:key="member-{{ $member->id }}">
                    <x-ui.table.cell>
                        <span class="block font-medium">{{ $member->name }}</span>
                        <span class="block text-sm text-muted-foreground">{{ $member->email }}</span>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <x-ui.badge variant="soft" intent="gray" size="sm">{{ $member->role->label() }}</x-ui.badge>
                    </x-ui.table.cell>
                    <x-ui.table.cell align="right">
                        <x-ui.button size="sm" variant="ghost" intent="gray"
                            wire:click="edit({{ $member->id }})" aria-label="Edit {{ $member->name }}">
                            Edit
                        </x-ui.button>
                    </x-ui.table.cell>
                </x-ui.table.row>
            @endforeach
        </x-ui.table.rows>
    </x-ui.table>

    <x-ui.modal id="edit-member">
        <x-ui.modal.content size="md">
            <x-ui.modal.header title="Edit member" description="Changes apply as soon as you save." />

            <form wire:submit="save">
                <x-ui.modal.body class="gap-5">
                    <x-ui.field label="Name" for="member-name" :error="$errors->first('name')">
                        <x-ui.input id="member-name" wire:model="name" :invalid="$errors->has('name')" />
                    </x-ui.field>

                    <x-ui.field label="Email" for="member-email" :error="$errors->first('email')">
                        <x-ui.input id="member-email" type="email" wire:model="email" :invalid="$errors->has('email')" />
                    </x-ui.field>

                    <x-ui.listbox wire:model="role" label="Role" :options="App\Enums\Role::cases()" />
                </x-ui.modal.body>

                <x-ui.modal.footer justify="end">
                    <x-ui.modal.close variant="outline" intent="gray">Cancel</x-ui.modal.close>
                    <x-ui.button type="submit" wire:loading.attr="disabled" wire:target="save">
                        <span wire:loading.remove wire:target="save">Save changes</span>
                        <span wire:loading wire:target="save">Saving…</span>
                    </x-ui.button>
                </x-ui.modal.footer>
            </form>
        </x-ui.modal.content>
    </x-ui.modal>
</div>
```

The listbox reads the enum directly: each case becomes an option, and its `label()` method, when it has one, becomes the text.

## How it works

1. **Edit** calls `edit($id)`. The component loads the member, fills the form, clears old errors, then dispatches `modal:edit-member:open`. The modal opens once the fields are filled, never empty for a split second.
2. The form posts with `wire:submit`: Enter saves, and `wire:model` sends nothing until then — one request per save.
3. `save()` loads the member again from the database. It does not trust anything kept since `edit()`.
4. On success, the component closes the modal with `modal:edit-member:close`, shows a toast and resets the form. On error, the modal stays open with the messages under their fields.

## Security

- `#[Locked]` on `$editingId`: the browser cannot change which row is saved. Without it, someone could edit a member they never opened.
- The member is read through the team (`team->members()`), then checked with a policy (`authorize('update')`). Either one alone would stop most mistakes; both cover a forgotten scope or a forgotten policy.
- Every field is validated on save, the role against the enum, the email as unique except for this member.

## Variations

- **Create and edit in one modal**: leave `$editingId` null for a new member, and call `Member::create()` instead of `update()` in `save()`.
- **Many fields**: move them to a [Livewire form object](https://livewire.laravel.com/docs/forms) and keep `editingId` in the component.
- **Open without waiting**: put `x-on:click="$modal('edit-member').showModal()"` next to `wire:click` and add a loading state in the modal body. Only worth it when loading the record is slow.
