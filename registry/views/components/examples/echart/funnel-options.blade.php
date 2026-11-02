@php
    $onboarding = [
        ['step' => 'Signed up', 'users' => 5200],
        ['step' => 'Created a token', 'users' => 3100],
        ['step' => 'Installed a component', 'users' => 2450],
        ['step' => 'Installed a Pro block', 'users' => 890],
    ];
@endphp

{{-- Labels inside the steps, values shown: all through `options`. --}}
<x-ui.echart type="funnel" :legend="false" :data="$onboarding" index="step" label="Onboarding funnel" class="h-80 w-full max-w-lg" :options="[
    'series' => [[
        'label' => ['position' => 'inside', 'formatter' => '{b}: {c}', 'color' => '#fff', 'fontWeight' => 500],
        'minSize' => '20%',
    ]],
]" />
