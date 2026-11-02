<?php

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/*
 * Démo de la doc : envoi Livewire avec progression. Les fichiers sont
 * validés sur le serveur (type réel, taille, nombre) puis jamais gardés :
 * la démo dit seulement ce qu'elle aurait enregistré.
 */
new class extends Component
{
    use WithFileUploads;

    /** @var list<TemporaryUploadedFile> */
    #[Validate(['attachments' => 'array|max:5', 'attachments.*' => 'file|mimes:png,jpg,jpeg,pdf|max:10240'])]
    public array $attachments = [];

    public ?string $saved = null;

    public function updatedAttachments(): void
    {
        $this->saved = null;
        $this->validate();
    }

    public function save(): void
    {
        $this->validate();

        // Une vraie application ferait : $file->store('attachments').
        $this->saved = trans_choice(':count file checked, ready to store.|:count files checked, ready to store.', count($this->attachments));
        $this->reset('attachments');
    }
};
?>

<form wire:submit="save" class="flex w-full max-w-md flex-col gap-4">
    <x-ui.dropzone wire:model="attachments" label="Attachments" multiple accept="image/png,image/jpeg,.pdf" max-size="10MB" :max-files="5"
        hint="PNG, JPG or PDF · up to 10 MB each" />

    <div class="flex items-center justify-between gap-3">
        <span class="text-xs text-muted-foreground" role="status">{{ $saved }}</span>
        <x-ui.button type="submit" size="sm" wire:loading.attr="disabled" wire:target="attachments,save">Save</x-ui.button>
    </div>
</form>
