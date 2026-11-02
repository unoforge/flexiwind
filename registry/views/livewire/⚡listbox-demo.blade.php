<?php

use Livewire\Attributes\Validate;
use Livewire\Component;

/*
 * Démo de la doc : le listbox renvoie un vrai tableau à Livewire.
 * La liste des personnes est fixe ; la validation refuse toute valeur
 * qui n'en fait pas partie, comme il se doit pour ce qui vient du navigateur.
 */
new class extends Component
{
    private const PEOPLE = [
        'alice' => 'Alice Johnson',
        'brenda' => 'Brenda Stone',
        'marc' => 'Marc Dupont',
        'sarah' => 'Sarah Chen',
        'tom' => 'Tom Rivera',
    ];

    /** @var list<string> */
    #[Validate(['reviewers' => 'array|max:5', 'reviewers.*' => 'string|in:alice,brenda,marc,sarah,tom'])]
    public array $reviewers = ['alice', 'marc'];

    public function updatedReviewers(): void
    {
        $this->validate();
    }

    public function with(): array
    {
        return [
            'people' => collect(self::PEOPLE)->map(fn (string $name, string $id): array => [
                'id' => $id,
                'name' => $name,
                'photo' => 'https://i.pravatar.cc/80?u='.$id,
            ])->values(),
        ];
    }
};
?>

<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.listbox wire:model.live="reviewers" label="Reviewers" placeholder="Select reviewers" multiple searchable
        :options="$people" option-value="id" option-label="name" option-avatar="photo" />

    <div class="flex flex-col gap-2">
        <span class="text-sm font-medium text-muted-foreground">Livewire receives</span>
        <pre class="overflow-x-auto rounded-ui border border-border bg-muted/50 p-3 font-mono text-[13px] text-foreground">{{ json_encode($reviewers) }}</pre>
    </div>
</div>
