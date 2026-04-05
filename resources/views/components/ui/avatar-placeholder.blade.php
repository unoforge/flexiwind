@props(['size' => 'default', 'text' => null, 'variant' => 'solid', 'intent' => 'gray', 'radius' => 'circle'])

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

    $radii = [
        'none' => '',
        'ui'=>'rounded-ui',
        'md' => 'rounded-md',
        'xl' => 'rounded-xl',
        'circle' => 'rounded-full',
    ];
@endphp

<span
    {{ $attributes->class([
        'avatar-placeholder',
        $av_p_sizes[$size] ?? $av_p_sizes['default'],
        UiHelper::getClasses($variant, $intent),
        $radii[$radius] ?? $radii['circle'],
    ]) }}>
    @if ($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</span>
