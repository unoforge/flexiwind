@props(['class' => '', 'as' => 'div'])





<{{ $as }}
    {{ $attributes->class(['flex flex-col size-full overflow-hidden border border-fg-muted/20 bg-overlay [--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]']) }}>
    {{ $slot }}
    </{{ $as }}>
