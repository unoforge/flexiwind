@props(['as' => 'div'])





<{{ $as }}
    {{ $attributes->class([
        'flex flex-col size-full overflow-hidden bg-popover [--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]',
        "group-data-[floated=true]:border border-input",
    ]) }}>
    {{ $slot }}
    </{{ $as }}>
    <div class="group-data-[floated=true]:bg-red-400"></div>
