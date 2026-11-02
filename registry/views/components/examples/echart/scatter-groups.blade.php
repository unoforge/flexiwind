@php
    $users = collect(range(1, 30))->map(fn (int $i) => [
        'sessions' => $i * 3,
        'free' => (int) round($i * 1.2 + 6 * sin($i)),
        'pro' => (int) round($i * 2.6 + 9 * cos($i * 1.3) + 12),
    ])->all();
@endphp

<x-ui.echart type="scatter" :data="$users" index="sessions" label="Components installed by sessions, per plan" class="h-80 w-full" :config="[
    'free' => ['label' => 'Free accounts'],
    'pro' => ['label' => 'Pro accounts'],
]" />
