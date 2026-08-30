@props(['href', 'text'])

@php
    $isNotExternal = Str::startsWith($href, '/') || Str::startsWith($href, '#');
@endphp

<x-atoms.ui-link :href="$href" class="btn btn-xs bg-muted border border-border-strong/40 hover:border-border-strong text-foreground gap-x-1 rounded-lg">
    {{ $text }}
    @unless($isNotExternal)
        <x-ui.icon name="ph--arrow-square-out" class="flex text-xs" />
    @endunless
</x-atoms.ui-link>
