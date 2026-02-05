@props([
    'href' => '#',
    'asButton' => false,
    'size' => 'md',
    'radius' => 'md',
    'class' => '',
    'underlined' => false,
    'underlineOffset' => '',
    'variant' => 'solid',
    'intent' => 'neutral',
    'ariaLabel' => null,
    'disabled' => false,
])

@php

    $isInternal = ($href && Str::startsWith($href, '/')) || Str::startsWith($href, '#');

    $offsets = [
        'none' => '',
        '1' => 'underline-offset-1',
        '2' => 'underline-offset-2',
        '3' => 'underline-offset-3',
        '4' => 'underline-offset-4',
        '8' => 'underline-offset-8',
    ];
    $underline_of_class = $underlineOffset ? $offsets[$underlineOffset] : '';
    $underline_class = $underlined ? "underline {$underline_of_class}" : '';

    $label = $ariaLabel ?: "Link to {$href}";

    $className = "{$underline_class} {$class}";
    $attributes = $attributes->merge([
        'href' => $href,
        'class' => $className,
        'aria-label' => $label,
        'aria-disabled' => $disabled ? 'true' : null,
        'tabindex' => $disabled ? '-1' : null,
        'target' => $isInternal ? null : '_blank',
        'rel' => $isInternal ? null : 'noopener noreferrer',
    ]);
@endphp

@if ($asButton)
    <x-ui.button variant="{{ $variant }}" intent="{{ $intent }}" size="{{ $size }}" {{ $attributes }}>
        {{ $slot }}
    </x-ui.button>
@else
    <a {{ $attributes }}>
        {{ $slot }}
    </a>
@endif
