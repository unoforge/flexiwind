<?php

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

/*
 * Cookbook — supprimer avec confirmation, puis annuler depuis le toast.
 *
 * La démo garde ses fichiers dans le composant et marque la suppression
 * (`deleted`), comme le ferait SoftDeletes. L'id à restaurer vient du
 * navigateur : il est revérifié, et seul un fichier supprimé peut revenir.
 */
new class extends Component
{
    /** @var list<array{id: int, name: string, size: string, deleted: bool}> */
    #[Locked]
    public array $files = [
        ['id' => 1, 'name' => 'Q3-report.pdf', 'size' => '2.4 MB', 'deleted' => false],
        ['id' => 2, 'name' => 'brand-guidelines.fig', 'size' => '18 MB', 'deleted' => false],
        ['id' => 3, 'name' => 'customers-export.csv', 'size' => '640 KB', 'deleted' => false],
        ['id' => 4, 'name' => 'roadmap-2027.md', 'size' => '12 KB', 'deleted' => false],
    ];

    /** Le fichier dont on demande la suppression : jamais choisi par le navigateur. */
    #[Locked]
    public ?int $deletingId = null;

    public function confirmDelete(int $id): void
    {
        $this->deletingId = $this->file($id, deleted: false)['id'];

        $this->dispatch('modal:delete-file:open');
    }

    public function delete(): void
    {
        $file = $this->file($this->deletingId, deleted: false);

        $this->mark($file['id'], deleted: true);
        $this->deletingId = null;

        $this->dispatch('modal:delete-file:close');
        $this->dispatch('toast',
            message: "{$file['name']} deleted",
            action: ['label' => 'Undo', 'event' => 'cookbook-file-restore', 'params' => ['id' => $file['id']]],
            duration: 6000,
        );
    }

    #[On('cookbook-file-restore')]
    public function restore(int $id): void
    {
        $file = $this->file($id, deleted: true);

        $this->mark($file['id'], deleted: false);

        $this->dispatch('toast', type: 'success', message: "{$file['name']} restored");
    }

    public function with(): array
    {
        return [
            'visible' => array_values(array_filter($this->files, fn (array $file): bool => ! $file['deleted'])),
            'pending' => collect($this->files)->firstWhere('id', $this->deletingId),
        ];
    }

    /** @return array{id: int, name: string, size: string, deleted: bool} */
    private function file(?int $id, bool $deleted): array
    {
        $file = collect($this->files)->first(fn (array $file): bool => $file['id'] === $id && $file['deleted'] === $deleted);

        abort_if($file === null, 404);

        return $file;
    }

    private function mark(int $id, bool $deleted): void
    {
        $this->files = array_map(
            fn (array $file): array => $file['id'] === $id ? [...$file, 'deleted' => $deleted] : $file,
            $this->files,
        );
    }
};
?>

<div class="w-full max-w-xl">
    <ul class="divide-y divide-border rounded-ui border border-border bg-background">
        @forelse ($visible as $file)
            <li wire:key="file-{{ $file['id'] }}" class="flex items-center gap-3 px-4 py-3">
                <span aria-hidden="true" class="flex size-9 items-center justify-center rounded-ui bg-muted text-muted-foreground">
                    <span class="iconify ph--file-text size-4.5"></span>
                </span>
                <span class="flex min-w-0 flex-1 flex-col">
                    <span class="truncate text-sm font-medium text-title-foreground">{{ $file['name'] }}</span>
                    <span class="text-xs text-muted-foreground">{{ $file['size'] }}</span>
                </span>
                <x-ui.button size="sm" variant="ghost" intent="gray" wire:click="confirmDelete({{ $file['id'] }})" aria-label="Delete {{ $file['name'] }}">
                    <span aria-hidden="true" class="iconify ph--trash size-4"></span>
                </x-ui.button>
            </li>
        @empty
            <li class="px-4 py-8 text-center text-sm text-muted-foreground">No files left. Undo is still in the toast.</li>
        @endforelse
    </ul>

    <x-ui.modal id="delete-file">
        <x-ui.modal.content size="sm" :closable="false" class="flex flex-col items-center gap-y-3 p-(--gutter) text-center">
            <span aria-hidden="true" class="flex rounded-full bg-destructive/10 p-3 text-destructive">
                <span class="iconify ph--trash size-5"></span>
            </span>
            <x-ui.modal.title>Delete {{ $pending['name'] ?? 'this file' }}?</x-ui.modal.title>
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
