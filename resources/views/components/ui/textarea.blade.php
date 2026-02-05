@props([
    'type' => 'text',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
    'noBorder' => false,
    'inlinedLabel' => false,
    'labelClass' => '',
    'radius' => 'lg',
    'autoResize' => false,
    'resizeNone' => false,
    'groupWrapperClass' => null,
])

@php
    $sizes = [
        'sm' => 'p-2 text-xs',
        'md' => 'p-2.5 text-sm',
        'lg' => 'p-3 text-sm',
    ];

    $resize_class = $resizeNone ? 'resize-none' : '';

    $border_class = $noBorder ? 'border-transparent' : 'border border-border-input bg-bg';
    $baseClasses = "ui-form-base ui-form-input ui-radius {$border_class} {$resize_class} text-fg min-h-20 shadow ";
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

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
        <textarea {{ $attributes }} @if ($autoResize) x-auto-resize-area @endif>{{ $slot }}</textarea>
    </div>
@else
    <textarea {{ $attributes }} @if ($autoResize) x-auto-resize-area @endif>{{ $slot }}</textarea>
@endif
