{{--
    L'avatar d'une option : une image (`src`), ou ce que vous y mettez
    (des initiales, une pastille de couleur).
--}}
@props(['src' => null, 'alt' => '', 'size' => 'sm'])

@php
    $sizes = ['xs' => 'size-4', 'sm' => 'size-5 sm:size-4', 'md' => 'size-6', 'lg' => 'size-8'];
    $sizeClass = $sizes[$size] ?? $sizes['sm'];
@endphp

@if ($src)
    <img data-slot="avatar" src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->class(['me-(--mr-icon) shrink-0 self-center rounded-full object-cover', $sizeClass]) }}>
@else
    <span data-slot="avatar" aria-hidden="true" {{ $attributes->class(['me-(--mr-icon) inline-flex shrink-0 items-center justify-center self-center rounded-full bg-muted text-[10px] font-semibold text-foreground', $sizeClass]) }}>{{ $slot }}</span>
@endif
