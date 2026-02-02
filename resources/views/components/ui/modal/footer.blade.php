@props(['justify' => 'start'])

<div data-slot="modal-footer"
    {{ $attributes->class([
        'relative',
        'p-(--gutter) pt-[calc(var(--gutter)---spacing(3)) flex items-center gap-(--gap,--spacing(3))',
        'justify-start' => $justify == 'start',
        'justify-end' => $justify == 'end',
        'justify-between' => $justify == 'between',
        'justify-center' => $justify == 'center'
    ]) }}>
    {{ $slot }}
</div>
