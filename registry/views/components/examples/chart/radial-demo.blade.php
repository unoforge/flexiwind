@php
    $goals = [
        ['goal' => 'Move', 'progress' => 82],
        ['goal' => 'Exercise', 'progress' => 64],
        ['goal' => 'Stand', 'progress' => 45],
    ];
@endphp

<x-ui.chart type="radial" :data="$goals" index="goal" suffix="%" label="Daily goals" class="h-64 w-full max-w-sm" />
