@props([
    'id',
    'class' => '',
    'contentClass' => '',
    'placement' => 'bottom',
    'keepOpen' => false,
    'keppOpenOut' => false,
    'isSubMenu' => false,
    'gray' => false,
])

@php
    $finaPosition = $isSubMenu
        ? (in_array($placement, ['right', 'right-start', 'right-middle', 'right-end'])
            ? $placement
            : 'right-start')
        : $placement;
@endphp

<div x-data x-dropdown wire:ignore.self role="list" id="dropdown-{{ $id }}" data-drop-down
    @if ($keepOpen) data-prevent-close-inside @endif data-placement="{{ $finaPosition }}"
    @if ($keppOpenOut) data-prevent-close-outside @endif
    {{ $attributes->class([
        'opacity-0 invisible translate-y-3 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 text-sm border border-border shadow ui-radius flex flex-col overflow-hidden text-fg ease-linear transition-transform',
        'ui-popper [--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--ui-radius)] z-40',
        'bg-popover' => !$gray,
        'bg-popover-gray' => $gray,
        $class,
    ]) }}>
    <div
        class="dropdown-content rounded-(--dropdown-radius) p-(--dropdown-padding) text-left gap-0.5 {{ $contentClass }}">
        {{ $slot }}
    </div>
</div>
