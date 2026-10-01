{{--
    Pie, ou donut avec `inner` (rayon intérieur, 0 à 0.9). Une part par
    catégorie, colorée par `config` sur le nom de la catégorie. Le slot remplit
    le centre d'un donut ; sans slot, il affiche le total.
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['inner' => null, 'series' => null, 'centerLabel' => 'Total'])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, false, null, null);
    $radius = (float) ($inner ?? ($type === 'donut' ? 0.62 : 0));
    $slices = \App\Flexiwind\ChartHelper::slices($chart, $series, $radius);
    $total = array_sum(array_column($slices, 'value'));
@endphp

<div data-slot="chart-pie" {{ $attributes->class('relative col-span-2 col-start-1 row-span-2 row-start-1 flex min-h-0 items-center justify-center') }}>
    <div class="relative aspect-square h-full max-w-full">
        <svg viewBox="-1.02 -1.02 2.04 2.04" aria-hidden="true" class="group/pie size-full overflow-visible">
            @foreach ($slices as $slice)
                <path d="{{ $slice['path'] }}" stroke-width="0.02" stroke-linejoin="round"
                    class="stroke-background transition-opacity duration-200 group-hover/pie:not-hover:opacity-35"
                    style="fill: {{ $slice['color'] }}">
                    <title>{{ $slice['label'] }}: {{ \App\Flexiwind\ChartHelper::format($slice['value'], $format, $prefix, $suffix) }} ({{ $slice['percent'] }}%)</title>
                </path>
            @endforeach
        </svg>

        @if ($radius > 0)
            <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center text-center">
                @if ($slot->isNotEmpty())
                    {{ $slot }}
                @else
                    <span class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">{{ \App\Flexiwind\ChartHelper::format($total, $format, $prefix, $suffix) }}</span>
                    <span class="text-xs text-muted-foreground">{{ $centerLabel }}</span>
                @endif
            </div>
        @endif
    </div>
</div>
