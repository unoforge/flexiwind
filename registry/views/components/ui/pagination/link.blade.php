@props([
    'isActive' => false,
    'size' => 'sm',
    'isIconOnly' => false,
    'href' => '#',
    'variant' => null,
])

@php
    $sizes = [
        'xs' => 'btn-xs',
        'sm' => 'btn-sm',
        'md' => 'btn-md',
        'lg' => 'btn-lg',
        'xl' => 'btn-xl',
    ];
    $iconSizes = [
        'xs' => 'btn-icon-xs text-xs',
        'sm' => 'btn-icon-sm text-xs',
        'md' => 'btn-icon-md text-sm',
        'lg' => 'btn-icon-lg text-sm',
        'xl' => 'btn-icon-xl text-base',
    ];
    
    $sizeMap = $isIconOnly ? $iconSizes : $sizes;
    $sizeClasses = isset($sizeMap[$size]) ? $sizeMap[$size] : $sizeMap['md'];
@endphp

<a 
    href="{{ $href }}"
    {{ $attributes->merge([
        'aria-current' => $isActive ? 'page' : null,
        'data-slot' => 'pagination-link',
        'data-active' => $isActive ? 'true' : null,
    ])->class([
        'btn rounded-ui',
        $sizeClasses,
        'btn-pagination-link btn-pagination-link-variables data-active:btn-pagination-active'
    ]) }}
>
    {{ $slot }}
</a>
