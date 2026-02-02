@props(['variant' => 'default', 'intent' => 'gray', 'id', 'class' => null])

@php
    use App\Flexiwind\UiHelper;
    $variants = UiHelper::getVariants();

    $className = '';
    $variantClass = UiHelper::getClasses($variant, $intent);
    if ($variant === 'default') {
        $className = ' border-b border-border ';
    }

    $className .= "{$class} {$variantClass}";

@endphp

<div data-accordion-item data-accordion-value="{{ $id }}" class="{{ $className }}">
    {{ $slot }}
</div>
