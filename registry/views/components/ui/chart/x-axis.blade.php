{{-- Libellés des catégories. `interval` n'en garde qu'un sur N ; par défaut, au plus 12 libellés. --}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['interval' => null])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    $count = $chart['count'];
    $layout = $type === 'bar' ? 'band' : 'point';
    $every = max(1, (int) ($interval ?? ceil($count / 12)));
@endphp

<div data-slot="chart-x-axis" aria-hidden="true" {{ $attributes->class('relative col-start-2 row-start-2 mt-2.5 h-4 text-xs leading-none text-muted-foreground') }}>
    @if ($horizontal)
        @foreach ($chart['scale']['ticks'] as $tick)
            <span class="absolute top-0 -translate-x-1/2 whitespace-nowrap tabular-nums"
                style="left: {{ \App\Flexiwind\ChartHelper::position($tick, $chart['scale']) }}%">{{ \App\Flexiwind\ChartHelper::format($tick, $format, $prefix, $suffix) }}</span>
        @endforeach
    @else
        @foreach ($chart['categories'] as $i => $category)
            @continue($i % $every !== 0)
            <span @class([
                'absolute top-0 max-w-24 truncate whitespace-nowrap',
                '-translate-x-1/2' => $layout === 'band' || ($i > 0 && $i < $count - 1),
                '-translate-x-full' => $layout === 'point' && $i === $count - 1 && $count > 1,
            ]) style="left: {{ \App\Flexiwind\ChartHelper::x($i, $count, $layout) }}%">{{ $category }}</span>
        @endforeach
    @endif
</div>
