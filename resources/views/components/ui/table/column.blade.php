@props(['align' => 'left', 'whiteSpace' => 'nowrap', 'class' => ''])

<th
    {{ $attributes->class([
        'px-5 py-2.5 font-medium text-fg-title',
        'text-left' => $align == 'left',
        'text-center' => $align == 'center',
        'text-right' => $align == 'right',
        'whitespace-nowrap' => $whiteSpace === 'nowrap',
        $class,
    ]) }}>
    {{ $slot }}
</th>
