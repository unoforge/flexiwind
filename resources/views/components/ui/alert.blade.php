@props([
    'class' => '',
    'variant' => 'solid',
    'intent' => 'gray',
    'size' => 'default',
    'dissmissible' => false,
    'dissmissibleAction' => 'remove-from-dom',
    'closable' => true,
    'widthAuto' => false,
    'absolute' => false,
])

@php
    use App\Flexiwind\UiHelper;
    $variants = UiHelper::getVariants();

    $sizes = [
        'none' => '',
        'default' => 'p-4 text-sm',
        'xs' => 'p-1.5 text-xs',
        'sm' => 'p-2.5 text-sm',
        'lg' => 'p-5',
    ];

    $position = $absolute ? 'absolute' : 'relative';
    $width = !$widthAuto ? 'w-full' : '';
    $base = " {$sizes[$size ?? 'default']} {$position} {$width}";

    $variantClass = $variant == 'default' ? ' bg-muted text-foreground' : UiHelper::getClasses($variant, $intent);

    $className = "{$base} {$variantClass} {$class} rounded-ui";
@endphp

@if ($dissmissible)
    <x-ui.dissmissible :action="$dissmissibleAction" :absolute="$absolute" :closable="$closable" {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </x-ui.dissmissible>
@else
    <div {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </div>
@endif
