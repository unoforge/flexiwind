@php
    $scores = [
        ['metric' => 'Performance', 'flexiwind' => 92, 'average' => 71],
        ['metric' => 'Accessibility', 'flexiwind' => 96, 'average' => 68],
        ['metric' => 'Bundle size', 'flexiwind' => 88, 'average' => 55],
        ['metric' => 'Theming', 'flexiwind' => 94, 'average' => 62],
        ['metric' => 'Docs', 'flexiwind' => 85, 'average' => 74],
    ];
@endphp

<x-ui.echart type="radar" max="100" :data="$scores" index="metric" label="Scores compared" class="h-80 w-full max-w-md" :config="[
    'flexiwind' => ['label' => 'Flexiwind'],
    'average' => ['label' => 'Average kit'],
]" />
