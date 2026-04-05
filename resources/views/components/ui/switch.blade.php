@props(['size' => 'md', 'outlined' => false, 'class' => ''])

@php
    $switch_sizes = [
        'xs' => 'switch-xs',
        'sm' => 'switch-sm',
        'md' => 'switch-md',
        'lg' => 'switch-lg',
    ];

    $switch_base_sizes = [
        'xs' => 'switch-base-xs',
        'sm' => 'switch-base-sm',
        'md' => 'switch-base-md',
        'lg' => 'switch-base-lg',
    ];

    $size_base = $switch_base_sizes[$size]?? $switch_base_sizes['md'];
     $size = $switch_sizes[$size] ?? $switch_sizes['md'];
    $className = "switch switch-base switch-size switch-knob switch-checked switch-base-ring {$size_base} {$size} ";
    if ($outlined) {
        $className .= "ring ring-border-strong shadow";
    } 

    $className .= " {{ $class }}";

    $attributes = $attributes->merge([
        'class' => $className,
        'type' => 'checkbox',
    ]);
@endphp

<input {{ $attributes }} />
