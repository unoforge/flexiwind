@props([
    'type' => 'text',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'variant' => 'default',
])

<x-ui.input data-pin-input maxlength="1" :type="$type" :size="$size" :disabled="$disabled" :readonly="$readonly"
    :variant="$variant" {{ $attributes->class(['text-center']) }}/>