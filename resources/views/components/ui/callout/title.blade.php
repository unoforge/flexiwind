@props(['text' => null])

<h2 data-slot="callout-title" {{ $attributes->class(['text-balance font-mdium text-base']) }}>
    @if ($text)
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</h2>
