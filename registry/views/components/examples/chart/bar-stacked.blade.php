@php
    $signups = [
        ['week' => 'W1', 'organic' => 120, 'referral' => 45, 'paid' => 30],
        ['week' => 'W2', 'organic' => 132, 'referral' => 60, 'paid' => 42],
        ['week' => 'W3', 'organic' => 101, 'referral' => 72, 'paid' => 55],
        ['week' => 'W4', 'organic' => 154, 'referral' => 66, 'paid' => 48],
        ['week' => 'W5', 'organic' => 190, 'referral' => 81, 'paid' => 62],
        ['week' => 'W6', 'organic' => 176, 'referral' => 94, 'paid' => 70],
    ];
@endphp

<x-ui.chart :data="$signups" index="week" stacked label="Weekly sign-ups by channel" class="h-64 w-full max-w-xl" :config="[
    'organic' => ['label' => 'Organic'],
    'referral' => ['label' => 'Referral'],
    'paid' => ['label' => 'Paid'],
]" />
