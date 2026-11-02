@props(['popoverId', 'variant' => 'none', 'intent' => 'none','size'=>'none'])

<x-ui.button data-popover-trigger data-popover-id="popover-{{ $popoverId }}" :size="$size" :variant="$variant" :intent="$intent"
    {{ $attributes->merge(['class' => 'group']) }}>
    {{ $slot }}
</x-ui.button>
