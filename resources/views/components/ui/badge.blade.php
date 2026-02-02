@props(['class' => '', 'variant' => 'solid', 'intent' => 'gray', 'size' => 'default', 'radius' => 'md'])

@php
    use App\Flexiwind\UiHelper;
    $sizes = [
        'default' => 'badge-md',
        'xs' => 'badge-xs',
        'sm' => 'badge-sm',
        'lg' => 'badge-lg',
    ];

    $variantClass = $variant == 'default' ? ' bg-bg-subtle text-fg' : UiHelper::getClasses($variant, $intent);

    $className = "{$sizes[$size ?? 'default']} ui-radius {$variantClass} {$class}";
@endphp
<span {{ $attributes->merge(['class' => $className]) }}>
    {{ $slot }}
</span>
