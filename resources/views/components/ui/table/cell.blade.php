@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<td
    {{ $attributes->class([
        'px-5 py-2.5',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap'=>$whiteSpace=='nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</td>
