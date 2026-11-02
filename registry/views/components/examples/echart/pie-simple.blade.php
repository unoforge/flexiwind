@php
    $browsers = [
        ['browser' => 'Chrome', 'visitors' => 275],
        ['browser' => 'Safari', 'visitors' => 200],
        ['browser' => 'Firefox', 'visitors' => 187],
        ['browser' => 'Edge', 'visitors' => 173],
        ['browser' => 'Other', 'visitors' => 90],
    ];
@endphp

<x-ui.echart type="pie" :data="$browsers" index="browser" label="Visitors by browser" class="h-72 w-full max-w-md" />
