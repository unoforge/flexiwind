@php
    $storage = [
        ['kind' => 'Images', 'gb' => 38.2],
        ['kind' => 'Videos', 'gb' => 21.7],
        ['kind' => 'Documents', 'gb' => 9.4],
        ['kind' => 'Archives', 'gb' => 6.1],
    ];
@endphp

{{-- `options` reaches anything ECharts supports: here, the legend moves to the right. --}}
<x-ui.echart type="donut" :data="$storage" index="kind" suffix=" GB" format="number" label="Storage by file type" class="h-72 w-full max-w-lg" :options="[
    'legend' => ['orient' => 'vertical', 'right' => 0, 'top' => 'middle', 'bottom' => null],
    'series' => [['center' => ['38%', '50%']]],
]" />
