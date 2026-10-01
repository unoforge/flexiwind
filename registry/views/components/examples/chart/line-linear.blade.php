@php
    $uptime = [
        ['day' => 'Mon', 'latency' => 182],
        ['day' => 'Tue', 'latency' => 195],
        ['day' => 'Wed', 'latency' => 240],
        ['day' => 'Thu', 'latency' => null],
        ['day' => 'Fri', 'latency' => 176],
        ['day' => 'Sat', 'latency' => 158],
        ['day' => 'Sun', 'latency' => 164],
    ];
@endphp

{{-- `null` breaks the line: no value is made up for Thursday. --}}
<x-ui.chart type="line" curve="linear" :data="$uptime" index="day" suffix=" ms" format="number" label="API latency" class="h-56 w-full max-w-xl" :config="[
    'latency' => ['label' => 'p95 latency', 'color' => 'var(--chart-2)'],
]" />
