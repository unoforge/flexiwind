<div class="flex flex-wrap items-center justify-center gap-8">
    <x-ui.chart type="radial" :data="[['metric' => 'Storage used', 'gb' => 38]]" index="metric" max="50" suffix=" GB"
        label="Storage used" class="h-44 w-44" :config="['Storage used' => ['color' => 'var(--chart-1)']]" />

    <x-ui.chart type="radial" :data="[['metric' => 'Score', 'value' => 78]]" index="metric" label="Performance score" class="h-32 w-56"
        :config="['Score' => ['color' => 'var(--success)']]">
        <x-ui.chart.radial half :thickness="0.18">
            <span class="text-2xl font-semibold tracking-tight text-foreground">78</span>
            <span class="text-xs text-muted-foreground">Performance</span>
        </x-ui.chart.radial>
    </x-ui.chart>
</div>
