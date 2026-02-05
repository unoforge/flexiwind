@props(['size' => 'md', 'outlined' => false, 'class' => ''])

@php
    $switch_sizes = [
        'xs' => 'switch-xs',
        'sm' => 'switch-sm',
        'md' => 'switch-md',
        'lg' => 'switch-lg',
    ];
    $swith_outline_sizes = [
        'xs' => 'switch-outline-xs',
        'sm' => 'switch-outline-sm',
        'md' => 'switch-outline-md',
        'lg' => 'switch-outline-lg',
    ];

    $className = '';
    if ($outlined) {
        $size = $swith_outline_sizes[$size] ?? $swith_outline_sizes['md'];
        $className .= "switch-outline {$size} border border-border-strong shadow";
    } else {
        $size = $switch_sizes[$size] ?? $switch_sizes['md'];
        $className .= "switch {$size}";
    }

    $className .= " {{ $class }}";

    $attributes = $attributes->merge([
        'class' => $className,
        'type' => 'checkbox',
    ]);
@endphp

<input {{ $attributes }} />
