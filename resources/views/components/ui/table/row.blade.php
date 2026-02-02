@props(['class' => '', 'noDivider' => true, 'hoverable' => false, 'stripped' => false])


<tr
    {{ $attributes->class([
        'text-sm',
        'hover:bg-bg-muted' => $hoverable,
        'odd:bg-bg even:bg-bg-muted/70' => $stripped,
        'divide-y divide-border-strong/60' => !$noDivider,
        $class
    ]) }}>
    {{ $slot }}
</tr>
