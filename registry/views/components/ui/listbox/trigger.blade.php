{{--
    Le déclencheur d'un listbox : l'input, en bouton. Sans contenu, il
    affiche la valeur (<x-ui.listbox.value />) ; avec contenu, tout est à
    vous. Flexilla y pose aria-expanded et aria-controls.
--}}
@aware(['size' => 'md', 'disabled' => false])
@props(['chevron' => true, 'size' => 'md', 'disabled' => false])

@php
    $sizes = ['sm' => 'ui-form-input-sm', 'md' => 'ui-form-input-md', 'lg' => 'ui-form-input-lg'];
@endphp

<button type="button" wire:key="listbox-trigger" wire:ignore.self data-select-trigger @if ($disabled) disabled @endif
    {{ $attributes->class([
        'relative flex w-full min-w-0 items-center gap-2 text-start text-sm text-foreground',
        $sizes[$size] ?? $sizes['md'],
        'rounded-ui border border-border-input bg-background',
        'outline outline-transparent outline-offset-0 ring-3 ring-transparent ring-offset-1 ring-offset-transparent transition-all duration-200 ease-linear',
        'enabled:hover:border-muted-foreground/30 focus:border-transparent focus:outline-(--ui-input-focus-outline) focus:ring-(--focus-ring)',
        'aria-expanded:border-primary/70 aria-expanded:ring-(--focus-ring)',
        'group-data-invalid/listbox:border-(--ui-input-invalid-outline) group-data-invalid/listbox:ring-(--ui-input-invalid-outline)/20',
        'disabled:cursor-not-allowed disabled:bg-muted disabled:opacity-50',
    ]) }}>
    @if ($slot->isEmpty())
        <x-ui.listbox.value />
    @else
        {{ $slot }}
    @endif
    @if ($chevron)
        <span aria-hidden="true" data-slot="chevron" class="-me-1 ms-auto flex size-4 shrink-0 text-muted-foreground iconify ph--caret-up-down"></span>
    @endif
</button>
