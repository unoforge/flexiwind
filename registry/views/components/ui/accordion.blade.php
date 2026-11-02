@props([
    'defaultValue' => null,
    'type' => 'single',
    'class' => '',
    'keepOneOpen' => false,
    'multiple' => false,
])

<div x-accordion @if ($defaultValue && $defaultValue != '') data-default-value="{{ $defaultValue }}" @endif
    @if ($keepOneOpen) data-prevent-closing-all @endif data-accordion-type="{{ $multiple ? 'multiple' : $type }}"
    {{ $attributes->class([$class]) }}>
    {{ $slot }}
</div>
