@props([
    'variant' => 'default',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'labelPosition' => 'top',
    'labelClass' => '',
    'invalid' => false,
    'class' => '',
    'indicator' => true,
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $indicatorClass = $indicator ? 'ui-form-select-indicator' : '';

    $variantClasses = match ($variant) {
        'default' => 'ui-form-base ui-form-input ui-form-select rounded-ui bg-bg border border-border-input text-fg ',
        'ghost' => 'ui-form-base ui-form-input ui-form-select rounded-ui text-fg ',
        'flush' => 'ui-form-base ui-form-input ui-form-select rounded-ui border-transparent text-fg ',
        'unstyled' => '',
    };

    $sizeClass = $variant === 'unstyled' ? '' : $sizes[$size] ?? $sizes['md'];
    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));
@endphp

@if ($label)
    <div class="{{ $labelPosition === 'inline' ? 'flex items-center gap-2' : 'flex flex-col space-y-2' }} {{ $groupWrapperClass ?? '' }}">
        <x-ui.label for="{{ $id }}" :text="$label" class="{{ $labelClass }}" />
        <select id="{{ $id }}" @if ($disabled) disabled @endif
            @if ($readonly) readonly @endif @if ($invalid) data-invalid @endif
            {{ $attributes->class([$variantClasses, $sizeClass, $indicatorClass, $class]) }}>
            {{ $slot }}
        </select>
    </div>
@else
    <select id="{{ $id }}" @if ($disabled) disabled @endif
        @if ($readonly) readonly @endif @if ($invalid) data-invalid @endif
        {{ $attributes->class([$variantClasses, $sizeClass, $indicatorClass, $class]) }}>
        {{ $slot }}
    </select>
@endif
