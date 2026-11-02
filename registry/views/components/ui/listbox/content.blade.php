{{--
    Le panneau : celui du dropdown. wire:key le garde d'un rendu Livewire à
    l'autre même quand Flexilla lui donne un id. Mettez-y une recherche, une liste
    d'options, un état vide, ou ce que vous voulez.

    En position fixed, il vit dans <body> (dans le dialog d'un modal : x-fw-layer),
    placé par Alpine (x-teleport) que Livewire suit d'un rendu à l'autre.
    data-fx-teleport-root dit à Flexilla qu'il est déjà en place.
--}}
@aware(['placement' => 'bottom-start'])
@props(['placement' => 'bottom-start'])

<template x-teleport="body" data-listbox-panel>
<div data-fx-teleport-root x-fw-layer class="contents">
<div wire:key="listbox-content" wire:ignore.self data-select-content data-placement="{{ $placement }}"
    {{ $attributes->class([
        'ui-popper fx-popper-motion z-70 flex min-w-(--select-min-width,var(--trigger-width)) max-w-[calc(100vw-2rem)] flex-col gap-1',
        'rounded-(--dropdown-radius) border border-foreground/10 bg-background p-(--dropdown-padding) text-muted-foreground shadow-xs outline-hidden',
        '[--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--radius-ui)] forced-colors:bg-[Canvas]',
    ]) }}>
    {{-- Autocomplete : tant que la saisie est trop courte, ce message remplace les options. --}}
    <p x-cloak x-show="hint" x-text="hint" class="px-3 py-1.5 text-sm/6 text-muted-foreground"></p>
    {{ $slot }}
</div>
</div>
</template>
