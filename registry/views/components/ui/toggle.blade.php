{{--
    Un bouton qui reste enfoncé : une valeur oui/non qui ressemble aux
    boutons voisins (barres d'outils, cartes, en-têtes).

    <x-ui.toggle wire:model.live="starred" aria-label="Star">
        <x-ui.icon name="ph--star" />
    </x-ui.toggle>

    `aria-pressed` donne l'état : le libellé ne change pas quand on presse.
    Avec `name`, un champ caché envoie `value` tant que le bouton est pressé.
--}}
@props([
    'pressed' => false,
    'variant' => 'ghost',
    'size' => 'md',
    'iconOnly' => false,
    'name' => null,
    'value' => '1',
    'disabled' => false,
])

@php
    $variant = in_array($variant, ['ghost', 'outline', 'primary'], true) ? $variant : 'ghost';
    $size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
@endphp

<button type="button" data-slot="toggle"
    x-data="{ pressed: @js((bool) $pressed) }" x-modelable="pressed"
    x-on:click="pressed = !pressed" x-bind:aria-pressed="String(!!pressed)"
    aria-pressed="{{ $pressed ? 'true' : 'false' }}"
    @if ($disabled) disabled @endif
    {{ $attributes->class([
        'inline-flex shrink-0 items-center justify-center gap-2 rounded-ui font-medium whitespace-nowrap transition-colors duration-150',
        'outline-2 outline-offset-2 outline-transparent focus-visible:outline-(--ui-input-focus-outline) disabled:cursor-not-allowed disabled:opacity-50',
        '*:data-[slot=icon]:shrink-0',
        'h-8 min-w-8 text-[13px]' => $size === 'sm',
        'h-9 min-w-9 text-sm' => $size === 'md',
        'h-10 min-w-10 text-sm' => $size === 'lg',
        'px-2' => ! $iconOnly && $size === 'sm',
        'px-2.5' => ! $iconOnly && $size === 'md',
        'px-3' => ! $iconOnly && $size === 'lg',
        'text-muted-foreground enabled:hover:bg-muted enabled:hover:text-title-foreground aria-pressed:bg-muted aria-pressed:text-title-foreground' => $variant === 'ghost',
        'border border-border-input bg-background text-foreground shadow-xs enabled:hover:bg-muted aria-pressed:border-border-strong aria-pressed:bg-muted aria-pressed:text-title-foreground' => $variant === 'outline',
        'text-muted-foreground enabled:hover:bg-muted enabled:hover:text-title-foreground aria-pressed:bg-primary/10 aria-pressed:text-primary dark:aria-pressed:text-[color-mix(in_oklab,var(--primary)_45%,white)]' => $variant === 'primary',
    ]) }}>
    {{ $slot }}
    @if ($name)
        <input type="hidden" name="{{ $name }}" value="{{ $value }}" x-bind:disabled="!pressed" @unless ($pressed) disabled @endunless>
    @endif
</button>
