@php
    // One row per series (weekday), one column per category (hour).
    $hours = collect(range(8, 20))->map(fn (int $h) => [
        'hour' => sprintf('%02d:00', $h),
        'mon' => (int) round(20 + 30 * sin(($h - 8) / 4)),
        'tue' => (int) round(26 + 34 * sin(($h - 8) / 4)),
        'wed' => (int) round(30 + 38 * sin(($h - 7) / 4)),
        'thu' => (int) round(24 + 32 * sin(($h - 8) / 4)),
        'fri' => (int) round(14 + 22 * sin(($h - 9) / 4)),
    ])->all();
@endphp

<x-ui.echart type="heatmap" :data="$hours" index="hour" label="Support tickets by hour" class="h-72 w-full" :config="[
    'mon' => ['label' => 'Monday'],
    'tue' => ['label' => 'Tuesday'],
    'wed' => ['label' => 'Wednesday'],
    'thu' => ['label' => 'Thursday'],
    'fri' => ['label' => 'Friday'],
]" />
