@props([
    'id',
    'class' => '',
    'placement' => 'bottom',
    'keepOpen' => true,
    'keepOpenOutside' => false,
    'gray' => false,
    'trigger' => 'click',
])



{{-- Le panneau est en position fixed : il doit vivre dans <body>, hors des parents
     transformés qui le décaleraient. C'est Alpine (x-teleport) qui l'y place et non
     Flexilla : Livewire suit x-teleport, met à jour le panneau à chaque rendu et
     relie ses wire:click à leur composant. data-fx-teleport-root dit à Flexilla que
     le panneau est déjà en place. Le x-data extérieur fait marcher x-teleport hors
     de Livewire. --}}
<div x-data class="contents">
<template x-teleport="body">
<div data-fx-teleport-root x-fw-layer class="contents">
<div x-data x-f-popover wire:ignore.self role="tooltip" id="popover-{{ $id }}" data-popover
    data-placement="{{ $placement }}" @if (!$keepOpen) data-close-inside @endif
    @if ($keepOpenOutside) data-prevent-close-outside @endif
    data-trigger-strategy="{{ $trigger }}"
    {{ $attributes->class([
        'text-sm border border-border shadow rounded-ui flex flex-col overflow-hidden text-foreground',
        'ui-popper fx-popper-motion ui-card [--card-padding:--spacing(5)] [--card-radius:var(--radius-lg)]',
        'bg-popover' => !$gray,
        'bg-muted' => $gray,
        $class
    ]) }}>
    {{ $slot }}
</div>
</div>
</template>
</div>
