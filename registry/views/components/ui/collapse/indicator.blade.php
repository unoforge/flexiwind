@props(['type' => 'icon', 'icon' => 'ph--caret-down'])

@if ($type === 'icon')
    <span aria-hidden
        {{ $attributes->class([
            'flex opacity-80 iconify size-3.5 group-aria-expanded:rotate-180 in-aria-expanded:rotate-180',
            'ease-linear duration-200',
            $icon,
        ]) }}></span>
@elseif($type === 'plus-sign')
    <span aria-hidden
        {{ $attributes->class([
            'flex opacity-80 relative size-2.5 disclosure-indicator-plus disclosure-indicator-to-minus',
        ]) }}></span>
@endif
