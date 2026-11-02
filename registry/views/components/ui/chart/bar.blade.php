{{--
    Barres groupées, ou empilées avec `stacked` sur la racine ; couchées avec `horizontal`.
    `only` limite le calque à certaines séries (barres + ligne dans un même chart).
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['radius' => 4, 'gap' => 0.3, 'only' => null])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    if ($only !== null) {
        $keys = (array) $only;
        $chart['series'] = array_values(array_filter($chart['series'], fn (array $s): bool => in_array($s['key'], $keys, true)));
    }
    $r = max(0, (int) $radius);
@endphp

<div data-slot="chart-bars" aria-hidden="true"
    @if ($stacked) data-stacked data-scale-min="{{ $chart['scale']['min'] }}" data-scale-max="{{ $chart['scale']['max'] }}" data-radius="{{ $r }}" @endif
    @if ($horizontal) data-horizontal @endif
    {{ $attributes->class('pointer-events-none relative col-start-2 row-start-1') }}>
    @foreach (\App\Flexiwind\ChartHelper::bars($chart, (float) $gap, (bool) $horizontal) as $bar)
        <span data-series="{{ $bar['key'] }}" data-index="{{ $bar['index'] }}" data-value="{{ $bar['value'] }}" class="absolute transition-[top,left,width,height] duration-500 ease-out"
            style="left: {{ $bar['left'] }}%; width: {{ $bar['width'] }}%; top: {{ $bar['top'] }}%; height: {{ $bar['height'] }}%; background: {{ $bar['color'] }}; border-radius: {{ match ($bar['end']) { 'top' => "{$r}px {$r}px 0 0", 'bottom' => "0 0 {$r}px {$r}px", 'right' => "0 {$r}px {$r}px 0", 'left' => "{$r}px 0 0 {$r}px", default => '0' } }}"></span>
    @endforeach
</div>
