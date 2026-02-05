@props(['wrapper' => '', 'headerBgStyle' => 'none', 'columnDivider' => false])

<thead class="{{ $wrapper }}">
    <tr
        {{ $attributes->class([
            'capitalize text-sm font-medium text-fg-title',
            'bg-bg-muted/80' => $headerBgStyle === 'gray',
            'divide-x divide-border-strong' => $columnDivider,
        ]) }}>
        {{ $slot }}
    </tr>
</thead>
