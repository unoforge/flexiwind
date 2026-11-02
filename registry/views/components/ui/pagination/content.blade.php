@props([
    'class' => null,
])

<ul
    data-slot="pagination-content"
    {{ $attributes->class([
        '[--gutter:0.25rem]',
        'gap-(--gutter) flex items-center',
        $class
    ]) }}
>
    {{ $slot }}
</ul>