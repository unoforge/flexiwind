@props([
    'variant' => 'solid',
    'intent' => null,
    'size' => 'md',
    'iconOnly' => false,
    'disabled' => false,
    'type' => 'button',
    'href' => null,
    'radius' => true,
    'inSameWindow' => false,
])
@php
    use App\Flexiwind\ButtonHelper;
    $btn_variants = ButtonHelper::getVariants();

    $sizes = [
        'none' => '',
        'xs' => 'btn-xs',
        'sm' => 'btn-sm',
        'md' => 'btn-md',
        'lg' => 'btn-lg',
        'xl' => 'btn-xl',
    ];
    $iconSizes = [
        'none' => '',
        'xs' => 'btn-icon-xs text-xs',
        'sm' => 'btn-icon-sm text-xs',
        'md' => 'btn-icon-md text-sm',
        'lg' => 'btn-icon-lg text-sm',
        'xl' => 'btn-icon-xl text-base',
    ];
    $baseClasses = 'btn ease-linear duration-200  ';
    if ($variant !== 'none') {
        $baseClasses .= isset($btn_variants[$variant]) ? $btn_variants[$variant]['base'] : 'ee';
    }

    $defaultIntents = [
        'solid' => 'primary',
        'soft' => 'gray',
        'outline' => 'gray',
        'ghost' => 'gray',
    ];

    if ($intent === null && $variant !== 'none') {
        $intent = $defaultIntents[$variant] ?? 'primary';
    }

    $variantClasses = '';
    if ($variant !== 'none' && isset($btn_variants[$variant])) {
        if (isset($btn_variants[$variant]['intents'][$intent])) {
            $variantClasses = $btn_variants[$variant]['intents'][$intent];
        } else {
            // Fallback to variant-specific default intent if provided
            $fallbackIntent = $defaultIntents[$variant] ?? 'primary';
            if (isset($btn_variants[$variant]['intents'][$fallbackIntent])) {
                $variantClasses = $btn_variants[$variant]['intents'][$fallbackIntent];
            }
        }
    }

    $sizeMap = $iconOnly ? $iconSizes : $sizes;
    $sizeClasses = isset($sizeMap[$size]) ? $sizeMap[$size] : $sizeMap['md'];

    $tag = $href ? 'a' : 'button';

    $attributes = $attributes->class([
        $baseClasses,
        $variantClasses,
        $sizeClasses,
        'rounded-ui' => $radius,
        'cursor-not-allowed opacity-50' => $disabled,
    ]);

    $isInternal = true;
    if ($href) {
        $isInternal = Str::startsWith($href, '/') || Str::startsWith($href, '#');
        if (!$isInternal) {
            $host = parse_url($href, PHP_URL_HOST);
            $isInternal = $host === null || $host === request()->getHost();
        }
    }

    $attributes =
        $tag === 'button'
            ? ($attributes = $attributes->merge([
                'type' => $type,
                'disabled' => $disabled,
            ]))
            : $attributes->merge([
                'href' => $disabled ? null : $href,
                'aria-disabled' => $disabled ? 'true' : null,
                'tabindex' => $disabled ? '-1' : null,
            ]);

@endphp


@if ($tag === 'button')
    <button {{ $attributes }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes }} @if (!$isInternal && !$inSameWindow) target="_blank"  rel="noopener noreferrer" @endif>
        {{ $slot }}
    </a>
@endif
