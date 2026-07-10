@props(['as' => 'div'])





<{{ $as }}
    {{ $attributes->class([
        'flex flex-col size-full overflow-hidden bg-overlay [--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]',
        "group-data-[floated='true']:border border-fg-muted/20",
    ]) }}>
    {{ $slot }}
    </{{ $as }}>
