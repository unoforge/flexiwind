@php
    $cards = [
        ['label' => 'Revenue', 'value' => '€48.2k', 'change' => '+12.4%', 'up' => true, 'type' => 'area', 'color' => 'var(--chart-1)',
            'data' => [18, 22, 19, 27, 25, 31, 29, 36, 34, 41, 39, 48]],
        ['label' => 'Active users', 'value' => '3,184', 'change' => '+4.1%', 'up' => true, 'type' => 'line', 'color' => 'var(--chart-2)',
            'data' => [2810, 2890, 2860, 2950, 3010, 2980, 3070, 3120, 3090, 3150, 3184]],
        ['label' => 'Refunds', 'value' => '23', 'change' => '-8.0%', 'up' => false, 'type' => 'bar', 'color' => 'var(--chart-3)',
            'data' => [6, 4, 7, 3, 5, 2, 4, 3, 5, 2, 3, 1]],
    ];
@endphp

<div class="grid w-full gap-4 sm:grid-cols-3">
    @foreach ($cards as $card)
        <div class="rounded-xl border border-border bg-background p-4">
            <p class="text-sm text-muted-foreground">{{ $card['label'] }}</p>
            <div class="mt-2 flex items-end justify-between gap-3">
                <div>
                    <p class="text-2xl font-semibold tracking-tight text-foreground">{{ $card['value'] }}</p>
                    <p @class(['text-xs font-medium', 'text-success' => $card['up'], 'text-destructive' => ! $card['up']])>{{ $card['change'] }}</p>
                </div>
                <x-ui.sparkline :data="$card['data']" :type="$card['type']" :color="$card['color']" :label="$card['label']" class="h-10 w-24" />
            </div>
        </div>
    @endforeach
</div>
