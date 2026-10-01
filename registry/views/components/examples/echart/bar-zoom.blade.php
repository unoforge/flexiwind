@php
    // Six months of daily orders on a time axis: zoom in on any week.
    $days = collect(range(0, 181))->map(fn (int $i) => [
        'date' => now()->subDays(182 - $i)->format('Y-m-d'),
        'orders' => (int) round(60 + $i * 0.3 + 22 * sin($i / 7) + ($i % 7 === 5 ? 35 : 0)),
    ])->all();
@endphp

<x-ui.echart type="bar" datetime zoom :data="$days" index="date" label="Daily orders" class="h-80 w-full"
    :config="['orders' => ['label' => 'Orders']]" />
