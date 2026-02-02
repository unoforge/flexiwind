@props(['level' => '2', 'text' => null, 'size' => 'lg', 'class' => '', 'weight' => 'semibold'])
@php
    $levels = [
        '1' => 'h1',
        '2' => 'h2',
        '3' => 'h3',
        '4' => 'h4',
    ];
    $tag = $levels[$level] ?? $levels['2'];
@endphp

<{{ $tag }}
    {{ $attributes->class([
        'text-balance text-fg-title',
        'text-lg/6 md:text-xl/6' => $size == 'lg',
        'text-sm md:text-base/6' => $size == 'sm',
        'text-base/6 md:text-lg/6' => $size == 'md',
        'text-xl/6 md:text-2xl/6' => $size == 'xl',
        'font-semibold' => $weight === 'semibold',
        'font-bold' => $weight === 'bold',
        'font-medium' => $weight === 'medium',
        $class,
    ]) }}>
    @if ($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
    </{{ $tag }}>
