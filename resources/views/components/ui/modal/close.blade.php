@props(['size' => 'sm', 'variant' => 'solid', 'intent' => 'white'])

<x-ui.button wire:ignore data-close-modal
    {{ $attributes->merge([
        'type' => 'button',
        'size' => $size,
        'variant' => $variant,
        'intent' => $intent,
    ]) }}>
    {{ $slot }}
</x-ui.button>
