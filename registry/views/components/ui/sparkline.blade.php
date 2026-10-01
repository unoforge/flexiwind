{{--
    Mini-tendance sans axes, pour une carte KPI ou une ligne de tableau.

    <x-ui.sparkline :data="[12, 18, 9, 24, 31]" class="h-10 w-28" />
    <x-ui.sparkline :data="$rows" key="revenue" type="area" color="var(--success)" />

    `data` est une liste de nombres, ou de lignes dont on lit `key`.
    Une ligne ou une aire suit la tendance (échelle du min au max) ; des
    barres partent de zéro.
--}}
@props([
    'data' => [],
    'key' => null,
    'type' => 'line',
    'color' => 'var(--chart-1)',
    'strokeWidth' => 2,
    'dot' => true,
    'label' => 'Trend',
])

@php
    $values = [];
    foreach ($data as $row) {
        $values[] = $key !== null ? data_get($row, $key) : $row;
    }

    $type = in_array($type, ['line', 'area', 'bar'], true) ? $type : 'line';
    $geometry = \App\Flexiwind\ChartHelper::sparkline($values, $type);
    $color = \App\Flexiwind\ChartHelper::color($color, 0);
    $numbers = array_values(array_filter($values, 'is_numeric'));
    // Le lecteur d'écran entend la tendance, pas une image muette.
    $summary = $numbers === []
        ? $label
        : $label.': from '.$numbers[0].' to '.$numbers[array_key_last($numbers)];
    $uid = 'fx-spark-'.substr(md5(serialize([$values, $type, $color])), 0, 8);
@endphp

<span role="img" aria-label="{{ $summary }}" data-slot="sparkline" {{ $attributes->class('relative inline-block h-8 w-24 shrink-0 align-middle') }}>
    @if ($type === 'bar')
        @foreach ($geometry['bars'] as $bar)
            <span class="absolute rounded-t-[2px]" style="left: {{ $bar['left'] }}%; width: {{ $bar['width'] }}%; top: {{ $bar['top'] }}%; height: {{ $bar['height'] }}%; background: {{ $color }}"></span>
        @endforeach
    @elseif ($geometry['line'] !== '')
        <svg class="absolute inset-0 size-full overflow-visible" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
            @if ($type === 'area')
                <defs>
                    <linearGradient id="{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" style="stop-color: {{ $color }}; stop-opacity: 0.3"></stop>
                        <stop offset="100%" style="stop-color: {{ $color }}; stop-opacity: 0"></stop>
                    </linearGradient>
                </defs>
                <path d="{{ $geometry['area'] }}" fill="url(#{{ $uid }})"></path>
            @endif
            <path d="{{ $geometry['line'] }}" fill="none" vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                style="stroke: {{ $color }}; stroke-width: {{ (float) $strokeWidth }}px"></path>
        </svg>
        @if ($dot && $geometry['last'])
            <span class="absolute size-1.5 -translate-x-1/2 -translate-y-1/2 rounded-full"
                style="left: {{ $geometry['last']['x'] }}%; top: {{ $geometry['last']['y'] }}%; background: {{ $color }}"></span>
        @endif
    @endif
</span>
