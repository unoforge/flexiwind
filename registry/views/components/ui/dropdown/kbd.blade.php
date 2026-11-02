@props(['class' => '', 'variant' => 'none', 'intent' => 'gray', 'size' => 'none', 'radius' => 'none'])

<x-ui.kbd data-slot="kbd" :variant="$variant" :intent="$intent" :size="$size" :radius="$radius"
    {{ $attributes->class(['absolute right-2 pl-2', $class]) }}>
    {{ $slot }}
</x-ui.kbd>
