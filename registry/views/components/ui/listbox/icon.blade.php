{{-- Une icône d'option : une classe Iconify (`name`) ou votre SVG. --}}
@props(['name' => null])

@if ($name)
    <x-ui.icon :name="$name" {{ $attributes->class(['opacity-70']) }} />
@else
    <span slot="icon" data-slot="icon" aria-hidden="true" {{ $attributes->class(['flex size-4 shrink-0 items-center opacity-70']) }}>{{ $slot }}</span>
@endif
