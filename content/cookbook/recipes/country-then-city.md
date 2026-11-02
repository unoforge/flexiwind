---
title: "Country, then city"
group: "Recipes"
order: 30
tier: "pro"
state: "new"
description: "Two linked listboxes: the second one lists only what fits the first, and the server refuses anything else."
seoDescription: "Dependent dropdowns in Livewire with Flexiwind listbox: country and city, reset on change, validated on the server."
keywords: "dependent dropdown livewire, chained select, country city select, cascading select laravel"
---

## The result

Pick a country: the city list fills with its cities and resets. Change the country again: the city you picked is cleared.

:::raw
<x-docs.preview-ui>
    <livewire:cookbook-country-city />
</x-docs.preview-ui>
:::

## The component

The demo keeps its countries and cities in constants; with a database, swap them for queries.

```blade title="resources/views/components/⚡shipping-address.blade.php"
<?php

use App\Models\City;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public string $country = '';

    public string $city = '';

    public function updatedCountry(): void
    {
        // A city picked for the previous country makes no sense anymore.
        $this->reset('city');
        $this->resetValidation('city');
    }

    #[Computed]
    public function countries()
    {
        return Country::query()->orderBy('name')->pluck('name', 'code');
    }

    #[Computed]
    public function cities()
    {
        return City::query()->where('country_code', $this->country)->orderBy('name')->pluck('name', 'id');
    }

    public function save(): void
    {
        $validated = $this->validate([
            'country' => ['required', Rule::exists('countries', 'code')],
            'city' => ['required', Rule::exists('cities', 'id')->where('country_code', $this->country)],
        ]);

        auth()->user()->address()->update([
            'country_code' => $validated['country'],
            'city_id' => $validated['city'],
        ]);

        $this->dispatch('toast', type: 'success', message: 'Address saved');
    }
};
?>

<form wire:submit="save" class="grid gap-5 sm:grid-cols-2">
    <x-ui.listbox wire:model.live="country" label="Country" placeholder="Select a country"
        searchable :options="$this->countries" />

    <x-ui.listbox wire:model="city" wire:key="cities-{{ $country ?: 'none' }}" label="City"
        :placeholder="$country ? 'Select a city' : 'Pick a country first'"
        :disabled="! $country" :options="$this->cities" />

    <x-ui.button type="submit" class="sm:col-span-2">Save address</x-ui.button>
</form>
```

`pluck('name', 'id')` gives `[id => name]`: the listbox reads it as `value => label`.

## How it works

1. `wire:model.live` on the country sends each change right away, so the server can compute the cities.
2. The city listbox has a `wire:key` built from the country. When the country changes, the key changes, and Livewire replaces the listbox with a fresh one holding the new options. Without the key, the listbox would keep the old list: it keeps its panel out of Livewire's updates.
3. `updatedCountry()` clears the city. The new listbox starts empty, and the old value cannot be saved by mistake.
4. The city field stays `wire:model` (not `.live`): nothing depends on it before saving, so it sends nothing until then.

## Security

- The browser can send any city id with any country. The rule `Rule::exists('cities', 'id')->where('country_code', $this->country)` checks that the pair exists, not only the city.
- `Rule::exists` and `where()` bind their values: nothing typed reaches the SQL as text.

## Variations

- **Three levels** (country, region, city): repeat the pattern, and reset both lower levels in `updatedCountry()`.
- **Long lists**: switch the city to an [autocomplete with a server search](/cookbook/recipes/assign-with-search) and add `where('country_code', …)` to the query.
- **Preselected values** when editing: fill `$country` and `$city` in `mount()`; the city listbox opens on the right list from the first render.
