@php
    $regions = [
        ['region' => 'Europe', 'solo' => 412, 'lifetime' => 268, 'team' => 96],
        ['region' => 'North America', 'solo' => 380, 'lifetime' => 301, 'team' => 122],
        ['region' => 'Africa', 'solo' => 214, 'lifetime' => 96, 'team' => 31],
        ['region' => 'Asia', 'solo' => 290, 'lifetime' => 174, 'team' => 58],
        ['region' => 'South America', 'solo' => 132, 'lifetime' => 71, 'team' => 19],
    ];
@endphp

<x-ui.echart type="bar" horizontal stacked :data="$regions" index="region" label="Customers by region and plan" class="h-80 w-full" :config="[
    'solo' => ['label' => 'Solo'],
    'lifetime' => ['label' => 'Solo Lifetime'],
    'team' => ['label' => 'Team Lifetime'],
]" />
