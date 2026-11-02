@props(['absolute' => false, 'class' => '', 'clickable' => false])

@php
    $isClickable = $clickable ? '' : 'pointer-events-none';
    $position = $absolute ? "absolute inset-y-0 pointer-events-none left-(--left-space,10px) {$isClickable}" : '';
    $final_class = "{$class} {$position} flex justify-center items-center";
@endphp
<span class="{{ $final_class }}">
    {{ $slot }}
</span>
