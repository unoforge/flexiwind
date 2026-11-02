@props(['variant' => 'default', 'intent' => 'gray', 'id', 'class' => null])

@php
    use App\Flexiwind\UiHelper;
    $variants = UiHelper::getVariants();

    if ($variant === 'default') {
        $className = ' border-b border-border ';
    } else {
        $className = UiHelper::getClasses($variant, $intent);
    }

    $className .= " {$class}";

@endphp

<div data-accordion-item data-accordion-value="{{ $id }}" class="{{ $className }}">
    {{ $slot }}
</div>
