@props([
    'id',
    'class' => '',
    'placement' => 'bottom',
    'keepOpen' => true,
    'keepOpenOutside' => false,
    'gray' => false,
    'trigger' => 'click',
])



<div x-data x-f-popover wire:ignore.self role="tooltip" id="popover-{{ $id }}" data-popover
    data-placement="{{ $placement }}" @if (!$keepOpen) data-close-inside @endif
    @if ($keepOpenOutside) data-prevent-close-outside @endif
    data-trigger-strategy="{{ $trigger }}"
    {{ $attributes->class([
        'opacity-0 invisible z-40 translate-y-3 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 text-sm border border-border shadow rounded-ui flex flex-col overflow-hidden text-fg ease-linear transition-transform',
        'ui-popper ui-card [--card-padding:--spacing(5)] [--card-radius:var(--radius-lg)]',
        'bg-popover' => !$gray,
        'bg-popover-gray' => $gray,
        $class
    ]) }}>
    {{ $slot }}
</div>
