@props(['wrapper' => '', 'headerBgStyle' => 'none', 'columnDivider' => false])

<thead class="{{ $wrapper }}">
    <tr
        {{ $attributes->class([
            'capitalize text-sm font-medium text-foreground divide-(--table-border-color)',
            'bg-muted/60' => $headerBgStyle === 'gray',
            'divide-x' => $columnDivider,
            'in-fx-table-grid:divide-x'
        ]) }}>
        {{ $slot }}
    </tr>
</thead>
