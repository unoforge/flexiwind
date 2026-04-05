@props(['name', 'size' => 'sm', 'intent' => 'fg', 'class' => ''])

@php
    $sizeClasses = [
        'xs' => 'size-3',
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6.5',
        'xl' => 'size-7.5',
        '2xl' => 'size-9',
    ];

    $sizeClass = $size ? $sizeClasses[$size] ?? $sizeClasses['md'] : '';

    $intentClasses = [
        'fg' => 'text-fg',
        'muted' => 'text-fg-muted',
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
    ];

    $intentClass = $intent ? $intentClasses[$intent] ?? '' : '';
@endphp

<span slot="icon" data-slot="icon" {{ $attributes->class(['flex iconify', $name, $sizeClass, $intentClass, $class]) }}></span>
