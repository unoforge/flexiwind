@props(['type' => 'icon', 'icon' => 'ph--caret-down'])

@if ($type === 'icon')
    <span aria-hidden
        {{ $attributes->class([
            'flex text-fg-muted size-3.5 iconify group-aria-expanded:rotate-180 in-aria-expanded:rotate-180',
            'ease-linear duration-200',
            $icon,
        ]) }}></span>
@elseif($type === 'plus-sign')
    <span aria-hidden
        {{ $attributes->class([
            'flex text-fg-muted relative size-2.5 disclosure-indicator-plus disclosure-indicator-to-minus',
        ]) }}></span>
@endif
