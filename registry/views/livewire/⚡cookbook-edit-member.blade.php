<?php

use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;

/*
 * Cookbook — modifier une ligne dans un modal.
 *
 * La démo garde ses lignes dans le composant ; la recette montre la même
 * chose avec Eloquent. Tout ce qui vient du navigateur est revalidé ici :
 * l'id édité est verrouillé, le rôle doit être connu, l'e-mail unique.
 */
new class extends Component
{
    public const ROLES = ['owner' => 'Owner', 'admin' => 'Admin', 'member' => 'Member', 'viewer' => 'Viewer'];

    /** @var list<array{id: int, name: string, email: string, role: string}> */
    #[Locked]
    public array $members = [
        ['id' => 1, 'name' => 'Amara Diallo', 'email' => 'amara@acme.dev', 'role' => 'owner'],
        ['id' => 2, 'name' => 'Marc Dupont', 'email' => 'marc@acme.dev', 'role' => 'admin'],
        ['id' => 3, 'name' => 'Sarah Chen', 'email' => 'sarah@acme.dev', 'role' => 'member'],
        ['id' => 4, 'name' => 'Tom Rivera', 'email' => 'tom@acme.dev', 'role' => 'viewer'],
    ];

    /** La ligne en cours d'édition : jamais modifiable depuis le navigateur. */
    #[Locked]
    public ?int $editingId = null;

    public string $name = '';

    public string $email = '';

    public string $role = 'member';

    public function edit(int $id): void
    {
        $member = collect($this->members)->firstWhere('id', $id) ?? abort(404);

        $this->editingId = $member['id'];
        $this->fill(collect($member)->only(['name', 'email', 'role'])->all());
        $this->resetValidation();

        $this->dispatch('modal:edit-member:open');
    }

    public function save(): void
    {
        abort_if($this->editingId === null, 403);

        $others = collect($this->members)->where('id', '!=', $this->editingId)->pluck('email')->all();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:255', Rule::notIn($others)],
            'role' => ['required', Rule::in(array_keys(self::ROLES))],
        ], [
            'email.not_in' => 'Someone on the team already uses this email.',
        ]);

        $this->members = collect($this->members)
            ->map(fn (array $member): array => $member['id'] === $this->editingId ? [...$member, ...$validated] : $member)
            ->all();

        $this->dispatch('modal:edit-member:close');
        $this->dispatch('toast', type: 'success', message: "{$validated['name']} updated");
        $this->reset('editingId', 'name', 'email', 'role');
    }
};
?>

<div class="w-full max-w-2xl">
    <x-ui.table>
        <x-ui.table.columns>
            <x-ui.table.column>Member</x-ui.table.column>
            <x-ui.table.column>Role</x-ui.table.column>
            <x-ui.table.column align="right"><span class="sr-only">Actions</span></x-ui.table.column>
        </x-ui.table.columns>
        <x-ui.table.rows>
            @foreach ($members as $member)
                <x-ui.table.row wire:key="member-{{ $member['id'] }}">
                    <x-ui.table.cell>
                        <span class="block font-medium text-title-foreground">{{ $member['name'] }}</span>
                        <span class="block text-sm text-muted-foreground">{{ $member['email'] }}</span>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <x-ui.badge variant="soft" intent="gray" size="sm">{{ $this::ROLES[$member['role']] }}</x-ui.badge>
                    </x-ui.table.cell>
                    <x-ui.table.cell align="right">
                        <x-ui.button size="sm" variant="ghost" intent="gray" wire:click="edit({{ $member['id'] }})"
                            wire:loading.attr="disabled" wire:target="edit({{ $member['id'] }})" aria-label="Edit {{ $member['name'] }}">
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
                        <x-ui.input id="member-name" wire:model="name" autocomplete="off" :invalid="$errors->has('name')" />
                    </x-ui.field>

                    <x-ui.field label="Email" for="member-email" :error="$errors->first('email')">
                        <x-ui.input id="member-email" type="email" wire:model="email" autocomplete="off" :invalid="$errors->has('email')" />
                    </x-ui.field>

                    <x-ui.listbox wire:model="role" label="Role" :options="$this::ROLES" />
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
