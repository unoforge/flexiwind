@props([
    'variant' => 'default',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'labelPosition' => 'top',
    'labelClass' => '',
    'invalid' => false,
    'autoResize' => false,
    'class' => '',
])

@php
    $sizes = [
        'sm' => 'p-2 text-xs',
        'md' => 'p-2.5 text-sm',
        'lg' => 'p-3 text-sm',
    ];

    

    $variantClasses = match ($variant) {
        'default' => 'ui-form-base ui-form-input rounded-ui bg-bg border border-border-input text-fg min-h-20',
        'ghost' => 'ui-form-base ui-form-input rounded-ui border border-transparent text-fg min-h-20',
        'flush' => 'ui-form-base ui-form-input rounded-ui border-transparent text-fg min-h-20',
        'unstyled' => '',
    };

    $sizeClass = $variant === 'unstyled' ? '' : ($sizes[$size] ?? $sizes['md']);
    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));
@endphp

@if ($label)
    <div class="{{ $labelPosition === 'inline' ? 'flex items-center gap-2' : 'flex flex-col space-y-2' }}">
        <x-ui.label for="{{ $id }}" :text="$label" class="{{ $labelClass }}" />
        <textarea
            id="{{ $id }}"
            @if ($disabled) disabled @endif
            @if ($readonly) readonly @endif
            @if ($invalid) data-invalid @endif
            @if ($autoResize) x-auto-resize-area @endif
            {{ $attributes->class([$variantClasses, $sizeClass, $class]) }}
        >{{ $slot }}</textarea>
    </div>
@else
    <textarea
        id="{{ $id }}"
        @if ($disabled) disabled @endif
        @if ($readonly) readonly @endif
        @if ($invalid) data-invalid @endif
        @if ($autoResize) x-auto-resize-area @endif
        {{ $attributes->class([$variantClasses, $sizeClass, $class]) }}
    >{{ $slot }}</textarea>
@endif
