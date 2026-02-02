@props([
    'type' => 'text',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'noBorder' => false,
    'inlinedLabel' => false,
    'labelClass' => '',
    'unStylled' => false,
    'bgNone' => false,
    'radiusNone' => false,
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'none' => '',
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $bg_class = $bgNone ? '' : 'bg-bg';
    $radius = $radiusNone ? '' : 'ui-radius';

    $border_class = $noBorder ? 'border-transparent' : 'border border-border-input';
    $baseClasses = $unStylled ? '' : "ui-form-base ui-form-input shadow {$radius} {$bg_class} {$border_class} text-fg";
    $sizeClasses = $unStylled ? '' : $sizes[$size] ?? $sizes['md'];

    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));

    $attributes = $attributes->class([$baseClasses, $sizeClasses])->merge([
        'type' => $type,
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
        <input {{ $attributes }}>
    </div>
@else
    <input {{ $attributes }}>
@endif
