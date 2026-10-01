{{--
    Le champ d'un autocomplete : l'input, déclencheur et recherche à la fois.
    Avec une recherche Livewire, une roue tourne pendant la requête.
--}}
@aware(['size' => 'md', 'disabled' => false, 'search' => null, 'placeholder' => 'Type to filter'])
@props(['clearable' => true, 'clearLabel' => 'Clear', 'size' => 'md', 'disabled' => false, 'search' => null, 'placeholder' => 'Type to filter'])

@php
    $sizes = ['sm' => 'ui-form-input-sm', 'md' => 'ui-form-input-md', 'lg' => 'ui-form-input-lg'];
@endphp

<div class="relative">
    <input type="text" wire:key="autocomplete-input" wire:ignore.self data-select-input autocomplete="off" placeholder="{{ $placeholder }}"
        @if ($disabled) disabled @endif
        {{ $attributes->class([
            'ui-form-base ui-form-input rounded-ui border border-border-input bg-background text-foreground',
            'pe-9' => $clearable || $search,
            $sizes[$size] ?? $sizes['md'],
            'aria-expanded:border-primary/70 aria-expanded:ring-(--focus-ring)',
            'group-data-invalid/listbox:border-(--ui-input-invalid-outline) group-data-invalid/listbox:ring-(--ui-input-invalid-outline)/20',
            'disabled:bg-muted disabled:opacity-50',
        ]) }}>
    @if ($search)
        <span wire:loading.flex wire:target="{{ $search }}" aria-hidden="true"
            class="pointer-events-none absolute inset-y-0 end-2.5 hidden items-center text-muted-foreground">
            <span class="iconify ph--circle-notch-bold size-4 animate-spin"></span>
        </span>
    @endif
    @if ($clearable)
        <button type="button" wire:ignore x-cloak x-show="canClear" x-on:click="clearInput()" aria-label="{{ $clearLabel }}"
            @if ($search) wire:loading.remove wire:target="{{ $search }}" @endif
            class="absolute end-1.5 top-1/2 flex size-6 -translate-y-1/2 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline)">
            <span aria-hidden="true" class="iconify ph--x size-3.5"></span>
        </button>
    @endif
</div>
