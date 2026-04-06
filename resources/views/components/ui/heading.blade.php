@props([
    'level' => '1',
    'intent' => 'title',
    'class' => '',
])

@php
    $tag = match ($level) {
        '1' => 'h1',
        '2' => 'h2',
        '3' => 'h3',
        '4' => 'h4',
        '5' => 'h5',
        default => 'h1',
    };

    $sizeClasses = match ($level) {
        '1' => 'text-3xl font-bold tracking-tight',
        '2' => 'text-2xl font-semibold tracking-tight',
        '3' => 'text-xl font-semibold',
        '4' => 'text-lg font-medium',
        '5' => 'text-base font-medium',
        default => 'text-3xl font-bold tracking-tight',
    };
@endphp

<{{ $tag }} {{ $attributes->class([
    $sizeClasses,
    'text-fg-title' => $intent == 'title',
    'text-fg' => $intent == 'body',
    'text-fg-muted' => $intent == 'muted',
    'text-primary' => $intent == 'primary',
    'text-secondary' => $intent == 'secondary',
    'text-danger' => $intent == 'danger',
    'text-warning' => $intent == 'warning',
    $class,
]) }}>
    {{ $slot }}
</{{ $tag }}>
