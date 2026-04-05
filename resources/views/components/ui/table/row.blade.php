@props(['class' => '', 'divider' => false])


<tr
    {{ $attributes->class([
        'text-sm divide-(--table-border-color) transition-colors ease-linear',
        'in-fx-hoverable:hover:bg-bg-muted/40',
        'in-fx-striped:in-fx-hoverable:hover:bg-bg-muted/40',
        'divide-x' => $divider,
        'in-fx-table-grid:divide-x',
        $class,
    ]) }}>
    {{ $slot }}
</tr>
