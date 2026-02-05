@props(['absolute' => false, 'class' => '', 'clickable' => false])

@php
    $isClickable = $clickable ? '' : 'pointer-events-none';
    $position = $absolute ? "absolute inset-y-0 right-(--right-space,10px) {$clickable}" : '';
    $final_class = "{$class} {$position} flex justify-center items-center";
@endphp
<span class="{{ $final_class }}">
    {{ $slot }}
</span>
