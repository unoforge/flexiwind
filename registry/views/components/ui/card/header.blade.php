@props(['direction' => 'column', 'justify' => 'start', 'class' => '', 'flexNone' => false, 'gap' => '2'])

<div
    {{ $attributes->class([
        'flex' => !$flexNone,
        'flex-col' => $direction == 'column' && !$flexNone,
        'flex-row' => $direction == 'row' && !$flexNone,
        'justify-start' => $justify == 'start' && !$flexNone,
        'justify-end' => $justify == 'end' && !$flexNone,
        'justify-center' => $justify == 'center' && !$flexNone,
        'gap-1' => $gap == '1' && !$flexNone,
        'gap-2' => $gap == '2' && !$flexNone,
        'gap-3' => $gap == '3' && !$flexNone,
        'gap-4' => $gap == '4' && !$flexNone,
        $class,
    ]) }}>
    {{ $slot }}
</div>
