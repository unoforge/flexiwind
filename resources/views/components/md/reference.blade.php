@props(['href','title','description'])

<x-ui.link class="ring ring-border/50 rounded-ui p-2.5 bg-card ease-linear duration-200 hover:bg-muted/50"
    href="{{ $href }}">
    <span class="font-semibold text-sm text-foreground">
        {{ $title }}
    </span>
    <p class="mt-1 text-xs sm:text-sm text-muted-foreground">
        {{ $description }}
    </p>
</x-ui.link>
