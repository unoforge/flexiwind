@props([
    'class' => null,
])

<span
    aria-hidden="true"
    aria-label="More pages"
    data-slot="pagination-ellipsis"
    {{ $attributes->class([
        'size-8 flex items-center justify-center',
        $class
    ]) }}
>
   <span class="iconify ph--dots-three"></span>
</span>
