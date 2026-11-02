{{--
    Un élément : un lien avec `href`, sinon un bouton (wire:click,
    x-on:click…). `page` ouvre une page du menu ; `keywords` élargit la
    recherche ; `shortcut` affiche des touches ; `keep-open` laisse le menu
    ouvert après l'action. Le slot `trailing` s'affiche en fin de ligne
    (un badge, un compteur) sans compter dans la recherche.
--}}
@props(['href' => null, 'icon' => null, 'shortcut' => null, 'keywords' => null, 'page' => null, 'description' => null, 'keepOpen' => false, 'disabled' => false])

@php
    $tag = $href && ! $disabled ? 'a' : 'button';
@endphp

<{{ $tag }} role="option" aria-selected="false" tabindex="-1" data-command-item
    @if ($href && ! $disabled) href="{{ $href }}" @else type="button" @endif
    @if ($keywords) data-keywords="{{ $keywords }}" @endif
    @if ($page) data-page="{{ $page }}" @endif
    @if ($keepOpen) data-keep-open @endif
    @if ($disabled) disabled aria-disabled="true" @endif
    {{ $attributes->class([
        'flex w-full shrink-0 items-center gap-2.5 rounded-[calc(var(--command-radius)-var(--command-padding))] px-2.5 text-start text-sm text-foreground outline-none',
        'min-h-10' => ! $description,
        'min-h-13 py-1.5' => $description,
        'cursor-pointer aria-selected:bg-muted aria-selected:text-title-foreground',
        'disabled:cursor-not-allowed disabled:opacity-50',
    ]) }}>
    @if ($icon)
        <span aria-hidden="true" data-slot="icon" class="flex size-4 shrink-0 iconify text-muted-foreground in-aria-selected:text-title-foreground {{ $icon }}"></span>
    @endif
    @if ($description)
        <span class="flex min-w-0 flex-col">
            <span data-command-label class="truncate">{{ $slot }}</span>
            <span class="truncate text-[12.5px] text-muted-foreground">{{ $description }}</span>
        </span>
    @else
        <span data-command-label class="min-w-0 truncate">{{ $slot }}</span>
    @endif
    @isset($trailing)
        <span class="ms-auto flex shrink-0 items-center gap-1.5">{{ $trailing }}</span>
    @endisset
    @if ($shortcut)
        <x-ui.command-menu.shortcut :keys="$shortcut" :class="isset($trailing) ? '' : 'ms-auto'" />
    @elseif ($page)
        <span aria-hidden="true" @class(['flex size-4 shrink-0 iconify ph--caret-right text-muted-foreground', 'ms-auto' => ! isset($trailing)])></span>
    @endif
</{{ $tag }}>
