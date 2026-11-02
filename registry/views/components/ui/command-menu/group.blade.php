{{--
    Un groupe d'éléments sous un titre. `:filter="false"` : le groupe montre
    ses éléments tels quels, pour des résultats déjà filtrés par Livewire.
--}}
@props(['heading' => null, 'filter' => true])

<div role="group" data-command-group @if (! $filter) data-command-static @endif
    @if ($heading) aria-label="{{ $heading }}" @endif
    {{ $attributes->class(['flex flex-col gap-px [&+[data-command-group]]:mt-1']) }}>
    @if ($heading)
        <div aria-hidden="true" data-command-heading class="px-2.5 pt-2 pb-1 text-xs font-medium text-muted-foreground">{{ $heading }}</div>
    @endif
    {{ $slot }}
</div>
