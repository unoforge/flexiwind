@props(['slideOverId', 'size' => 'sm', 'variant' => 'ghost', 'intent' => 'gray', 'iconOnly'=>false])

<x-ui.button :icon-only="$iconOnly" data-offcanvas-trigger data-target="{{ $slideOverId }}" aria-haspopup="dialog"
    {{ $attributes->merge([
        'type' => 'button',
        'size' => $size,
        'variant' => $variant,
        'intent' => $intent,
    ]) }}>
    {{ $slot }}
</x-ui.button>

