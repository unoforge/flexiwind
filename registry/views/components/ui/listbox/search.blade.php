{{-- Le champ de recherche d'un listbox, en haut du panneau. --}}
@aware(['searchPlaceholder' => 'Search…'])
@props(['placeholder' => null, 'searchPlaceholder' => 'Search…'])

<div class="border-b border-border-input flex relative focus-within:border-title-foreground/40">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor"
        class="size-3.5 absolute top-1/2 -translate-y-1/2 left-3">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>

    <input type="search" wire:key="listbox-search" wire:ignore.self data-select-input autocomplete="off"
        placeholder="{{ $placeholder ?? $searchPlaceholder }}" aria-label="{{ $placeholder ?? $searchPlaceholder }}"
        {{ $attributes->class(['text-sm outline-none focus:outline-none h-9 px-3 ps-10 bg-background text-foreground']) }}>
</div>
