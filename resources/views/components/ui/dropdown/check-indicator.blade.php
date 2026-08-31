<x-ui.icon
    name="ph--check-bold"
    icon-slot="check-indicator"
    data-slot="check-indicator"
    {{ $attributes->class([
        'mr-1.5 -ml-0.5 h-lh shrink-0 text-xs',
        'group-has-data-[slot=icon]:absolute group-has-data-[slot=icon]:top-1/2 group-has-data-[slot=icon]:right-0.5 group-has-data-[slot=icon]:-translate-y-1/2',
        'group-has-data-[slot=avatar]:absolute group-has-data-[slot=avatar]:top-1/2 group-has-data-[slot=avatar]:right-0.5 group-has-data-[slot=avatar]:-translate-y-1/2',
    ]) }}
/>
