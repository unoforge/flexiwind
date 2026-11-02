{{-- Un bouton qui vide la sélection. Caché tant qu'il n'y a rien à vider. --}}
<button type="button" data-listbox-clear wire:ignore x-cloak x-show="hasValue && !disabled"
    {{ $attributes->class(['rounded-[calc(var(--radius-ui)-var(--spacing))] text-xs font-medium text-primary hover:underline focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline)']) }}>
    @if ($slot->isEmpty())
        Clear all
    @else
        {{ $slot }}
    @endif
</button>
