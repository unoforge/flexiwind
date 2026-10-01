@php
    $downloads = collect(range(1, 12))->map(fn (int $month) => [
        'month' => date('M', mktime(0, 0, 0, $month, 1)),
        'free' => 1800 + $month * 420 + ($month % 3) * 260,
        'pro' => 300 + $month * 190 + ($month % 4) * 120,
    ])->all();
@endphp

<x-ui.chart type="area" :data="$downloads" index="month" label="Downloads per month" class="h-64 w-full max-w-xl" :config="[
    'free' => ['label' => 'Free', 'color' => 'var(--chart-1)'],
    'pro' => ['label' => 'Pro', 'color' => 'var(--chart-2)'],
]" />
