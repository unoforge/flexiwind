@props([
    'href' => null,
    'ariaLabel' => null,
    'asInternal' => false,
])

@php
    $isInternal = ($href && (Str::startsWith($href, '/') || Str::startsWith($href, '#'))) || $asInternal;
    $label = $ariaLabel ?: "Link to {$href}";
@endphp

@if($isInternal)
    <a href="{{ $href }}" aria-label="{{ $label }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <a href="{{ $href }}" aria-label="{{ $label }}" target="_blank" rel="noopener noreferrer" {{ $attributes }}>
        {{ $slot }}
    </a>
@endif