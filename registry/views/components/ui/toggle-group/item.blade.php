{{--
    Un bouton d'un <x-ui.toggle-group>. Une icône seule demande un
    aria-label ; un texte se suffit.
--}}
@aware(['type' => 'single', 'variant' => 'ghost', 'size' => 'md', 'orientation' => 'horizontal', 'disabled' => false])
@props(['value', 'type' => 'single', 'variant' => 'ghost', 'size' => 'md', 'orientation' => 'horizontal', 'disabled' => false])

@php
    $single = $type !== 'multiple';
    $variant = in_array($variant, ['ghost', 'outline', 'segmented'], true) ? $variant : 'ghost';
    $size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
    $vertical = $orientation === 'vertical';
    $inset = $variant !== 'outline';
    $value = (string) $value;
@endphp

<button type="button" data-slot="toggle-group-item" data-value="{{ $value }}" data-toggle-stop
    role="{{ $single ? 'radio' : 'button' }}"
    @if ($single)
        aria-checked="false" x-bind:aria-checked="String(fwIsOn(@js($value)))"
    @else
        aria-pressed="false" x-bind:aria-pressed="String(fwIsOn(@js($value)))"
    @endif
    x-bind:data-on="fwIsOn(@js($value)) ? '' : null"
    x-on:click="fwToggle(@js($value))"
    @if ($disabled) disabled @endif
    {{ $attributes->class([
        'relative inline-flex shrink-0 items-center gap-2 font-medium whitespace-nowrap transition-colors duration-150',
        'outline-2 -outline-offset-1 outline-transparent focus-visible:z-20 focus-visible:outline-(--ui-input-focus-outline) disabled:cursor-not-allowed disabled:opacity-50',
        '*:data-[slot=icon]:shrink-0',
        'w-full justify-start' => $vertical,
        'justify-center' => ! $vertical,
        // Posé dans un rail : le rayon du groupe moins son padding.
        'rounded-[calc(var(--radius-ui)-var(--toggle-group-padding))]' => $inset,
        'h-6.5 min-w-6.5 px-1.5 text-[13px]' => $inset && $size === 'sm',
        'h-7.5 min-w-7.5 px-2 text-sm' => $inset && $size === 'md',
        'h-8.5 min-w-8.5 px-2.5 text-sm' => $inset && $size === 'lg',
        'text-muted-foreground enabled:hover:bg-muted enabled:hover:text-title-foreground data-on:bg-muted data-on:text-title-foreground' => $variant === 'ghost',
        'text-muted-foreground enabled:hover:text-title-foreground data-on:bg-background data-on:text-title-foreground data-on:shadow-xs data-on:ring-1 data-on:ring-border' => $variant === 'segmented',
        // Accolés : seuls les bouts du groupe sont arrondis.
        'h-8 min-w-8 px-2.5 text-[13px]' => ! $inset && $size === 'sm',
        'h-9 min-w-9 px-3 text-sm' => ! $inset && $size === 'md',
        'h-10 min-w-10 px-3.5 text-sm' => ! $inset && $size === 'lg',
        'border border-border-input bg-background text-foreground enabled:hover:bg-muted data-on:z-10 data-on:border-border-strong data-on:bg-muted data-on:text-title-foreground' => $variant === 'outline',
        '-ms-px rounded-none first:ms-0 first:rounded-s-ui last:rounded-e-ui' => $variant === 'outline' && ! $vertical,
        '-mt-px rounded-none first:mt-0 first:rounded-t-ui last:rounded-b-ui' => $variant === 'outline' && $vertical,
    ]) }}>
    {{ $slot }}
    @if ($vertical && $single)
        <span aria-hidden="true" class="ms-auto hidden size-3.5 shrink-0 iconify ph--check-bold text-primary in-data-on:flex"></span>
    @endif
</button>
