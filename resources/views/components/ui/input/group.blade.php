@props([
    'size' => 'md',
    'noBorder' => false,
    'bgNone' => false,
    'radiusNone' => false,
])

@php
    $sizes = [
        'none' => '',
        'sm' => 'h-8',
        'md' => 'h-9',
        'lg' => 'h-10',
        'xl' => 'h-11',
    ];

    $bg_class = ($bgNone ? '' : 'bg-bg') . '';

    $radius = $radiusNone ? '' : 'ui-radius';
    $border_class = $noBorder ? 'border-transparent' : 'border border-border-input';
    $baseClasses = "ui-form-group-base ui-form-group relative flex shadow {$radius} {$bg_class} {$border_class} text-fg";
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    $attributes = $attributes->class([$baseClasses, $sizeClasses])->merge([
       
    ]);
@endphp

<div {{ $attributes }}>
    {{ $slot }}
</div>
