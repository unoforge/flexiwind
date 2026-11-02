@props(['tooltipId', 'variant' => 'none', 'intent' => 'none', 'size' => 'none', 'radius' => 'lg'])

<x-ui.button data-tooltip-trigger data-tooltip-id="tooltip-{{ $tooltipId }}" :size="$size" :radius="$radius"
    :variant="$variant" :intent="$intent" {{ $attributes }}>
    {{ $slot }}
</x-ui.button>