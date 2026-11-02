@php
    $steps = [
        ['step' => 'Visited pricing', 'people' => 12400],
        ['step' => 'Started checkout', 'people' => 3900],
        ['step' => 'Entered payment', 'people' => 2100],
        ['step' => 'Paid', 'people' => 1650],
    ];
@endphp

<x-ui.echart type="funnel" :data="$steps" index="step" label="Checkout funnel" class="h-72 w-full max-w-lg" />
