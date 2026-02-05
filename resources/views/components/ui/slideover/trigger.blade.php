@props(['slideOverId', 'size' => 'sm', 'variant' => 'solid', 'intent' => 'white'])

<x-ui.button data-offcanvas-trigger data-target="{{ $slideOverId }}" aria-haspopup="dialog"
    {{ $attributes->merge([
        'type' => 'button',
        'size' => $size,
        'variant' => $variant,
        'intent' => $intent,
    ]) }}>
    {{ $slot }}
</x-ui.button>

