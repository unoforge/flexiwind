@props(['href','title','description'])

<x-ui.link class="ring ring-border/50 rounded-ui p-2.5 bg-bg-surface ease-linear duration-200 hover:bg-bg-muted/50"
    href="{{ $href }}">
    <span class="font-semibold text-sm text-fg-title">
        {{ $title }}
    </span>
    <p class="mt-1 text-xs sm:text-sm text-fg-muted">
        {{ $description }}
    </p>
</x-ui.link>
