@php
    // 7 days × 24 hours. Rows are series, so each weekday is one config entry.
    $days = ['mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday'];
    $hours = collect(range(0, 23))->map(function (int $h) use ($days) {
        $row = ['hour' => sprintf('%02d', $h)];
        foreach (array_keys($days) as $d => $key) {
            $weekend = $d >= 5;
            $row[$key] = max(0, (int) round(($weekend ? 18 : 42) * exp(-(($h - ($weekend ? 16 : 11)) ** 2) / 22) + ($d * 3 % 5)));
        }

        return $row;
    })->all();
@endphp

<x-ui.echart type="heatmap" :data="$hours" index="hour" label="Deploys by hour and weekday" class="h-96 w-full"
    :config="collect($days)->map(fn ($label) => ['label' => $label])->all()"
    :options="['visualMap' => ['itemWidth' => 12, 'itemHeight' => 160]]" />
