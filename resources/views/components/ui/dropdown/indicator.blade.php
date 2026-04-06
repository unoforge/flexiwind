@props(['type' => 'caret-down'])

@if ($type == 'caret-down')
    <span data-slot="chevron" {{ $attributes->class(['flex iconify ph--caret-down size-3.5']) }}></span>
@endif
