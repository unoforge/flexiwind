@props(['class' => '', 'noDivider' => true, 'hoverable' => false, 'stripped' => false])


<tr
    {{ $attributes->class([
        'text-sm',
        'hover:bg-bg-muted/60 transition-colors ease-linear' => $hoverable,
        'odd:bg-bg even:bg-bg-muted/60' => $stripped,
        'divide-y divide-border-strong/60' => !$noDivider,
        $class
    ]) }}>
    {{ $slot }}
</tr>
