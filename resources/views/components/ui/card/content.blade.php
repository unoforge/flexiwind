@props(['class' => '', 'gap' => '3'])

<div
    {{ $attributes->class([
        'flex flex-col',
        'gap-1' => $gap == '1',
        'gap-2' => $gap == '2',
        'gap-3' => $gap == '3',
        'gap-4' => $gap == '4',
        $class,
    ]) }}>
    {{ $slot }}
</div>
