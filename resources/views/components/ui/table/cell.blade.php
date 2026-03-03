@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<td
    {{ $attributes->class([
        'px-(--column-px) py-(--column-py)',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap'=>$whiteSpace=='nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</td>
