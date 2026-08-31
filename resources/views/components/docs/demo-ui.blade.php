@props(['variant' => 'solid'])
<div class="flex flex-wrap gap-4">
    <x-ui.badge :variant="$variant" intent="success" class="d-flex-items-center gap-x-1">
        12%
        <x-ui.icon name="ph--trend-up" class="flex" />
    </x-ui.badge>
    <x-ui.badge :variant="$variant" intent="destructive" class="d-flex-items-center gap-x-1">
        50%
        <x-ui.icon name="ph--trend-down" class="flex" />
    </x-ui.badge>
    <x-ui.badge :variant="$variant" intent="primary" class="d-flex-items-center gap-x-1">
        Info
        <x-ui.icon name="ph--info" class="flex" />
    </x-ui.badge>
</div>
