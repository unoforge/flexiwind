@props(['size' => 'default', 'radius' => 'circle', 'text' => null, 'variant' => 'solid', 'intent' => 'gray', 'radiusNone'=>false])

@php
    use App\Flexiwind\UiHelper;

    $av_p_sizes = [
        'default' => 'avatar-placeholder-md',
        'xs' => 'avatar-placeholder-xs',
        'sm' => 'avatar-placeholder-sm',
        'md' => 'avatar-placeholder-md',
        'lg' => 'avatar-placeholder-lg',
        'xl' => 'avatar-placeholder-xl',
    ];
@endphp

<span
    {{ $attributes->class([
        'avatar-placeholder',
        $av_p_sizes[$size] ?? $av_p_sizes['default'],
        UiHelper::getClasses($variant, $intent),
       $radiusNone ? '':"rounded-full"
    ]) }}>
    @if ($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</span>
