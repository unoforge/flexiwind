{{--
    Une rangée de blocs, un par période : disponibilité, statut de jobs,
    présence. Chaque bloc a un statut (couleur) et une infobulle.

    <x-ui.tracker :data="[
        ['status' => 'ok', 'tooltip' => 'Sep 1 — 100% uptime'],
        ['status' => 'error', 'tooltip' => 'Sep 2 — 42 min down'],
    ]" />

    Statuts par défaut : ok, warning, error, empty. `colors` les remplace
    ou en ajoute ; un bloc peut aussi porter sa propre `color`.
--}}
@props([
    'data' => [],
    'colors' => [],
    'label' => 'Status history',
])

@php
    $palette = array_merge([
        'ok' => 'var(--success)',
        'warning' => 'var(--warning)',
        'error' => 'var(--destructive)',
        'empty' => 'var(--muted)',
    ], (array) $colors);

    $items = [];
    foreach ($data as $item) {
        $item = (array) $item;
        $status = (string) ($item['status'] ?? 'empty');
        $items[] = [
            'color' => \App\Flexiwind\ChartHelper::color($item['color'] ?? $palette[$status] ?? $palette['empty'], 0),
            'tooltip' => $item['tooltip'] ?? null,
        ];
    }

    $count = count($items);
@endphp

<ul aria-label="{{ $label }}" data-slot="tracker" {{ $attributes->class('flex h-8 w-full gap-0.5') }}>
    @foreach ($items as $i => $item)
        <li class="group relative flex-1 first:rounded-s-[calc(var(--radius-ui)*0.75)] last:rounded-e-[calc(var(--radius-ui)*0.75)] rounded-[2px] transition-opacity hover:opacity-75"
            style="background: {{ $item['color'] }}">
            @if ($item['tooltip'])
                <span class="sr-only">{{ $item['tooltip'] }}</span>
                <span aria-hidden="true" @class([
                    'pointer-events-none invisible absolute bottom-full z-10 mb-2 rounded-ui border border-border bg-background px-2 py-1 text-xs whitespace-nowrap text-foreground opacity-0 shadow-md transition-opacity group-hover:visible group-hover:opacity-100',
                    'left-0' => $i < $count * 0.2,
                    'right-0' => $i >= $count * 0.8,
                    'left-1/2 -translate-x-1/2' => $i >= $count * 0.2 && $i < $count * 0.8,
                ])>{{ $item['tooltip'] }}</span>
            @endif
        </li>
    @endforeach
</ul>
