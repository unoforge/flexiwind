@props([
    'for' => null,
    'text' => null,
])

<label for="{{ $for }}"
    {{ $attributes->merge(['class' => 'text-sm font-medium leading-none text-fg-muted block peer-disabled:cursor-not-allowed peer-disabled:opacity-70 disabled:opacity-70']) }}>
    @if (isset($text))
        {{ $text }}
    @else
        {{ $slot }}
    @endif
</label>
