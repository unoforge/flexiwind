{{--
    Anneaux de progression : une catégorie par anneau, de l'extérieur vers
    l'intérieur. La valeur se lit sur `max` (100 par défaut). `half` en
    fait une jauge en demi-cercle. Le slot remplit le centre.
--}}
@aware(['data' => [], 'config' => [], 'index' => null, 'type' => 'bar', 'stacked' => false, 'min' => null, 'max' => null, 'format' => 'compact', 'prefix' => '', 'suffix' => '', 'horizontal' => false])
@props(['thickness' => 0.14, 'gap' => 0.05, 'half' => false, 'series' => null, 'track' => true])

@php
    $chart = \App\Flexiwind\ChartHelper::make($data, $config, $index, false, null, null);
    $thick = min(0.5, max(0.02, (float) $thickness));
    $rings = \App\Flexiwind\ChartHelper::rings($chart, is_numeric($max) ? (float) $max : 100.0, $thick, (float) $gap, $series);
    $first = $rings[0] ?? null;
@endphp

<div data-slot="chart-radial" {{ $attributes->class('relative col-span-2 col-start-1 row-span-2 row-start-1 flex min-h-0 items-center justify-center') }}>
    <div @class(['relative h-full max-w-full', 'aspect-square' => ! $half, 'aspect-[2/1.08]' => $half])>
        <svg viewBox="{{ $half ? '-1 -1 2 1.08' : '-1 -1 2 2' }}" aria-hidden="true" class="size-full overflow-visible">
            @foreach ($rings as $ring)
                @if ($track)
                    <circle r="{{ $ring['radius'] }}" cx="0" cy="0" fill="none" pathLength="100" stroke-width="{{ $thick }}"
                        stroke-dasharray="{{ $half ? '50 100' : '100 0' }}" transform="rotate({{ $half ? 180 : -90 }})" stroke-linecap="round"
                        style="stroke: color-mix(in oklab, {{ $ring['color'] }} 16%, transparent)"></circle>
                @endif
                @if ($ring['percent'] > 0)
                    <circle r="{{ $ring['radius'] }}" cx="0" cy="0" fill="none" pathLength="100" stroke-width="{{ $thick }}"
                        stroke-dasharray="{{ $half ? $ring['percent'] / 2 : $ring['percent'] }} 100" transform="rotate({{ $half ? 180 : -90 }})" stroke-linecap="round"
                        class="transition-[stroke-dasharray] duration-700 ease-out" style="stroke: {{ $ring['color'] }}">
                        <title>{{ $ring['label'] }}: {{ \App\Flexiwind\ChartHelper::format($ring['value'], $format, $prefix, $suffix) }}</title>
                    </circle>
                @endif
            @endforeach
        </svg>

        <div @class(['pointer-events-none absolute inset-0 flex flex-col items-center text-center', 'justify-center' => ! $half, 'justify-end pb-1' => $half])>
            @if ($slot->isNotEmpty())
                {{ $slot }}
            @elseif (count($rings) === 1 && $first)
                <span class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">{{ \App\Flexiwind\ChartHelper::format($first['value'], $format, $prefix, $suffix) }}</span>
                <span class="text-xs text-muted-foreground">{{ $first['label'] }}</span>
            @endif
        </div>
    </div>
</div>
