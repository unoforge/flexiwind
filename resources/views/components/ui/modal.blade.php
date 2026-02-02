@props([
    'modalId',
    'backdropClass' => '',
    'overlayBlured' => true,
    'closable' => true,
    'staticBackdrop' => '',
    'scrollableBody' => false,
])

@php
    $bluredClass = $overlayBlured ? 'backdrop-blur-xs' : '';
    $overlay_class = "fixed inset-0 bg-gray-800/60 {$bluredClass} {$backdropClass}";
@endphp
<dialog x-modal data-modal-id="{{ $modalId }}" wire:ignore.self
    @if ($staticBackdrop) data-modal-prevent @endif
    @if ($scrollableBody) data-allow-body-scroll @endif
    {{ $attributes->class([
        'fixed m-0 max-h-none max-w-none top-0 left-0 w-screen h-screen z-80 hidden fx-open:flex items-center justify-center bg-transparent',
    ]) }}>
    <span data-modal-overlay wire:ignore class="{{ $overlay_class }}"></span>
    {{ $slot }}
</dialog>
