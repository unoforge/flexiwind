@props(['modalId', 'size' => 'sm', 'variant' => 'solid', 'intent' => 'white', 'radius' => 'lg'])

<x-ui.button data-modal-id="{{ $modalId }}" data-modal-trigger aria-haspopup="dialog" :size="$size"
    :variant="$variant" :intent="$intent" :radius="$radius" type="button" {{ $attributes }}>
    {{ $slot }}
</x-ui.button>
