@props([
    'id' => null,
    'name' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
    'size' => 'sm',
    'label' => ''
])

@php
    $sizes = [
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
    ];

    $baseClasses =
        'ui-checkbox-radio-base ui-form-radio border border-border-input shadow-sm bg-(--checkbox-bg) mt-0.5 peer text-primary rounded-full';
    $sizeClasses = $sizes[$size] ?? $sizes['sm'];
    $stateClasses = $disabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer';

    $id = $id ?? $name;

    $attributes = $attributes->class([$baseClasses, $sizeClasses, $stateClasses])->merge([
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
    ]);
@endphp




@if ($label)
    <div class="flex items-center">
        <input type="radio" {{ $attributes }}>
        <x-ui.label for="{{ $id }}" class="ml-2 mt-0.5 {{ $disabled ? 'opacity-60' : '' }}">
            {{ $label }}
        </x-ui.label>
    </div>
@else
    <input type="radio" {{ $attributes }}>
@endif
