@props([
    'id',
    'class' => '',
    'contentClass' => '',
    'placement' => 'bottom',
    'keepOpen' => false,
    'keepOpenOutside' => false,
    'submenu' => false,
    'gray' => false,
])

@php
    $finaPosition = $submenu
        ? (in_array($placement, ['right', 'right-start', 'right-middle', 'right-end'])
            ? $placement
            : 'right-start')
        : $placement;
@endphp

{{-- Le panneau est en position fixed : il doit vivre dans <body>, hors des parents
     transformés qui le décaleraient. C'est Alpine (x-teleport) qui l'y place et non
     Flexilla : Livewire suit x-teleport, met à jour le panneau à chaque rendu et
     relie ses wire:click à leur composant. data-fx-teleport-root dit à Flexilla que
     le panneau est déjà en place. Le x-data extérieur fait marcher x-teleport hors
     de Livewire. --}}
<div x-data class="contents">
<template x-teleport="body">
<div data-fx-teleport-root x-fw-layer class="contents">
<div x-data x-f-dropdown wire:ignore.self role="list" id="dropdown-{{ $id }}" data-drop-down
    @if ($keepOpen) data-prevent-close-inside @endif data-placement="{{ $finaPosition }}"
    @if ($keepOpenOutside) data-prevent-close-outside @endif
    {{ $attributes->class([
        'text-sm border border-border shadow rounded-ui flex flex-col overflow-hidden text-foreground',
        'ui-popper fx-popper-motion [--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--radius-ui)] z-40',
        'rounded-(--dropdown-radius) p-(--dropdown-padding) ',
        "grid max-h-[inherit] grid-cols-[auto_1fr] gap-y-1 overflow-y-auto overflow-x-hidden overscroll-contain outline-hidden *:[[role='group']+[role=group]]:mt-3",
        'text-left',
        'bg-popover' => !$gray,
        'bg-muted' => $gray,
        $class,
    ]) }}>

    {{ $slot }}
</div>
</div>
</template>
</div>
