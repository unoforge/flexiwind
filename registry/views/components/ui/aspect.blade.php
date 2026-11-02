@props(['aspect' => 'video'])

@php
    $aspects = [
        'video' => 'aspect-video',
        'square' => 'aspect-square',
        '35mm-film' => 'aspect-35mm-film',
        'standard-tv' => 'aspect-standard-tv',
        'ultrawide' => 'aspect-ultrawide',
    ];
    
    $defaultAspect = 'video';
    $aspectClass = $aspects[$aspect] ?? $aspects[$defaultAspect];
@endphp

<div {{ $attributes->merge(['class' => $aspectClass]) }}>
    {{ $slot }}
</div>