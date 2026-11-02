{{-- Un avatar en début d'étiquette : une image avec `src`, sinon des initiales dans le slot. --}}
@props(['src' => null, 'alt' => ''])

@if ($src)
    <img data-slot="tag-avatar" src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->class(['-ms-1 size-4 shrink-0 rounded-full object-cover']) }}>
@else
    <span data-slot="tag-avatar" aria-hidden="true" {{ $attributes->class(['-ms-1 inline-flex size-4 shrink-0 items-center justify-center rounded-full bg-background text-[7.5px] font-semibold']) }}>{{ $slot }}</span>
@endif
