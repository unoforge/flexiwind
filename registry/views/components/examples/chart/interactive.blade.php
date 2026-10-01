@php
    $revenue = [
        ['month' => 'Jan', 'subscriptions' => 12400, 'services' => 5200, 'licenses' => 3100],
        ['month' => 'Feb', 'subscriptions' => 13900, 'services' => 4800, 'licenses' => 3600],
        ['month' => 'Mar', 'subscriptions' => 11800, 'services' => 6100, 'licenses' => 2900],
        ['month' => 'Apr', 'subscriptions' => 16200, 'services' => 5600, 'licenses' => 4200],
        ['month' => 'May', 'subscriptions' => 17800, 'services' => 7300, 'licenses' => 3900],
        ['month' => 'Jun', 'subscriptions' => 19400, 'services' => 6900, 'licenses' => 4800],
    ];
@endphp

<div class="w-full max-w-xl rounded-xl border border-border bg-background p-5">
    <div class="flex items-start justify-between gap-4">
        <div>
            <p class="font-medium text-foreground">Revenue by stream</p>
            <p class="text-sm text-muted-foreground">Tab into the chart, then use the arrow keys.</p>
        </div>
        <x-ui.button variant="outline" intent="gray" size="sm" data-chart-export="#revenue-streams" data-chart-filename="revenue.csv">
            Export CSV
        </x-ui.button>
    </div>

    <x-ui.chart id="revenue-streams" interactive stacked :data="$revenue" index="month" prefix="€" label="Revenue by stream"
        class="mt-5 h-64" :config="[
            'subscriptions' => ['label' => 'Subscriptions', 'color' => 'var(--chart-1)'],
            'services' => ['label' => 'Services', 'color' => 'var(--chart-2)'],
            'licenses' => ['label' => 'Licenses', 'color' => 'var(--chart-4)'],
        ]" />
</div>
