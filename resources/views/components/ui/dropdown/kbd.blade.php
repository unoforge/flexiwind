@props(['class' => '', 'variant' => 'none', 'intent' => 'gray', 'size' => 'none', 'radius' => 'none'])

<x-ui.kbd data-slot="kbd" :variant="$variant" :intent="$intent" :size="$size" :radius="$radius"
    {{ $attributes->class(['col-start-5 row-start-1 flex justify-self-end', $class]) }}>
    {{ $slot }}
</x-ui.kbd>
