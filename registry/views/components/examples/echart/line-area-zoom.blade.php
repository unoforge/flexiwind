@php
    // One year of daily sessions. In an app: a query grouped by day.
    $days = collect(range(0, 364))->map(fn (int $i) => [
        'date' => now()->startOfYear()->addDays($i)->format('Y-m-d'),
        'sessions' => (int) round(1400 + $i * 2.4 + sin($i / 14) * 220 + sin($i / 3.1) * 60),
    ])->all();
@endphp

<x-ui.echart type="area" datetime zoom :data="$days" index="date" label="Daily sessions" class="h-80 w-full"
    :config="['sessions' => ['label' => 'Sessions']]" />
