@props([
    'id',
    'position' => 'right',
    'class' => '',
    'isFloated' => true,
    'staticBackdrop' => '',
    'backdropBlured' => true,
    'scrollableBody' => false,
    'size' => 'md',
    'closable' => true,
])

@php
    $positions = [
        'left' => '-translate-x-full top-0 fx-open:translate-x-0 left-0',
        'right' => 'translate-x-full top-0 fx-open:translate-x-0 justify-end right-0',
        'top' => '-translate-y-full fx-open:translate-y-0 top-0',
        'bottom' => 'translate-y-full fx-open:translate-y-0 bottom-0',
    ];

    $sizes = [
        'sm' => 'fx-slide-x:max-w-72 fx-slide-y:max-h-72',
        'md' => 'fx-slide-x:max-w-96 fx-slide-y:max-h-96',
        'lg' => 'fx-slide-x:max-w-128 fx-slide-y:max-h-128',
        'xl' => 'fx-slide-x:max-w-160 fx-slide-y:max-h-160',
        '2xl' => 'fx-slide-x:max-w-160 fx-slide-y:max-h-160',
        '3xl' => 'fx-slide-x:max-w-[600px] fx-slide-y:max-h-[600px]',
    ];

    $position_axes = [
        'left' => 'x',
        'right' => 'x',
        'top' => 'y',
        'bottom' => 'y',
    ];

    $u_position = $positions[$position] ?? $positions['right'];
    $pos_ax = $position_axes[$position] ?? $position_axes['right'];
    $size_class = $sizes[$size] ?? $sizes['md'];

    $backdrop_blur = $backdropBlured ? 'backdrop-blur-sm' : '';
@endphp

{{-- Le panneau et son overlay sont en position fixed : ils vivent dans <body>, hors
     des parents transformés. C'est Alpine (x-teleport) qui les y place et non Flexilla :
     Livewire suit x-teleport, met à jour le panneau à chaque rendu et relie ses
     wire:click à leur composant. data-fx-teleport-root dit à Flexilla que le panneau
     est déjà en place. wire:ignore.self garde l'état (data-state, aria-hidden) pendant
     un rendu. L'overlay est rendu ici : créé par Flexilla, Livewire le retirerait.
     Le x-data extérieur fait marcher x-teleport hors de Livewire. --}}
<div x-data class="contents">
<template x-teleport="body">
<div data-fx-teleport-root x-fw-layer class="contents">
<div data-slideover-overlay data-sheet="{{ $id }}" data-state="close" wire:ignore.self aria-hidden="true"
    @class(['fixed inset-0 z-60 bg-background/50 hidden fx-open:block', $backdrop_blur])></div>
<div x-data x-offcanvas wire:ignore.self data-slideover
    data-ax="{{ $pos_ax }}" id="{{ $id }}" aria-labelledby="{{ $id }}"
    data-floated="{{ $isFloated ? 'true' : null }}" @if ($staticBackdrop) data-static-backdrop @endif
    @if ($scrollableBody) data-allow-body-scroll @endif
    {{ $attributes->class([
        'fixed w-screen h-dvh ease-linear duration-200 z-110 flex',
        'opacity-0 fx-open:opacity-100',
        'transition-[transform_opacity] duration-300 ease-linear group',
        $size_class,
        $u_position,
        'p-2 *:rounded-lg' => $isFloated,
        $class,
    ]) }}>
    {{ $slot }}

    @if ($closable)
        <x-ui.slideover.close size="sm" iconOnly variant="none" intent="none"
            class="absolute top-4 right-4 hover:bg-muted rounded-full text-foreground">
            <x-ui.icon name="ph--x" class="flex" />
        </x-ui.slideover.close>
    @endif
</div>
</div>
</template>
</div>
