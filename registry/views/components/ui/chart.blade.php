{{--
    Chart Flexiwind : SVG et HTML rendus par Blade, sans librairie JavaScript.

    Le plugin resources/js/plugins/chart.js remplit l'infobulle au survol.
    `interactive` y ajoute le clavier et la légende cliquable.
    `brush` (qui implique `interactive`) permet de sélectionner une plage de
    catégories : le chart émet alors l'événement DOM `chart-range`.

    Sans contenu, le composant dessine un chart complet selon `type` :
    bar (avec `horizontal`), line, area, pie, donut ou radial.
    Avec contenu, il sert de cadre et chaque calque se pose dans la même
    cellule de grille, dans l'ordre d'écriture :

    <x-ui.chart :data="$data" :config="$config" index="month">
        <x-ui.chart.grid />
        <x-ui.chart.y-axis />
        <x-ui.chart.x-axis />
        <x-ui.chart.bar />
        <x-ui.chart.tooltip />
    </x-ui.chart>
--}}
@props([
    'data' => [],
    'config' => [],
    'index' => null,
    'type' => 'bar',
    'stacked' => false,
    'horizontal' => false,
    'min' => null,
    'max' => null,
    'format' => 'compact',
    'prefix' => '',
    'suffix' => '',
    'curve' => 'smooth',
    'label' => 'Chart',
    'legend' => null,
    'interactive' => false,
    'brush' => false,
])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    $hasData = $chart['count'] > 0 && $chart['series'] !== [];
    // Pie, donut et radial colorent les catégories : la légende les liste.
    $byCategory = in_array($type, ['pie', 'donut', 'radial'], true);
    $firstKey = $chart['series'][0]['key'] ?? null;
    $legendItems = $chart['series'];
    if ($byCategory) {
        $legendItems = [];
        foreach ($chart['palette'] as $i => $entry) {
            $legendItems[] = $entry + ['value' => $firstKey === null ? null : $chart['values'][$firstKey][$i]];
        }
    }
    $showLegend = $legend ?? count($legendItems) > 1;

    // Taille par défaut, sauf si la classe passée en donne une : sans
    // fusion de classes, `h-64` et `h-32` coexisteraient et l'ordre de la
    // feuille de style trancherait, pas l'intention.
    $userClass = (string) $attributes->get('class', '');
    $defaultSize = trim(
        (preg_match('/(^|\s)(h|size)-/', $userClass) ? '' : 'h-64 ')
        .(preg_match('/(^|\s)(w|size)-/', $userClass) ? '' : 'w-full')
    );
@endphp

@php
    // Pie, donut et radial n'ont pas de catégories à parcourir au clavier.
    $isInteractive = ((bool) $interactive || (bool) $brush) && $hasData;
    $canNavigate = $isInteractive && ! $byCategory;
    $hintId = $canNavigate ? 'chart-hint-'.substr(md5($label.serialize($chart['categories'])), 0, 8) : null;
@endphp

<figure data-slot="chart" aria-label="{{ $label }}"
    @if ($canNavigate) data-chart-interactive tabindex="0" aria-describedby="{{ $hintId }}" @endif
    @if ($canNavigate && $brush) data-chart-brush @endif
    {{ $attributes->class([
        'm-0 flex flex-col gap-4 '.$defaultSize,
        'rounded-ui outline-none focus-visible:ring-2 focus-visible:ring-ring/60 focus-visible:ring-offset-4 focus-visible:ring-offset-background' => $canNavigate,
    ]) }}>
    <div data-slot="chart-plot" class="grid min-h-0 flex-1 grid-cols-[auto_minmax(0,1fr)] grid-rows-[minmax(0,1fr)_auto]">
        @if (! $hasData)
            <p class="col-start-2 row-start-1 flex items-center justify-center rounded-ui border border-dashed border-border text-sm text-muted-foreground">
                No data to display
            </p>
        @elseif ($slot->isEmpty())
            @if ($type === 'pie' || $type === 'donut')
                <x-ui.chart.pie />
            @elseif ($type === 'radial')
                <x-ui.chart.radial />
            @else
                <x-ui.chart.grid />
                <x-ui.chart.y-axis />
                <x-ui.chart.x-axis />
                @if ($type === 'bar')
                    <x-ui.chart.bar />
                @else
                    <x-ui.chart.line :area="$type === 'area'" :curve="$curve" />
                @endif
                <x-ui.chart.tooltip />
            @endif
        @else
            {{ $slot }}
        @endif
    </div>

    @if ($hasData && $showLegend)
        <ul data-slot="chart-legend" @unless ($canNavigate) aria-hidden="true" @endunless class="flex flex-wrap items-center justify-center gap-x-4 gap-y-1.5 text-sm text-muted-foreground">
            @foreach ($legendItems as $item)
                <li class="flex items-center gap-1.5">
                    @if ($canNavigate)
                        {{-- Bouton : le plugin masque ou affiche la série. --}}
                        <button type="button" data-chart-toggle="{{ $item['key'] }}" aria-pressed="true"
                            class="flex cursor-pointer items-center gap-1.5 rounded-[calc(var(--radius-ui)-var(--spacing))] px-1 py-0.5 transition-opacity hover:text-foreground focus-visible:ring-2 focus-visible:ring-ring/60 focus-visible:outline-none aria-[pressed=false]:opacity-40 aria-[pressed=false]:line-through">
                            <span class="size-2.5 shrink-0 rounded-[3px]" style="background: {{ $item['color'] }}"></span>
                            {{ $item['label'] }}
                        </button>
                    @else
                        <span class="size-2.5 shrink-0 rounded-[3px]" style="background: {{ $item['color'] }}"></span>
                        {{ $item['label'] }}
                        @if ($byCategory && ($item['value'] ?? null) !== null)
                            <span class="font-medium text-foreground tabular-nums">{{ \App\Flexiwind\ChartHelper::format($item['value'], $format, $prefix, $suffix) }}</span>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    @if ($canNavigate)
        <p id="{{ $hintId }}" class="sr-only">
            Use the arrow keys to read each value.@if ($brush) Hold Shift with the arrow keys to select a range, then press Enter.@endif
        </p>
        <p data-chart-live aria-live="polite" class="sr-only"></p>
    @endif

    @if ($hasData)
        {{-- Les calques visuels sont masqués aux lecteurs d'écran : ils lisent ce tableau. --}}
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
</figure>
