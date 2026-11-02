<?php

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

/*
 * Cookbook — assigner des personnes avec une recherche serveur.
 *
 * `query` reçoit ce qui est tapé ; le serveur renvoie au plus six personnes.
 * Celles déjà choisies passent par `selected-options`, pour que leurs puces
 * gardent un nom. La saisie est bornée et comparée comme du texte.
 */
new class extends Component
{
    private const PEOPLE = [
        'amara' => ['Amara Diallo', 'Design'],
        'brenda' => ['Brenda Stone', 'Design'],
        'carlos' => ['Carlos Mendes', 'Engineering'],
        'diane' => ['Diane Kabila', 'Engineering'],
        'elias' => ['Elias Novak', 'Engineering'],
        'fatou' => ['Fatou Ndiaye', 'Product'],
        'grace' => ['Grace Mutombo', 'Product'],
        'hiro' => ['Hiro Tanaka', 'Engineering'],
        'joanna' => ['Joanna Lee', 'Marketing'],
        'jonas' => ['Jonas Weber', 'Sales'],
    ];

    public string $query = '';

    /** @var list<string> */
    public array $reviewers = ['diane'];

    public function updatedQuery(): void
    {
        $this->query = Str::limit(trim($this->query), 80, '');
    }

    public function save(): void
    {
        $this->validate([
            'reviewers' => ['required', 'array', 'max:5'],
            'reviewers.*' => ['string', 'distinct', Rule::in(array_keys(self::PEOPLE))],
        ], [
            'reviewers.required' => 'Assign at least one reviewer.',
            'reviewers.max' => 'Five reviewers at most.',
        ]);

        $names = collect($this->reviewers)->map(fn (string $id): string => self::PEOPLE[$id][0])->join(', ', ' and ');

        $this->dispatch('toast', type: 'success', message: 'Reviewers assigned', description: $names);
    }

    public function with(): array
    {
        $query = Str::lower($this->query);

        $results = $query === '' ? [] : collect(self::PEOPLE)
            ->filter(fn (array $person): bool => str_contains(Str::lower($person[0].' '.$person[1]), $query))
            ->take(6)
            ->keys()
            ->all();

        $person = fn (string $id): array => [
            'id' => $id,
            'name' => self::PEOPLE[$id][0],
            'team' => self::PEOPLE[$id][1],
            'photo' => 'https://i.pravatar.cc/80?u=cookbook-'.$id,
        ];

        return [
            'results' => array_map($person, $results),
            // Ceux déjà choisis : leurs puces gardent leur nom, hors des résultats.
            'assigned' => array_map($person, array_values(array_intersect($this->reviewers, array_keys(self::PEOPLE)))),
        ];
    }
};
?>

<form wire:submit="save" class="flex w-full max-w-md flex-col gap-4">
    <x-ui.autocomplete wire:model="reviewers" search="query" multiple label="Reviewers" placeholder="Search by name or team"
        :options="$results" :selected-options="$assigned" option-value="id" option-label="name" option-description="team" option-avatar="photo" />
    @error('reviewers') <p class="text-xs text-destructive">{{ $message }}</p> @enderror

    <div>
        <x-ui.button type="submit" wire:loading.attr="disabled" wire:target="save">Assign</x-ui.button>
    </div>
</form>
