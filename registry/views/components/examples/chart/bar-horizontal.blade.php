@php
    $pages = [
        ['page' => '/pricing', 'views' => 4820],
        ['page' => '/docs/installation', 'views' => 3960],
        ['page' => '/blocks', 'views' => 3120],
        ['page' => '/components/button', 'views' => 2270],
        ['page' => '/changelog', 'views' => 1480],
    ];
@endphp

<x-ui.chart horizontal :data="$pages" index="page" label="Most viewed pages" class="h-72 w-full max-w-xl" :config="[
    'views' => ['label' => 'Views', 'color' => 'var(--chart-1)'],
]" />
