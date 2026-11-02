@props([
    'id' => null,
    'name' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
    'invalid' => false,
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
        'ui-checkbox-radio-base ui-form-checkbox bg-(--checkbox-bg) mt-0.5 peer text-(--checkbox-checked-color) border border-input rounded-(--checkbox-radius)';
    $sizeClasses = $sizes[$size] ?? $sizes['sm'];
    $stateClasses = $disabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer';

    $id = $id ?? (filled($name) ? $name : uniqid('checkbox-'));

    $attributes = $attributes->class([$baseClasses, $sizeClasses, $stateClasses])->merge([
        'type' => 'checkbox',
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
        'data-invalid' => $invalid,
        'aria-invalid' => $invalid ? 'true' : null,
    ]);
@endphp



@if ($label)
    <div class="flex items-center">
        <input {{ $attributes }}>
        <x-ui.label for="{{ $id }}" class="ml-2 mt-0.5 {{ $disabled ? 'opacity-60' : '' }}">
            {{ $label }}
        </x-ui.label>
    </div>
@else
    <input {{ $attributes }}>
@endif
