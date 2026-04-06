@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<td
    {{ $attributes->class([
        'px-(--gutter-x) py-(--gutter-y)',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap'=>$whiteSpace=='nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</td>
