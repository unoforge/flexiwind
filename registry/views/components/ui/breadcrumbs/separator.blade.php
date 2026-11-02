@props([
    'notIcon' => false,
    'iconColor'=>false,
    'separator' => 'ph--caret-right',
])

<span aria-hidden="true"
    {{ $attributes->class([
        'flex shrink-0 icon-size',
        'iconify' => !$notIcon && $separator && !$iconColor,
        'iconify-color'=>!$notIcon && $iconColor,
        $separator => !$notIcon && $separator,
    ]) }}>
    @if ($notIcon)
        @if ($separator)
            {!! $separator !!}
        @else
            {{ $slot }}
        @endif
    @endif
</span>
