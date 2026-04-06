@props(['radius' => 'circle', 'bgNone' => false])


<div
    {{ $attributes->class([
        'animate-pulse',
        'rounded-full' => $radius === 'circle',
        'rounded-ui' => $radius === 'ui',
        'bg-bg-muted' => !$bgNone,
    ]) }}>
</div>
