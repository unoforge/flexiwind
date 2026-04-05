@props(['divider' => true, 'class' => ''])



<tbody
    {{ $attributes->class([
        'text-sm divide-(--table-border-color)',
        'divide-y' => $divider,
        'in-fx-table-grid:divide-y',
        'in-fx-striped:*:even:bg-bg-muted/40',
        $class,
    ]) }}>
    {{ $slot }}
</tbody>
