@props([
    'class' => null,
    'justify' => 'center',
])

<nav role="navigation" aria-label="pagination" data-slot="pagination"
    {{ $attributes->class([
        'mx-auto flex w-full',
        'justify-center' => $justify == 'center',
        'justify-start' => $justify == 'start',
        'justify-end' => $justify == 'end',
        $class,
    ]) }}>
    {{ $slot }}
</nav>
