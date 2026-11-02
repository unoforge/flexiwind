@php
    // A numeric index gives the chart a real value axis.
    $campaigns = collect(range(1, 24))->map(fn (int $i) => [
        'spend' => $i * 250,
        'signups' => (int) round($i * 18 + 40 * sin($i * 1.7) + 30),
    ])->all();
@endphp

<x-ui.echart type="scatter" :data="$campaigns" index="spend" label="Ad spend against sign-ups" class="h-72 w-full"
    :config="['signups' => ['label' => 'Sign-ups']]" />
