@props(['radiusNone' => false, 'class' => '', 'bgNone' => false])

@php
    $bgClass = $bgNone ? '' : 'bg-bg-surface-elevated';
    $sk_radius = $radiusNone ? '' : 'rounded-full';
    $className = "animate-pulse {$bgClass} {$sk_radius} {$class}";
@endphp

<div {{ $attributes->merge([
    'class' => $className,
]) }}></div>
