@props([
    'id',
    'class' => '',
    'placement' => 'bottom',
    'keepOpen' => true,
    'keppOpenOut' => false,
    'gray' => false,
    'triggerOnHover' => false,
])



<div x-data x-popover wire:ignore.self role="tooltip" id="popover-{{ $id }}" data-popover
    data-placement="{{ $placement }}" @if (!$keepOpen) data-close-inside @endif
    @if ($keppOpenOut) data-prevent-close-outside @endif
    data-trigger-strategy="{{ $triggerOnHover ? 'hover' : 'click' }}"
    {{ $attributes->class([
        'opacity-0 invisible z-40 translate-y-3 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 text-sm border border-border shadow ui-radius flex flex-col overflow-hidden text-fg ease-linear transition-transform',
        'ui-popper ui-card [--card-padding:--spacing(5)] [--card-radius:var(--radius-lg)]',
        'bg-popover' => !$gray,
        'bg-popover-gray' => $gray,
        $class
    ]) }}>
    {{ $slot }}
</div>
