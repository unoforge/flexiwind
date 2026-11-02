@php
    $revenue = [
        ['month' => 'Jan', 'revenue' => 12400],
        ['month' => 'Feb', 'revenue' => 13900],
        ['month' => 'Mar', 'revenue' => 11800],
        ['month' => 'Apr', 'revenue' => 16200],
        ['month' => 'May', 'revenue' => 17800],
        ['month' => 'Jun', 'revenue' => 19400],
    ];
@endphp

<x-ui.echart type="bar" :data="$revenue" index="month" prefix="€" label="Monthly revenue" class="h-72 w-full"
    :config="['revenue' => ['label' => 'Revenue']]" />
