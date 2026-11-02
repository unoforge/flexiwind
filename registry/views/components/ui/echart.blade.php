{{--
    Charts avancés, dessinés par Apache ECharts : zoom, chandeliers, heatmap,
    radar, gros volumes. Même modèle de données que <x-ui.chart> :

    <x-ui.echart type="area" :data="$days" index="date" datetime zoom
        :config="['revenue' => ['label' => 'Revenue']]" class="h-80" />

    Requiert resources/js/plugins/echarts.js (flexi:add echarts). Sans
    JavaScript, le chart n'est pas dessiné mais le tableau de données reste
    lisible par les lecteurs d'écran.

    `options` est fusionné en dernier dans les options ECharts : tout ce que
    le composant ne prévoit pas passe par là (en JSON, pas de fonctions).
--}}
@props([
    'data' => [],
    'config' => [],
    'index' => null,
    'type' => 'line',
    'stacked' => false,
    'horizontal' => false,
    'datetime' => false,
    'zoom' => false,
    'curve' => 'smooth',
    'max' => null,
    'format' => 'compact',
    'prefix' => '',
    'suffix' => '',
    'legend' => null,
    'renderer' => null,
    'options' => [],
    'label' => 'Chart',
])

@php
    $types = ['line', 'area', 'bar', 'scatter', 'pie', 'donut', 'funnel', 'radar', 'heatmap', 'candlestick'];
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked);
    $hasData = $chart['count'] > 0 && $chart['series'] !== [];
    $points = $chart['count'] * max(1, count($chart['series']));

    $payload = [
        'type' => in_array($type, $types, true) ? $type : 'line',
        'label' => $label,
        'stacked' => (bool) $stacked,
        'horizontal' => (bool) $horizontal,
        'datetime' => (bool) $datetime,
        'zoom' => (bool) $zoom,
        'curve' => $curve,
        // SVG net et thémable par défaut ; canvas au-delà de quelques milliers de points.
        'renderer' => $renderer ?? ($points > 2000 ? 'canvas' : 'svg'),
        'categories' => $chart['categories'],
        // Un index numérique (dépense, taille…) donne un vrai axe de valeurs au scatter.
        'numericIndex' => $chart['categories'] !== [] && array_filter($chart['categories'], fn (string $c): bool => ! is_numeric($c)) === [],
        'series' => $chart['series'],
        'values' => $chart['values'],
        'palette' => $chart['palette'],
        'scaleMax' => $chart['scale']['max'],
        'max' => is_numeric($max) ? (float) $max : null,
        'legend' => $legend,
        'format' => ['style' => $format, 'prefix' => $prefix, 'suffix' => $suffix],
        'options' => (array) $options,
    ];

    $userClass = (string) $attributes->get('class', '');
    $defaultSize = trim(
        (preg_match('/(^|\s)(h|size)-/', $userClass) ? '' : 'h-80 ')
        .(preg_match('/(^|\s)(w|size)-/', $userClass) ? '' : 'w-full')
    );
@endphp

<figure data-slot="echart" aria-label="{{ $label }}" x-data x-echart {{ $attributes->class('m-0 flex flex-col '.$defaultSize) }}>
    @if ($hasData)
        {{-- wire:ignore : ECharts possède ce nœud, Livewire ne doit pas le réécrire. --}}
        <div data-echart-canvas wire:ignore aria-hidden="true" class="relative min-h-0 w-full flex-1">
            <div class="absolute inset-0 animate-pulse rounded-ui bg-muted in-data-ready:hidden"></div>
        </div>

        {{-- @json échappe <, >, &, ' et " : le JSON ne peut pas refermer la balise. --}}
        <script type="application/json" data-echart-config>@json($payload)</script>

        {{-- Au-delà de 500 lignes, un tableau n'aide plus personne : on résume. --}}
        @if ($chart['count'] > 500)
            <p class="sr-only">
                {{ $label }}: {{ $chart['count'] }} values from {{ $chart['categories'][0] }} to {{ $chart['categories'][$chart['count'] - 1] }}.
            </p>
        @else
        {{-- sr-only sur un div : un <table> ignore height et overflow, il agrandirait la page. --}}
        <div class="sr-only">
            <table>
                <caption>{{ $label }}</caption>
                <thead>
                    <tr>
                        <th scope="col">{{ $index ? ucfirst($index) : 'Category' }}</th>
                        @foreach ($chart['series'] as $series)
                            <th scope="col">{{ $series['label'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chart['categories'] as $i => $category)
                        <tr>
                            <th scope="row">{{ $category }}</th>
                            @foreach ($chart['series'] as $series)
                                <td data-value="{{ $chart['values'][$series['key']][$i] }}">{{ \App\Flexiwind\ChartHelper::format($chart['values'][$series['key']][$i], $format, $prefix, $suffix) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    @else
        <p class="flex flex-1 items-center justify-center rounded-ui border border-dashed border-border text-sm text-muted-foreground">
            No data to display
        </p>
    @endif
</figure>
