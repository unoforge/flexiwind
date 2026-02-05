

<div data-slot="sheet-body" {{ $attributes->class([
    "flex flex-1 overflow-y-auto",
    "flex-1 flex-col overflow-auto px-(--gutter) py-1"
]) }}>
    {{ $slot }}
</div>
