@php
    $plans = [
        ['plan' => 'Solo', 'customers' => 412],
        ['plan' => 'Solo Lifetime', 'customers' => 268],
        ['plan' => 'Team Lifetime', 'customers' => 96],
    ];
@endphp

<x-ui.chart type="donut" :data="$plans" index="plan" label="Customers by plan" class="h-72 w-full max-w-sm" />
