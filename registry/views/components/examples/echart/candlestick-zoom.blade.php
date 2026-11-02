@php
    $price = 182.0;
    $days = collect(range(0, 39))->map(function (int $i) use (&$price) {
        $open = $price;
        $close = round($open + sin($i / 3) * 4 + cos($i * 1.7) * 2.5, 2);
        $price = $close;

        return [
            'date' => now()->subDays(40 - $i)->format('M j'),
            'open' => $open,
            'close' => $close,
            'low' => round(min($open, $close) - 1.5 - ($i % 4), 2),
            'high' => round(max($open, $close) + 1.2 + ($i % 3), 2),
        ];
    })->all();
@endphp

{{-- Candlestick reads the open, close, low and high columns. --}}
<x-ui.echart type="candlestick" zoom :data="$days" index="date" prefix="$" format="number" label="Share price, last 40 days" class="h-80 w-full" />
