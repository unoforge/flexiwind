@props([
    'size' => 'md',
    'class' => '',
    'noRadius' => false,
    'wrapper' => '',
    'max' => '100',
    'min' => '0',
    'customIndicator' => null,
    'thumbBgCurrent' => false,
])

@php

    $wrapper_sizes = [
        'xs' => 'h-2',
        'sm' => 'h-3',
        'md' => 'h-4',
    ];
    $range_sizes = [
        'xs' => '[--ui-input-range-size:--spacing(2)] [--ui-input-range-track-height:--spacing(0.5)] [--ui-input-range-mt:--spacing(0.75)]',
        'sm' => '[--ui-input-range-size:--spacing(3)] [--ui-input-range-track-height:--spacing(1)] [--ui-input-range-mt:--spacing(1)]',
        'md' =>
            '[--ui-input-range-size:--spacing(4)] [--ui-input-range-track-height:--spacing(2)] [--ui-input-range-mt:--spacing(1)]',
    ];
    $wrapper_size = $wrapper_sizes[$size] ?? $wrapper_sizes['md'];
    $wrapper_class = "relative w-full flex items-center {$wrapper_size} {$wrapper}";
    
    $range_size = $range_sizes[$size] ?? $range_sizes['md'];
    $radius = $noRadius ? '[--ui-progressbar-radius:0px]' : '[--ui-progressbar-radius:20px]';
    $thumBg = $thumbBgCurrent ? '[--ui-input-range-thumb-bg:currentColor]' : '[--ui-input-range-thumb-bg:var(--c-bg)]';
    $className = "ui-input-range [--ui-input-range-track-bg:var(--c-bg-range)] {$radius} {$range_size} {$thumBg} {$class}";

    $indicator_sizes = [
        'xs' => 'h-0.5',
        'sm' => 'h-1',
        'md' => 'h-2',
    ];
    $indicator_size = $indicator_sizes[$size] ?? $indicator_sizes['md'];
    $radius_indicator = $noRadius ? '' : 'rounded-[20px]';
    $custom_indicator = $customIndicator
        ? "peer-disabled:opacity-50 {$radius_indicator} {$indicator_size} {$customIndicator}"
        : null;
@endphp

<div class="{{ $wrapper_class }}"
    @if ($custom_indicator) x-data x-range-indicator data-custom-range-wrapper data-range-indicator="{{ $custom_indicator }}" @endif>
    <input data-input-range
        {{ $attributes->merge([
            'class' => $className,
            'type' => 'range',
            'min' => $min,
            'max' => $max,
        ]) }}>
</div>
