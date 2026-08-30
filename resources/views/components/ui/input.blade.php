@props([
    'type' => 'text',
    'variant' => 'default',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'labelPosition' => 'top',
    'labelClass' => '',
    'invalid' => false,
    'invalidMessage' => null,
    'class' => '',
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $variantClasses = match ($variant) {
        'default' => 'ui-form-base ui-form-input rounded-ui bg-background  border border-input text-foreground',
        'ghost' => 'ui-form-base ui-form-input rounded-ui border border-input text-foreground',
        'flush' => 'ui-form-base ui-form-input rounded-ui border-transparent text-foreground',
        'unstyled' => '',
    };

    $sizeClass = $variant === 'unstyled' ? '' : $sizes[$size] ?? $sizes['md'];
    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));
@endphp

@if ($label)
    <div
        class="{{ $labelPosition === 'inline' ? 'flex items-center gap-2' : 'flex flex-col space-y-2' }} {{ $groupWrapperClass ?? '' }}">
        <x-ui.label for="{{ $id }}" :text="$label" class="{{ $labelClass }}" />
        <input type="{{ $type }}" id="{{ $id }}" @if ($disabled) disabled @endif
            @if ($readonly) readonly @endif @if ($invalid) data-invalid @endif
            {{ $attributes->except('id')->class([$variantClasses, $sizeClass, $class]) }} />
    </div>
@else
    <input type="{{ $type }}" id="{{ $id }}" @if ($disabled) disabled @endif
        @if ($readonly) readonly @endif @if ($invalid) data-invalid @endif
        {{ $attributes->except('id')->class([$variantClasses, $sizeClass, $class]) }} />
@endif
