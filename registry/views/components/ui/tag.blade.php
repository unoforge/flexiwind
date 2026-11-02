{{--
    Une étiquette : un mot court, avec une icône, un point, un avatar ou un
    compteur. Seule, c'est un <span>. Dans <x-ui.tag-group selectable>, c'est
    un bouton à presser ; dans <x-ui.tag-group removable>, elle porte un
    bouton pour la retirer.

    Le rayon suit celui du thème : --radius-ui moins une unité d'espacement,
    comme un élément posé dans un champ.
--}}
@aware(['selectable' => false, 'removable' => false, 'variant' => 'soft', 'size' => 'md', 'removeLabel' => 'Remove :label', 'disabled' => false])
@props([
    'value' => null,
    'label' => null,
    'variant' => 'soft',
    'size' => 'md',
    'selectable' => false,
    'removable' => false,
    'removeLabel' => 'Remove :label',
    'disabled' => false,
])

@php
    // Le nom lu par le bouton de retrait et par Livewire : `label`, sinon le texte du slot.
    $text = $label ?? trim(strip_tags((string) $slot));
    $value = $value === null ? $text : (string) $value;
    $variant = in_array($variant, ['soft', 'outline', 'solid'], true) ? $variant : 'soft';
    $size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
    $tag = $selectable ? 'button' : 'span';
@endphp

<{{ $tag }} data-slot="tag" data-value="{{ $value }}"
    @if ($selectable)
        type="button" data-tag-focus
        x-bind:aria-pressed="String(typeof fwTagIsOn === 'function' && fwTagIsOn(@js($value)))"
        x-on:click="typeof fwTagToggle === 'function' && fwTagToggle(@js($value))"
        @if ($disabled) disabled @endif
    @endif
    @if ($removable)
        x-show="!(typeof fwTagIsHidden === 'function' && fwTagIsHidden(@js($value)))"
    @endif
    {{ $attributes->class([
        'group/tag [--tag-radius:calc(var(--radius-ui)-var(--spacing))] relative inline-flex max-w-full shrink-0 items-center rounded-(--tag-radius) border font-medium whitespace-nowrap',
        'h-5 gap-1 px-1.5 text-[11.5px]' => $size === 'sm',
        'h-6 gap-1.5 px-2 text-xs' => $size === 'md',
        'h-7 gap-1.5 px-2.5 text-[13px]' => $size === 'lg',
        'border-border bg-muted text-title-foreground' => $variant === 'soft',
        'border-border bg-background text-title-foreground' => $variant === 'outline',
        'border-transparent bg-title-foreground text-background' => $variant === 'solid',
        'pe-0.5' => $removable,
        'cursor-pointer transition-colors duration-150 enabled:hover:border-border-strong focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-(--ui-input-focus-outline) disabled:cursor-not-allowed disabled:opacity-50' => $selectable,
        'aria-pressed:border-primary/35 aria-pressed:bg-primary/10 aria-pressed:text-primary dark:aria-pressed:text-[color-mix(in_oklab,var(--primary)_45%,white)]' => $selectable,
        'data-invalid:border-destructive/40 data-invalid:bg-destructive/10 data-invalid:text-destructive',
    ]) }}>
    @if ($selectable)
        <span aria-hidden="true" class="hidden size-3 shrink-0 iconify ph--check-bold group-aria-pressed/tag:flex"></span>
    @endif
    {{ $slot->isEmpty() ? $text : $slot }}
    @if ($removable)
        <button type="button" data-tag-focus data-tag-remove aria-label="{{ str_replace(':label', $text, $removeLabel) }}"
            @if ($disabled) disabled @endif
            x-on:click="$dispatch('tag-remove', { value: @js($value) }); $el.closest('[data-slot=tag-group]') || $el.closest('[data-slot=tag]').remove()"
            @class([
                'flex size-4.5 shrink-0 items-center justify-center rounded-[calc(var(--tag-radius)-var(--spacing)*0.5)] transition-colors focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline) disabled:pointer-events-none group-data-invalid/tag:text-current',
                // Sur un tag plein, le texte du tag (couleur du fond de page) : le gris se fondrait dans le tag.
                'text-background/70 hover:bg-background/15 hover:text-background' => $variant === 'solid',
                'text-muted-foreground hover:bg-title-foreground/8 hover:text-title-foreground' => $variant !== 'solid',
            ])>
            <span aria-hidden="true" class="flex size-3 iconify ph--x-bold"></span>
        </button>
    @endif
</{{ $tag }}>
