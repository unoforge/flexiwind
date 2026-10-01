@php
    $browsers = [
        ['browser' => 'chrome', 'visitors' => 275],
        ['browser' => 'safari', 'visitors' => 200],
        ['browser' => 'firefox', 'visitors' => 187],
        ['browser' => 'edge', 'visitors' => 173],
        ['browser' => 'other', 'visitors' => 90],
    ];
@endphp

{{-- For a pie, `config` is keyed by category: each slice gets its label and color. --}}
<x-ui.chart type="pie" :data="$browsers" index="browser" label="Visitors by browser" class="h-72 w-full max-w-sm" :config="[
    'chrome' => ['label' => 'Chrome', 'color' => 'var(--chart-1)'],
    'safari' => ['label' => 'Safari', 'color' => 'var(--chart-2)'],
    'firefox' => ['label' => 'Firefox', 'color' => 'var(--chart-3)'],
    'edge' => ['label' => 'Edge', 'color' => 'var(--chart-4)'],
    'other' => ['label' => 'Other', 'color' => 'var(--chart-5)'],
]" />
