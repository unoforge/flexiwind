@php
    // 60 days, oldest first. In an app this comes from your incidents table.
    $days = collect(range(59, 0))->map(function (int $ago) {
        $date = now()->subDays($ago)->format('M j');
        $status = match (true) {
            in_array($ago, [41, 12], true) => 'error',
            in_array($ago, [33, 32, 5], true) => 'warning',
            default => 'ok',
        };

        return [
            'status' => $status,
            'tooltip' => $date.' — '.['ok' => 'Operational', 'warning' => 'Degraded', 'error' => 'Outage'][$status],
        ];
    })->all();
@endphp

<div class="w-full max-w-xl rounded-xl border border-border bg-background p-5">
    <div class="flex items-center justify-between">
        <p class="font-medium text-foreground">api.example.com</p>
        <p class="text-sm text-muted-foreground">99.82% uptime</p>
    </div>
    <x-ui.tracker :data="$days" label="API status, last 60 days" class="mt-4" />
    <div class="mt-2 flex justify-between text-xs text-muted-foreground">
        <span>60 days ago</span>
        <span>Today</span>
    </div>
</div>
