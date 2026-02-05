@props(['href', 'text'])

@php
    $isNotExternal = Str::startsWith($href, '/') || Str::startsWith($href, '#');
@endphp

<x-atoms.ui-link :href="$href" class="btn btn-xs bg-bg-subtle border border-border-strong/40 hover:border-border-amphasis text-fg gap-x-1 rounded-lg">
    {{ $text }}
    @unless($isNotExternal)
        <span aria-hidden="true" class="flex iconify ph--arrow-square-out text-xs"></span>
    @endunless
</x-atoms.ui-link>
