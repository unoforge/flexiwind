@props([
    'class' => 'text-fg-muted',
    'wrapper' => '',
    'spacing' => '3.5',
])
@php
    $spacings = [
        'none' => '',
        '0' => 'gap-0',
        '0.5' => 'gap-0.5',
        '1' => 'gap-1',
        '1.5' => 'gap-1.5',
        '2' => 'gap-2',
        '3' => 'gap-3',
    ];
    $spacing_ = $spacings[$spacing] ?? $spacings['1.5'];
@endphp
<nav aria-label="Breadcrumbs" class="{{ $wrapper }}">
    <ol {{ $attributes->class(['flex items-center', $spacing_, $class]) }}>
        {{ $slot }}
    </ol>
</nav>
