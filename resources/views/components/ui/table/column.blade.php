@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<th
    {{ $attributes->class([
        'px-(--gutter-x) py-(--gutter-y) font-medium',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap' => $whiteSpace === 'nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</th>
