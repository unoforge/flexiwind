@props(['dropdownId', 'variant' => 'none', 'intent' => 'none','size'=>'none'])

<x-ui.button data-dropdown-trigger data-dropdown-id="dropdown-{{ $dropdownId }}" :size="$size" :variant="$variant" :intent="$intent"
    {{ $attributes->merge(['class' => 'group']) }}>
    {{ $slot }}
</x-ui.button>
