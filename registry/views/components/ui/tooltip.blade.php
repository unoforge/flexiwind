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
        'text-sm overflow-hidden',
        'ui-popper fx-popper-motion rounded-ui py-1 px-2',
        'bg-popover border border-border shadow text-foreground' => $bg == 'default',
        'bg-muted text-foreground' => $bg == 'gray',
        'bg-title-foreground text-background' => $bg == 'neutral',
        'bg-gray-950 text-white' => $bg == 'dark',
        $class,
    ]) }}>
    @if (isset($content))
        {{ $content }}
    @else
        {{ $slot }}
    @endif
</div>
