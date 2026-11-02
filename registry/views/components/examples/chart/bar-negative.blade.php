@php
    $cashflow = [
        ['month' => 'Jan', 'net' => 4200],
        ['month' => 'Feb', 'net' => -1800],
        ['month' => 'Mar', 'net' => 2600],
        ['month' => 'Apr', 'net' => -3100],
        ['month' => 'May', 'net' => 5400],
        ['month' => 'Jun', 'net' => 1200],
    ];
@endphp

<x-ui.chart :data="$cashflow" index="month" prefix="€" label="Net cash flow" class="h-64 w-full max-w-xl" :config="[
    'net' => ['label' => 'Net cash flow', 'color' => 'var(--chart-3)'],
]" />
