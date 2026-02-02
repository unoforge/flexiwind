
@props(['noGutter'=>false])
<div data-slot="modal-body" {{ $attributes->class([
    "flex flex-1",
    "flex-1 flex-col",
    "px-(--gutter) py-1"=>!$noGutter
]) }}>
    {{ $slot }}
</div>
