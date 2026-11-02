@props(['size' => 'sm', 'variant' => 'soft', 'intent' => 'gray'])

<x-ui.button wire:ignore data-offcanvas-close
    {{ $attributes->merge([
        'type' => 'button',
        'size' => $size,
        'variant' => $variant,
        'intent' => $intent,
    ]) }}>
    {{ $slot }}
</x-ui.button>
