@props(['noDivider' => false, 'stripped' => false, 'class' => ''])



<tbody
    {{ $attributes->class([
        'text-sm',
        'divide-y divide-border-strong/60' => !$noDivider,
        '*:odd:bg-bg *:even:bg-bg-muted/70' => $stripped,
        $class,
    ]) }}>
    {{ $slot }}
</tbody>
