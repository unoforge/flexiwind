@props([
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'noBorder' => false,
    'inlinedLabel' => false,
    'labelClass' => '',
    'bgNone' => false,
    'noIndicator' => false,
    'radiusNone' => false,
    'unStyled' => false,
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $bg_class = $bgNone ? '' : 'bg-bg';
    $radius = $radiusNone ? '' : 'rounded-ui';
    $border_class = $noBorder ? 'border-transparent' : 'border border-border-input';
    $baseClasses = "ui-form-base ui-form-input ui-form-select {$radius} {$border_class} text-fg";
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
    $indicatorClass = !$noIndicator ? 'ui-form-select-indicator' : '';

    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));

    $final_class = $unStyled ? '' : "{$baseClasses} {$bg_class} {$sizeClasses} {$indicatorClass}";
    $attributes = $attributes->class([$final_class, $indicatorClass])->merge([
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
