@props(['validation' => null])

@php
    $predefinedValidations = [
        'number'       => '/\d/',
        'alpha'        => '/[a-zA-Z]/',
        'alphanumeric' => '/[a-zA-Z0-9]/',
    ];

    $resolvedValidation = $predefinedValidations[$validation] 
        ?? ($validation ?: null);

    $alpineExpression = $resolvedValidation 
        ? "{ validation: {$resolvedValidation} }" 
        : '';
@endphp

<div 
    x-data 
    x-pin-input="{{ $alpineExpression }}"  
    {{ $attributes->class(['flex items-center gap-2 relative cursor-text']) }}
>
    {{ $slot }}
</div>