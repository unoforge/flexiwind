{{-- Le champ de recherche d'un listbox, en haut du panneau. --}}
@aware(['searchPlaceholder' => 'Search…'])
@props(['placeholder' => null, 'searchPlaceholder' => 'Search…'])

<input type="search" wire:key="listbox-search" wire:ignore.self data-select-input autocomplete="off"
    placeholder="{{ $placeholder ?? $searchPlaceholder }}" aria-label="{{ $placeholder ?? $searchPlaceholder }}"
    {{ $attributes->class([
        'ui-form-base ui-form-input ui-form-input-sm shrink-0 rounded-[calc(var(--dropdown-radius)-var(--dropdown-padding))] border border-border-input bg-background text-foreground',
    ]) }}>
