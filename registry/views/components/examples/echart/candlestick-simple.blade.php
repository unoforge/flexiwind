@php
    $week = [
        ['day' => 'Mon', 'open' => 182.1, 'close' => 184.6, 'low' => 181.2, 'high' => 185.4],
        ['day' => 'Tue', 'open' => 184.6, 'close' => 183.0, 'low' => 182.3, 'high' => 186.1],
        ['day' => 'Wed', 'open' => 183.0, 'close' => 187.9, 'low' => 182.8, 'high' => 188.5],
        ['day' => 'Thu', 'open' => 187.9, 'close' => 186.2, 'low' => 185.1, 'high' => 189.0],
        ['day' => 'Fri', 'open' => 186.2, 'close' => 190.4, 'low' => 185.9, 'high' => 191.2],
    ];
@endphp

<x-ui.echart type="candlestick" :data="$week" index="day" prefix="$" format="number" label="Share price this week" class="h-72 w-full" />
