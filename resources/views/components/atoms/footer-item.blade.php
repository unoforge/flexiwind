@props(['href', 'text'])

@php
    $isInternal = ($href && Str::startsWith($href, '/')) || Str::startsWith($href, '#');
@endphp
<li>
    <x-ui.link href="{{ $href }}" aria-label="Link to {{ $text }}"
        class="ease-linear duration-200 transition-colors hover:text-foreground group flex items-center">
        {{ $text }}
        @if (!$isInternal)
            <x-ui.icon name="ph--arrow-up-right" class="size-3 ml-2 scale-90 group-hover:ml-3 group-hover:scale-100 ease-linear duration-200" />
        @endif
    </x-ui.link>
</li>
