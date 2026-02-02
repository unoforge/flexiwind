@props([
    'fill' => 'default',
    'size' => 'default',
    'variant' => 'none',
    'intent' => 'gray',
    'noBorder' => false,
    'class' => '',
    'noShadow' => false,
])

@php
    use App\Flexiwind\UiHelper;
    $variants = UiHelper::getVariants();
    $variantClass = $variant == 'none' ? '' : UiHelper::getClasses($variant, $intent);

@endphp
<div
    {{ $attributes->class([
        'relative text-sm',
        'p-(--card-padding) rounded-(--card-radius) [--card-radius:var(--radius-ui)]' => $size != 'none',
        '[--card-padding:var(--ui-padding,--spacing(4))]' => $size == 'default',
        '[--card-padding:var(--ui-padding,--spacing(0.5))]' => $size == '2xs',
        '[--card-padding:var(--ui-padding,--spacing(1))]' => $size == 'xs',
        '[--card-padding:var(--ui-padding,--spacing(2.5)]' => $size == 'sm',
        '[--card-padding:var(--ui-padding,--spacing(5)]' => $size == 'lg',
        'bg-card text-fg' => $fill == 'default' && $variant == 'none',
        'bg-card-gray text-fg' => $fill == 'gray' && $variant == 'none',
        'ring-1 ring-border-card' => !$noBorder && $variant == 'none',
        'shadow-sm' => !$noShadow,
        $variantClass,
        $class,
    ]) }}>
    {{ $slot }}
</div>
