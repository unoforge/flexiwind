@php
    // 10,000 points: rendered on canvas, sampled so the line keeps its shape.
    $readings = collect(range(0, 9999))->map(fn (int $i) => [
        'at' => date('Y-m-d\TH:i', 1790000000 + $i * 60),
        'load' => round(40 + 18 * sin($i / 180) + 9 * sin($i / 23) + ($i % 997 === 0 ? 30 : 0), 1),
    ])->all();
@endphp

<x-ui.echart type="line" datetime zoom :data="$readings" index="at" suffix="%" format="number" label="CPU load, last 7 days"
    class="h-80 w-full" :config="['load' => ['label' => 'CPU load']]" />
