@php
    $renewals = [
        ['status' => 'Renewed', 'accounts' => 312],
        ['status' => 'Churned', 'accounts' => 58],
        ['status' => 'Pending', 'accounts' => 64],
    ];
@endphp

<x-ui.chart type="donut" :data="$renewals" index="status" label="Renewals this quarter" :legend="true" class="h-64 w-full max-w-sm" :config="[
    'Renewed' => ['color' => 'var(--success)'],
    'Churned' => ['color' => 'var(--destructive)'],
    'Pending' => ['color' => 'var(--muted-foreground)'],
]">
    <x-ui.chart.pie :inner="0.72">
        <span class="text-3xl font-semibold tracking-tight text-foreground">72%</span>
        <span class="text-xs text-muted-foreground">renewed</span>
    </x-ui.chart.pie>
</x-ui.chart>
