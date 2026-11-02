
@props(['gutter'=>true])
<div data-slot="modal-body" {{ $attributes->class([
    "flex flex-1",
    "flex-1 flex-col",
    "px-(--gutter) py-(--gutter-y,var(--gutter))"=>$gutter
]) }}>
    {{ $slot }}
</div>
