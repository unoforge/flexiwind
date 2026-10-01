@php
    $visitors = [
        ['month' => 'Jan', 'desktop' => 186, 'mobile' => 80],
        ['month' => 'Feb', 'desktop' => 305, 'mobile' => 200],
        ['month' => 'Mar', 'desktop' => 237, 'mobile' => 120],
        ['month' => 'Apr', 'desktop' => 73, 'mobile' => 190],
        ['month' => 'May', 'desktop' => 209, 'mobile' => 130],
        ['month' => 'Jun', 'desktop' => 214, 'mobile' => 140],
    ];
@endphp

<div class="w-full max-w-xl rounded-xl border border-border bg-background p-5">
    <p class="font-medium text-foreground">Monthly visitors</p>
    <p class="text-sm text-muted-foreground">January – June 2026</p>

    <x-ui.chart :data="$visitors" index="month" label="Monthly visitors" class="mt-5 h-64" :config="[
        'desktop' => ['label' => 'Desktop', 'color' => 'var(--chart-1)'],
        'mobile' => ['label' => 'Mobile', 'color' => 'var(--chart-2)'],
    ]" />
</div>
