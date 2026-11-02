{{-- Le bouton de recherche qui ouvre le menu, avec son raccourci. --}}
@aware(['shortcut' => 'mod+k'])
@props(['shortcut' => 'mod+k', 'placeholder' => 'Search…'])

<button type="button" data-slot="command-menu-trigger" aria-haspopup="dialog" x-on:click="open()"
    {{ $attributes->class([
        'flex h-9 w-full max-w-72 items-center gap-2 rounded-ui border border-border-input bg-background ps-3 pe-1.5 text-sm text-muted-foreground transition-colors',
        'hover:border-muted-foreground/30 hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-(--ui-input-focus-outline)',
    ]) }}>
    <span aria-hidden="true" class="flex size-4 shrink-0 iconify ph--magnifying-glass"></span>
    <span class="truncate">{{ $slot->isEmpty() ? $placeholder : $slot }}</span>
    @if ($shortcut)
        <x-ui.command-menu.shortcut :keys="$shortcut" class="ms-auto" />
    @endif
</button>
