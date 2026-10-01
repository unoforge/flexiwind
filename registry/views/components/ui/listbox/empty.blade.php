{{--
    Ce qui s'affiche quand la recherche ne trouve rien. <x-ui.listbox.query />
    répète ce qui a été tapé.
--}}
@aware(['emptyText' => 'No results found for “:query”'])
@props(['emptyText' => 'No results found for “:query”'])

<div data-select-empty hidden wire:ignore x-show="!hint" {{ $attributes->class(['px-3 py-1.5 text-sm/6 text-muted-foreground']) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        {{ \Illuminate\Support\Str::before($emptyText, ':query') }}@if (\Illuminate\Support\Str::contains($emptyText, ':query'))<x-ui.listbox.query />{{ \Illuminate\Support\Str::after($emptyText, ':query') }}@endif
    @endif
</div>
