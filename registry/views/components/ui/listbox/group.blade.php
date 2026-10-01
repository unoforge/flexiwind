{{--
    Un groupe d'options. `label` en fait le titre ; <x-ui.listbox.header>
    permet un titre libre. Il disparaît quand la recherche a masqué toutes
    ses options.
--}}
@props(['label' => null])

@php
    $headingId = $label ? 'listbox-group-'.substr(md5($label.spl_object_id($slot)), 0, 8) : null;
@endphp

<div role="group" @if ($headingId) aria-labelledby="{{ $headingId }}" @endif
    {{ $attributes->class([
        'col-span-full grid grid-cols-subgrid gap-y-1',
        'not-has-[[data-select-item]:not([hidden])]:hidden',
    ]) }}>
    @if ($label)
        <x-ui.listbox.header :id="$headingId">{{ $label }}</x-ui.listbox.header>
    @endif
    {{ $slot }}
</div>
