@props(['type' => 'caret-down'])

@if ($type == 'caret-down')
    <x-ui.icon
        name="ph--caret-down"
        icon-slot="chevron"
        data-slot="chevron"
        size=""
        {{ $attributes->class(['size-3.5']) }}
    />
@endif
