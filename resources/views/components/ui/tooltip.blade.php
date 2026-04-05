@props([
    'id',
    'class' => '',
    'placement' => 'bottom',
    'bg' => 'default',
    'trigger' => 'hover',
    'content' => null,
])



<div x-data x-f-tooltip wire:ignore.self role="tooltip" id="tooltip-{{ $id }}" data-app-tooltip
    data-placement="{{ $placement }}" data-trigger-strategy="{{ $trigger }}"
    {{ $attributes->class([
        'opacity-0 invisible z-40 translate-y-3 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 text-sm overflow-hidden ease-linear transition-transform',
        'ui-popper rounded-ui py-1 px-2',
        'bg-popover border border-border shadow text-fg' => $bg == 'default',
        'bg-popover-gray text-fg' => $bg == 'gray',
        'bg-fg-title text-bg' => $bg == 'neutral',
        'bg-gray-950 text-white' => $bg == 'dark',
        $class,
    ]) }}>
    @if (isset($content))
        {{ $content }}
    @else
        {{ $slot }}
    @endif
</div>
