@props(['blured' => true, 'appearance' => 'default'])

<div data-sidebar-overlay
    {{ $attributes->class([
        'fixed inset-0',
        'backdrop-blur-sm' => $blured && $appearance === 'default',
        'hidden fx-open:flex lg:fx-open:hidden z-40 bg-gray-800/40 hidden fx-open:flex lg:fx-open:hidden' =>
            $appearance === 'default',
    ]) }}>
</div>
