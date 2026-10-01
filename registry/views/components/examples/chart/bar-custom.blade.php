@php
    $revenue = [
        ['month' => 'Jan', 'revenue' => 12400, 'target' => 11000],
        ['month' => 'Feb', 'revenue' => 13900, 'target' => 12000],
        ['month' => 'Mar', 'revenue' => 11800, 'target' => 13000],
        ['month' => 'Apr', 'revenue' => 16200, 'target' => 14000],
        ['month' => 'May', 'revenue' => 17800, 'target' => 15000],
        ['month' => 'Jun', 'revenue' => 19400, 'target' => 16000],
    ];
@endphp

<x-ui.chart :data="$revenue" index="month" prefix="€" label="Revenue against target" class="h-64 w-full max-w-xl" :config="[
    'revenue' => ['label' => 'Revenue', 'color' => 'var(--chart-1)'],
    'target' => ['label' => 'Target', 'color' => 'var(--chart-2)'],
]">
    <x-ui.chart.grid />
    <x-ui.chart.y-axis class="text-[11px]" />
    <x-ui.chart.x-axis />
    <x-ui.chart.bar only="revenue" :radius="8" :gap="0.45" />
    <x-ui.chart.line only="target" curve="linear" :dots="false" :stroke-width="2.5" />
    <x-ui.chart.tooltip />
</x-ui.chart>
