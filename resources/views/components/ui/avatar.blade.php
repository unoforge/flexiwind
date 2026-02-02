@props(['size' => 'default', 'radius' => 'circle'])

@php
    $sizes = [
        'default' => 'avatar-md',
        'xs' => 'avatar-xs',
        'sm' => 'avatar-sm',
        'md' => 'avatar-md',
        'lg' => 'avatar-lg',
        'xl' => 'avatar-xl',
    ];

    $radii = [
        'none' => '',
        'md' => 'rounded-md',
        'xl' => 'rounded-xl',
        'circle' => 'rounded-full',
    ];
@endphp

<img 
    {{ $attributes->class([
        $sizes[$size] ?? $sizes['default'],
        'object-cover',
        $radii[$radius] ?? $radii['circle'],
    ]) }}
>
