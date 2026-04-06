@props([
    'variant' => 'default',
    'size' => 'md',
])

@php
    $sizes = [
        'none' => '',
        'sm' => 'h-8',
        'md' => 'h-9',
        'lg' => 'h-10',
        'xl' => 'h-11',
    ];

    $variantClasses = match ($variant) {
        'default' => 'ui-form-group-base ui-form-group ui-form-group-input relative flex rounded-ui bg-bg border border-border-input text-fg',
        'ghost' => 'ui-form-group-base ui-form-group ui-form-group-input relative flex rounded-ui bg-bg border border-border-input text-fg',
        'flush' => 'ui-form-group-base ui-form-group ui-form-group-input relative flex border-transparent bg-bg text-fg',
        'unstyled' => 'relative flex',
    };

    $sizeClass = $variant === 'unstyled' ? '' : ($sizes[$size] ?? $sizes['md']);
@endphp

<div {{ $attributes->class([$variantClasses, $sizeClass]) }}>
    {{ $slot }}
</div>
