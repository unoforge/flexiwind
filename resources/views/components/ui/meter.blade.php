@props(['size' => 'md', 'class' => '', 'noRadius' => false])

@php
    $meter_sizes = [
        '2xs' => 'h-0.5',
        'xs' => 'h-1',
        'sm' => 'h-1.5',
        'md' => 'h-2',
        'lg' => 'h-3',
        'xl' => 'h-6',
    ];
    $size = $meter_sizes[$size] ?? $meter_sizes['md'];
    $radius = $noRadius ? '' : '[--ui-meter-radius:20px]';
    $className = "ui-meter {$radius} {$size} bg-bg-muted {$class}";
@endphp
<meter {{ $attributes->merge(['class' => $className]) }}></meter>
