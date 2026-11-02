<?php

use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

/*
 * Cookbook — deux listes liées : le pays, puis une ville de ce pays.
 *
 * La liste des villes change avec le pays ; le listbox des villes porte un
 * wire:key qui en dépend, pour être reconstruit. La validation refuse une
 * ville qui n'appartient pas au pays choisi, quoi que le navigateur envoie.
 */
new class extends Component
{
    private const CITIES = [
        'cd' => ['kinshasa' => 'Kinshasa', 'lubumbashi' => 'Lubumbashi', 'goma' => 'Goma', 'kisangani' => 'Kisangani'],
        'fr' => ['paris' => 'Paris', 'lyon' => 'Lyon', 'marseille' => 'Marseille', 'lille' => 'Lille'],
        'ca' => ['montreal' => 'Montréal', 'toronto' => 'Toronto', 'vancouver' => 'Vancouver'],
        'jp' => ['tokyo' => 'Tokyo', 'osaka' => 'Osaka', 'kyoto' => 'Kyoto'],
    ];

    private const COUNTRIES = ['cd' => 'DR Congo', 'fr' => 'France', 'ca' => 'Canada', 'jp' => 'Japan'];

    public string $country = '';

    public string $city = '';

    /** Une ville choisie pour l'ancien pays n'a plus de sens. */
    public function updatedCountry(): void
    {
        $this->reset('city');
        $this->resetValidation('city');
    }

    /** @return array<string, string> */
    #[Computed]
    public function cities(): array
    {
        return self::CITIES[$this->country] ?? [];
    }

    public function save(): void
    {
        $this->validate([
            'country' => ['required', Rule::in(array_keys(self::COUNTRIES))],
            'city' => ['required', Rule::in(array_keys($this->cities))],
        ], [
            'city.in' => 'Pick a city in the selected country.',
        ]);

        $this->dispatch('toast', type: 'success', message: 'Address saved', description: self::CITIES[$this->country][$this->city].', '.self::COUNTRIES[$this->country]);
    }

    public function with(): array
    {
        return ['countries' => self::COUNTRIES];
    }
};
?>

<form wire:submit="save" class="grid w-full max-w-lg gap-5 sm:grid-cols-2">
    <div class="flex flex-col gap-2">
        <x-ui.listbox wire:model.live="country" label="Country" placeholder="Select a country" searchable :options="$countries" />
        @error('country') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
    </div>

    <div class="flex flex-col gap-2">
        <x-ui.listbox wire:model="city" wire:key="cities-{{ $country ?: 'none' }}" label="City"
            :placeholder="$country ? 'Select a city' : 'Pick a country first'" :disabled="! $country" :options="$this->cities" />
        @error('city') <p class="text-xs text-destructive">{{ $message }}</p> @enderror
    </div>

    <div class="sm:col-span-2">
        <x-ui.button type="submit" wire:loading.attr="disabled" wire:target="save">Save address</x-ui.button>
    </div>
</form>
