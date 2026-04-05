@props(['size' => 'md', 'class' => '', 'radius' => true])

@php
    $progress_sizes = [
        '2xs' => 'h-0.5',
        'xs' => 'h-1',
        'sm' => 'h-1.5',
        'md' => 'h-2',
        'lg' => 'h-3',
        'xl' => 'h-6',
    ];
    $size = $progress_sizes[$size] ?? $progress_sizes['md'];
    $radiusClass = $radius ? '[--ui-progressbar-radius:20px]' : '';
    $className = "ui-progressbar {$radiusClass} {$size} [--ui-progressbar-bg:var(--c-progressbar)] {$class}";
@endphp

<progress {{ $attributes->merge(['class' => $className]) }}></progress>
