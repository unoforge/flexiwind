@php
    $traffic = [
        ['month' => 'Jan', 'desktop' => 186, 'mobile' => 80],
        ['month' => 'Feb', 'desktop' => 305, 'mobile' => 200],
        ['month' => 'Mar', 'desktop' => 237, 'mobile' => 120],
        ['month' => 'Apr', 'desktop' => 73, 'mobile' => 190],
        ['month' => 'May', 'desktop' => 209, 'mobile' => 130],
        ['month' => 'Jun', 'desktop' => 214, 'mobile' => 140],
    ];
@endphp

<x-ui.echart type="line" :data="$traffic" index="month" label="Traffic by device" class="h-72 w-full" :config="[
    'desktop' => ['label' => 'Desktop'],
    'mobile' => ['label' => 'Mobile'],
]" />
