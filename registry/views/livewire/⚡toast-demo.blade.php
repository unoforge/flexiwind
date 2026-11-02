<?php

use Livewire\Component;

/*
 * Démo de la doc : un toast envoyé par Livewire, puis un toast laissé en
 * session avant une redirection. Rien de ce que la page envoie n'entre
 * dans le message : il est écrit ici.
 */
new class extends Component
{
    public function save(): void
    {
        $this->dispatch('toast', type: 'success', message: 'Profile saved', description: 'Your changes are live.');
    }

    public function archive(): void
    {
        $this->dispatch('toast',
            type: 'message',
            message: 'Project archived',
            action: ['label' => 'Undo', 'event' => 'project-restored'],
        );
    }

    #[\Livewire\Attributes\On('project-restored')]
    public function restore(): void
    {
        $this->dispatch('toast', type: 'info', message: 'Project restored');
    }

    public function saveAndRedirect(): void
    {
        session()->flash('toast', ['type' => 'success', 'message' => 'Invoice sent', 'description' => 'Shown after the redirect.']);

        $this->redirect(url()->previous(), navigate: false);
    }
};
?>

<div class="flex flex-wrap items-center justify-center gap-2">
    <x-ui.button variant="outline" intent="gray" size="sm" wire:click="save">Dispatch from Livewire</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" wire:click="archive">With a Livewire action</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" wire:click="saveAndRedirect">After a redirect</x-ui.button>
</div>
