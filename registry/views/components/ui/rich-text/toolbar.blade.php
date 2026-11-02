{{--
    La barre d'outils. Elle suit la variante de <x-ui.rich-text> : collée en
    haut (default, ghost), dans le cadre (inset) ou détachée (detached).

    <x-ui.rich-text.toolbar sticky>…</x-ui.rich-text.toolbar>
    <x-ui.rich-text.toolbar position="bottom">…</x-ui.rich-text.toolbar>
    <x-ui.rich-text.toolbar stacked>  ← chaque <x-ui.rich-text.group> devient une rangée
--}}
@props([
    'label' => 'Formatting',
    'position' => 'top',
    'sticky' => false,
    'stacked' => false,
])

<div data-slot="rich-text-toolbar" role="toolbar" aria-label="{{ $label }}"
    {{ $attributes->class([
        'flex min-w-0 gap-0.5 p-1.5',
        'flex-wrap items-center' => ! $stacked,
        'flex-col items-start gap-1.5' => $stacked,
        'order-last' => $position === 'bottom',
        'sticky top-0 z-20' => $sticky,
        'group-data-[variant=default]/rich-text:bg-muted/40 group-data-[variant=default]/rich-text:border-border-input',
        'group-data-[variant=default]/rich-text:border-b group-data-[variant=default]/rich-text:rounded-t-[calc(var(--radius-ui)-1px)]' => $position !== 'bottom',
        'group-data-[variant=default]/rich-text:border-t group-data-[variant=default]/rich-text:rounded-b-[calc(var(--radius-ui)-1px)]' => $position === 'bottom',
        'group-data-[variant=inset]/rich-text:px-0.5 group-data-[variant=inset]/rich-text:pt-0 group-data-[variant=inset]/rich-text:pb-1.5' => $position !== 'bottom',
        'group-data-[variant=inset]/rich-text:px-0.5 group-data-[variant=inset]/rich-text:pb-0 group-data-[variant=inset]/rich-text:pt-1.5' => $position === 'bottom',
        'group-data-[variant=detached]/rich-text:w-fit group-data-[variant=detached]/rich-text:max-w-full group-data-[variant=detached]/rich-text:rounded-ui group-data-[variant=detached]/rich-text:border group-data-[variant=detached]/rich-text:border-border group-data-[variant=detached]/rich-text:bg-background group-data-[variant=detached]/rich-text:p-1 group-data-[variant=detached]/rich-text:shadow-xs',
        'group-data-[variant=ghost]/rich-text:border-b group-data-[variant=ghost]/rich-text:border-border group-data-[variant=ghost]/rich-text:bg-background group-data-[variant=ghost]/rich-text:px-0',
    ]) }}>
    {{ $slot }}
</div>
