@php
    $skills = [
        ['skill' => 'Blade', 'level' => 90],
        ['skill' => 'Livewire', 'level' => 80],
        ['skill' => 'Alpine', 'level' => 70],
        ['skill' => 'Tailwind', 'level' => 95],
        ['skill' => 'Testing', 'level' => 65],
    ];
@endphp

<x-ui.echart type="radar" max="100" :data="$skills" index="skill" label="Team skills" class="h-72 w-full max-w-md"
    :config="['level' => ['label' => 'Level']]" />
