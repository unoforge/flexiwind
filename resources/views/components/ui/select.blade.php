@props([
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'noBorder' => false,
    'inlinedLabel' => false,
    'labelClass' => '',
    'bgNone' => false,
    'radiusNone' => false,
    'unStylled' => false,
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $bg_class = $bgNone ? '' : 'bg-bg';
    $radius = $radiusNone ? '' : 'ui-radius';
    $border_class = $noBorder ? 'border-transparent' : 'border border-border-input';
    $baseClasses = "ui-form-base ui-form-input ui-form-select shadow {$radius} {$border_class} text-fg";
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));

    $final_class = $unStylled ? '' : "{$baseClasses} {$bg_class} {$sizeClasses}";
    $attributes = $attributes->class([$final_class])->merge([
        'disabled' => $disabled,
        'readonly' => $readonly,
        'id' => $id,
    ]);

    $containerClass = $groupWrapperClass ? '' : '';
    $group_wrapper = $inlinedLabel
        ? "flex items-center gap-2 {$containerClass}"
        : "flex flex-col space-y-2 {$containerClass}";
@endphp

@if ($label)
    <div class="{{ $group_wrapper }}">
        <x-ui.label for="{{ $id }}" :text="$label" class="{{ $labelClass }}" />
        <select {{ $attributes }}>
            {{ $slot }}
        </select>
    </div>
@else
    <select {{ $attributes }}>
        {{ $slot }}
    </select>
@endif
