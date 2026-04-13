@props(['modalId', 'size' => 'sm', 'variant' => 'solid', 'intent' => 'primary', 'iconOnly'=>false])

<x-ui.button data-modal-id="{{ $modalId }}" data-modal-trigger aria-haspopup="dialog" :size="$size"
    :variant="$variant" :intent="$intent" :icon-only="$iconOnly" type="button" {{ $attributes }}>
    {{ $slot }}
</x-ui.button>
