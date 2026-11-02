{{--
    Graduations de l'axe vertical. La colonne prend la largeur du plus long
    libellé grâce à des copies invisibles dans le flux : rien à régler.
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    // Horizontal : l'axe vertical porte les catégories, pas les valeurs.
    $ticks = $horizontal
        ? array_map(fn (string $category, int $i): array => [
            'label' => $category,
            'top' => \App\Flexiwind\ChartHelper::x($i, $chart['count'], 'band'),
        ], $chart['categories'], array_keys($chart['categories']))
        : array_map(fn (float $tick): array => [
            'label' => \App\Flexiwind\ChartHelper::format($tick, $format, $prefix, $suffix),
            'top' => \App\Flexiwind\ChartHelper::y($tick, $chart['scale']),
        ], $chart['scale']['ticks']);
@endphp

<div data-slot="chart-y-axis" aria-hidden="true" {{ $attributes->class('relative col-start-1 row-start-1 pr-3 text-xs leading-none text-muted-foreground tabular-nums') }}>
    @foreach ($ticks as $tick)
        <span class="invisible block h-0 max-w-32 truncate whitespace-nowrap">{{ $tick['label'] }}</span>
    @endforeach
    @foreach ($ticks as $tick)
        <span class="absolute right-3 max-w-32 -translate-y-1/2 truncate whitespace-nowrap" style="top: {{ $tick['top'] }}%">{{ $tick['label'] }}</span>
    @endforeach
</div>
