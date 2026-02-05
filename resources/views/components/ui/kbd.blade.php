@props(['class' => '', 'variant' => 'solid', 'intent' => 'gray', 'size' => 'default', 'radius' => 'md'])

@php
    use App\Flexiwind\UiHelper;
    $variants = UiHelper::getVariants();

    $sizes = [
        'none'=>'',
        'default' => 'kbd-md',
        'xs' => 'kbd-xs',
        'sm' => 'kbd-sm',
        'lg' => 'kbd-lg',
        'xl' => 'kbd-xl',
    ];

    $variantClass = $variant == 'default' ? ' bg-bg-subtle text-fg' : UiHelper::getClasses($variant, $intent);

    $kbd_size = $sizes[$size] ?? $sizes['md'];
    $className = "{$kbd_size} {$variantClass} {$class} ui-radius";
@endphp
<kbd {{ $attributes->merge(['class' => $className]) }}>
    {{ $slot }}
</kbd>
