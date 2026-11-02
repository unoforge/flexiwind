{{--
    Infobulle : un seul panneau par chart, quel que soit le nombre de
    catégories. Le plugin resources/js/plugins/chart.js trouve la catégorie
    sous le pointeur, lit ses valeurs dans le tableau de données du chart et
    remplit le panneau. Posez ce calque en dernier : il reçoit le survol.
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'horizontal' => false, 'brush' => false])
@props(['cursor' => true])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, (bool) $stacked, $min, $max);
    $layout = $type === 'bar' || $horizontal ? 'band' : 'point';
@endphp

<div data-slot="chart-tooltip" aria-hidden="true"
    data-count="{{ $chart['count'] }}" data-layout="{{ $layout }}" data-scale-min="{{ $chart['scale']['min'] }}" data-scale-max="{{ $chart['scale']['max'] }}"
    @if ($horizontal) data-horizontal @endif
    @if ($cursor) data-cursor @endif
    {{ $attributes->class([
        'group/tooltip relative z-10 col-start-2 row-start-1',
        // Glisser horizontalement sélectionne ; le défilement vertical reste au navigateur.
        'cursor-crosshair touch-pan-y select-none' => $brush,
    ]) }}>
    @if ($brush)
        <div data-chart-brush-overlay hidden @class([
            'pointer-events-none absolute rounded-[calc(var(--radius-ui)-var(--spacing)*0.5)] bg-primary/12 ring-1 ring-primary/50 ring-inset',
            'inset-x-0' => $horizontal,
            'inset-y-0' => ! $horizontal,
        ])></div>
    @endif

    @if ($cursor)
        <span data-chart-cursor @class([
            'pointer-events-none absolute opacity-0 transition-opacity group-data-open/tooltip:opacity-100',
            'inset-x-0 rounded-[calc(var(--radius-ui)-var(--spacing)*0.5)] bg-foreground/5' => $layout === 'band' && $horizontal,
            'inset-y-0 rounded-[calc(var(--radius-ui)-var(--spacing)*0.5)] bg-foreground/5' => $layout === 'band' && ! $horizontal,
            'inset-y-0 w-px bg-border-strong' => $layout === 'point',
        ])></span>
        @if ($layout === 'point')
            @foreach ($chart['series'] as $item)
                <span data-chart-dot data-series="{{ $item['key'] }}"
                    class="pointer-events-none absolute size-2.5 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-background opacity-0 shadow-sm transition-opacity group-data-open/tooltip:opacity-100"
                    style="background: {{ $item['color'] }}"></span>
            @endforeach
        @endif
    @endif

    <div data-chart-panel @class([
        'pointer-events-none invisible absolute min-w-36 rounded-ui border border-border bg-background px-3 py-2 text-xs opacity-0 shadow-lg transition-opacity group-data-open/tooltip:visible group-data-open/tooltip:opacity-100',
        '-translate-y-1/2' => $horizontal,
        'top-1' => ! $horizontal,
    ])>
        <p data-chart-title class="mb-1.5 font-medium whitespace-nowrap text-foreground"></p>
        <ul class="flex flex-col gap-1">
            @foreach ($chart['series'] as $item)
                <li data-series="{{ $item['key'] }}" class="flex items-center justify-between gap-4 whitespace-nowrap">
                    <span class="flex items-center gap-1.5 text-muted-foreground">
                        <span class="size-2 rounded-[2px]" style="background: {{ $item['color'] }}"></span>
                        {{ $item['label'] }}
                    </span>
                    <span data-chart-value class="font-mono font-medium text-foreground tabular-nums"></span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
