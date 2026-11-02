{{-- Des boutons qui vont ensemble. Dans une barre `stacked`, une rangée. --}}
<div data-slot="rich-text-group" role="group" {{ $attributes->class(['flex flex-wrap items-center gap-0.5']) }}>
    {{ $slot }}
</div>
