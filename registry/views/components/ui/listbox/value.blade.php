{{--
    Là où la sélection s'affiche : dans le déclencheur ou n'importe où à côté.

    mode : single (un libellé), chips (une puce par valeur), list (une ligne
    par valeur), count (« 3 selected »), compact (« Paris, Lyon and 2 more »).

    Le contenu est le modèle d'une valeur, avec les liaisons de Flexilla :
    data-bind="label" (ou toute clé data-* de l'option : initials, avatar…),
    data-bind-src, data-bind-alt, data-bind-title, data-bind-href,
    data-bind-style, et data-select-remove pour un bouton qui retire la valeur.
    Les textes passent par textContent : jamais de HTML.
--}}
@aware(['multiple' => false, 'placeholder' => null])
@props([
    'mode' => null,
    'max' => null,
    'countText' => ':count selected',
    'compactText' => ':labels and :count more',
    'limit' => 2,
    'removeLabel' => 'Remove :label',
    'multiple' => false,
    'placeholder' => null,
])

@php
    $mode = in_array($mode, ['single', 'chips', 'list', 'count', 'compact'], true) ? $mode : ($multiple ? 'chips' : 'single');
    // `placeholder` vient du listbox (texte) ou d'un <x-slot:placeholder> (Blade libre).
    $placeholderIsSlot = $placeholder instanceof \Illuminate\View\ComponentSlot;
@endphp

<span data-listbox-value data-mode="{{ $mode }}" wire:ignore
    @if ($max) data-max="{{ (int) $max }}" @endif
    data-count-text="{{ $countText }}" data-compact-text="{{ $compactText }}" data-limit="{{ (int) $limit }}"
    data-remove-label="{{ $removeLabel }}"
    {{ $attributes->class([
        'flex min-w-0 flex-1 items-center gap-2 truncate text-start' => in_array($mode, ['single', 'count', 'compact'], true),
        'flex flex-wrap items-center gap-1.5' => $mode === 'chips',
        'flex flex-col divide-y divide-border overflow-hidden rounded-ui border border-border bg-background' => $mode === 'list',
        // Sans placeholder, un conteneur vide ne prend pas de place.
        'not-has-data-rendered:hidden' => in_array($mode, ['chips', 'list'], true) && blank($placeholder),
    ]) }}>
    <template data-selected-model>
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @elseif ($mode === 'chips')
            <span class="inline-flex h-6.5 max-w-full items-center gap-1.5 rounded-md border border-border bg-background ps-2 pe-0.5 text-[13px] text-foreground has-[img:not([hidden])]:ps-1">
                <img data-bind-src="avatar" alt="" class="size-4.5 shrink-0 rounded-full object-cover">
                <span class="truncate" data-bind="label"></span>
                <button type="button" data-select-remove
                    class="flex size-5 shrink-0 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline)">
                    <span aria-hidden="true" class="iconify ph--x-bold size-3"></span>
                </button>
            </span>
        @elseif ($mode === 'list')
            <span class="flex items-center gap-2.5 py-1.5 ps-3 pe-1.5">
                <img data-bind-src="avatar" alt="" class="size-7 shrink-0 rounded-full object-cover">
                <span class="flex min-w-0 flex-1 flex-col">
                    <span class="truncate text-sm/6 text-foreground" data-bind="label"></span>
                    <span class="truncate text-[13px] text-muted-foreground empty:hidden" data-bind="description"></span>
                </span>
                <button type="button" data-select-remove
                    class="flex size-7 shrink-0 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline)">
                    <span aria-hidden="true" class="iconify ph--x size-3.5"></span>
                </button>
            </span>
        @else
            <span class="flex min-w-0 items-center gap-2">
                <img data-bind-src="avatar" alt="" class="size-5 shrink-0 rounded-full object-cover sm:size-4">
                <span class="truncate text-foreground" data-bind="label"></span>
            </span>
        @endif
    </template>
    @if ($mode === 'chips')
        <template data-selected-more>
            <span class="inline-flex h-6.5 items-center rounded-md border border-border px-2 text-[13px] text-muted-foreground">+<span data-bind="count"></span></span>
        </template>
    @endif
    @if ($placeholderIsSlot)
        <span data-placeholder {{ $placeholder->attributes->class(['text-muted-foreground']) }}>{{ $placeholder }}</span>
    @elseif (filled($placeholder))
        <span data-placeholder class="truncate text-muted-foreground">{{ $placeholder }}</span>
    @endif
</span>
