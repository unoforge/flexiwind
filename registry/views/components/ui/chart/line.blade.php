{{--
    Lignes, ou aires avec `area`. Le tracé vit dans une viewBox 0 0 100 100
    étirée : le trait garde son épaisseur grâce à vector-effect, et les
    points sont des éléments HTML pour rester ronds.
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['curve' => 'smooth', 'area' => false, 'dots' => null, 'strokeWidth' => 2, 'only' => null])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    $series = $only === null
        ? $chart['series']
        : array_values(array_filter($chart['series'], fn (array $s): bool => in_array($s['key'], (array) $only, true)));
    $layout = $type === 'bar' ? 'band' : 'point';
    $smooth = $curve !== 'linear';
    $showDots = $dots ?? $chart['count'] <= 16;
    $uid = 'fx-chart-'.substr(md5(serialize([$data, $series])), 0, 8);
@endphp

<div data-slot="chart-lines" aria-hidden="true" {{ $attributes->class('pointer-events-none relative col-start-2 row-start-1') }}>
    <svg class="absolute inset-0 size-full overflow-visible" viewBox="0 0 100 100" preserveAspectRatio="none">
        @if ($area)
            <defs>
                @foreach ($series as $item)
                    <linearGradient id="{{ $uid }}-{{ $loop->index }}" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" style="stop-color: {{ $item['color'] }}; stop-opacity: 0.32"></stop>
                        <stop offset="100%" style="stop-color: {{ $item['color'] }}; stop-opacity: 0.02"></stop>
                    </linearGradient>
                @endforeach
            </defs>
            @foreach ($series as $item)
                <path data-series="{{ $item['key'] }}" d="{{ \App\Flexiwind\ChartHelper::path($chart, $item['key'], $layout, $smooth, true) }}" fill="url(#{{ $uid }}-{{ $loop->index }})"></path>
            @endforeach
        @endif
        @foreach ($series as $item)
            <path data-series="{{ $item['key'] }}" d="{{ \App\Flexiwind\ChartHelper::path($chart, $item['key'], $layout, $smooth) }}" fill="none"
                vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                style="stroke: {{ $item['color'] }}; stroke-width: {{ (float) $strokeWidth }}px"></path>
        @endforeach
    </svg>

    @if ($showDots)
        @foreach ($series as $item)
            @foreach ($chart['values'][$item['key']] as $i => $value)
                @continue($value === null)
                <span data-series="{{ $item['key'] }}" class="absolute size-2 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-background"
                    style="left: {{ \App\Flexiwind\ChartHelper::x($i, $chart['count'], $layout) }}%; top: {{ \App\Flexiwind\ChartHelper::y($value, $chart['scale']) }}%; background: {{ $item['color'] }}"></span>
            @endforeach
        @endforeach
    @endif
</div>
