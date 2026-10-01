{{-- Lignes horizontales aux graduations. La ligne du zéro reste pleine quand l'échelle descend sous zéro. --}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['vertical' => false])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    $scale = $chart['scale'];
    $layout = $type === 'bar' ? 'band' : 'point';
@endphp

<div data-slot="chart-grid" aria-hidden="true" {{ $attributes->class('pointer-events-none relative col-start-2 row-start-1') }}>
    @foreach ($scale['ticks'] as $tick)
        @php $isZero = $tick == 0 && $scale['min'] < 0; @endphp
        @if ($horizontal)
            <span @class(['absolute inset-y-0 border-l', 'border-border-strong' => $isZero, 'border-dashed border-border' => ! $isZero])
                style="left: {{ \App\Flexiwind\ChartHelper::position($tick, $scale) }}%"></span>
        @else
            <span @class(['absolute inset-x-0 border-t', 'border-border-strong' => $isZero, 'border-dashed border-border' => ! $isZero])
                style="top: {{ \App\Flexiwind\ChartHelper::y($tick, $scale) }}%"></span>
        @endif
    @endforeach
    @if ($vertical && ! $horizontal)
        @for ($i = 0; $i < $chart['count']; $i++)
            <span class="absolute inset-y-0 border-l border-dashed border-border" style="left: {{ \App\Flexiwind\ChartHelper::x($i, $chart['count'], $layout) }}%"></span>
        @endfor
    @endif
</div>
