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

<div x-data x-f-dropdown wire:ignore.self role="list" id="dropdown-{{ $id }}" data-drop-down
    @if ($keepOpen) data-prevent-close-inside @endif data-placement="{{ $finaPosition }}"
    @if ($keepOpenOutside) data-prevent-close-outside @endif
    {{ $attributes->class([
        'opacity-0 invisible translate-y-3 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 text-sm border border-border shadow rounded-ui flex flex-col overflow-hidden text-fg ease-linear transition-transform',
        'ui-popper [--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--radius-ui)] z-40',
        'rounded-(--dropdown-radius) p-(--dropdown-padding) ',
        "grid max-h-[inherit] grid-cols-[auto_1fr] gap-y-1 overflow-y-auto overflow-x-hidden overscroll-contain outline-hidden *:[[role='group']+[role=group]]:mt-3",
        'text-left',
        'bg-popover' => !$gray,
        'bg-popover-gray' => $gray,
        $class,
    ]) }}>

    {{ $slot }}
</div>
