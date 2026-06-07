@props(['variant' => 'none', 'size' => 'none', 'iconOnly' => false])

<x-ui.button data-dismiss-btn variant="{{ $variant }}" size="{{ $size }}" :icon-only="$iconOnly" {{ $attributes }}>
    {{ $slot }}
</x-ui.button>
