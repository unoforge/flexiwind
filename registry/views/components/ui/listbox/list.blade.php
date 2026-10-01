{{--
    La liste des options : une grille dont chaque option est une sous-grille,
    comme le dropdown, pour que coches et libellés s'alignent.

    Avec une recherche Livewire (`search` sur l'autocomplete), les options
    sont aussi écrites dans un bloc caché que Livewire met à jour : le plugin
    les recopie ici, où Flexilla travaille à l'abri des re-rendus.
--}}
@aware(['search' => null])
@props(['search' => null])

<div wire:key="listbox-list" data-listbox-list wire:ignore x-show="!hint"
    @if ($search) wire:loading.class="opacity-55" wire:target="{{ $search }}" @endif
    {{ $attributes->class([
        'grid max-h-72 min-h-0 grid-cols-[auto_1fr] gap-y-1 overflow-y-auto overscroll-contain transition-opacity',
        '*:[[role=group]+[role=group]]:mt-3',
    ]) }}>
    {{-- Flexilla veut au moins une option : celle-ci ne s'affiche jamais. --}}
    <div data-select-item="__fw-none" data-disabled aria-hidden="true" class="hidden!"></div>
    {{ $slot }}
</div>

@if ($search)
    <div hidden data-autocomplete-source>{{ $slot }}</div>
@endif
