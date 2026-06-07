@props(['dropdownId', 'variant' => 'none', 'intent' => 'none','size'=>'none','iconOnly'=>false])

<x-ui.button data-dropdown-trigger data-dropdown-id="dropdown-{{ $dropdownId }}" :icon-only="$iconOnly" :size="$size" :variant="$variant" :intent="$intent"
    {{ $attributes->merge(['class' => 'group']) }}>
    {{ $slot }}
</x-ui.button>
