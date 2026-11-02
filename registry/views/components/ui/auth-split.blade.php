@props(['as' => 'main', 'noDefaultGrid' => false])
@php
    $className = $noDefaultGrid ? '' : 'grid lg:grid-cols-2';
@endphp


<{{ $as }} {{ $attributes->class([$className]) }}>
    {{ $slot }}
    </{{ $as }}>
