@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<th
    {{ $attributes->class([
        'px-(--column-px) py-(--column-py) font-medium',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap' => $whiteSpace === 'nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</th>
