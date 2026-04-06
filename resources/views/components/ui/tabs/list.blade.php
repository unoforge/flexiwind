@props(['unStyled' => false])

@php

@endphp

<ul data-tab-list role="tablist"
    {{ $attributes->class([
        'pt-2 mb-2 border-b border-border flex items-center gap-5 text-fg-muted' => !$unStyled,
    ]) }}>
    {{ $slot }}
</ul>
