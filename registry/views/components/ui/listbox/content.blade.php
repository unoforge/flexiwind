{{--
    Le panneau : celui du dropdown. wire:key le garde d'un rendu Livewire à
    l'autre même quand Flexilla lui donne un id. Mettez-y une recherche, une liste
    d'options, un état vide, ou ce que vous voulez.
--}}
@aware(['placement' => 'bottom-start'])
@props(['placement' => 'bottom-start'])

<div wire:key="listbox-content" wire:ignore.self data-select-content data-placement="{{ $placement }}"
    {{ $attributes->class([
        'ui-popper z-70 flex min-w-(--select-min-width,var(--trigger-width)) max-w-[calc(100vw-2rem)] flex-col gap-1',
        'rounded-(--dropdown-radius) border border-foreground/10 bg-background p-(--dropdown-padding) text-muted-foreground shadow-xs outline-hidden',
        '[--dropdown-padding:--spacing(1)] [--dropdown-radius:var(--radius-ui)] forced-colors:bg-[Canvas]',
        'invisible translate-y-1.5 scale-99 opacity-0 transition-transform ease-linear fx-open:visible fx-open:translate-y-0 fx-open:scale-100 fx-open:opacity-100',
    ]) }}>
    {{-- Autocomplete : tant que la saisie est trop courte, ce message remplace les options. --}}
    <p x-cloak x-show="hint" x-text="hint" class="px-3 py-1.5 text-sm/6 text-muted-foreground"></p>
    {{ $slot }}
</div>
