@props(['href', 'title', 'description', 'icon', 'iconDark' => null])


@php
    $className =
        'flex flex-col w-full ui-card text-foreground ease-linear duration-200 relative ' .
        'hover:border-primary border border-gray-200 dark:border-gray-800/60 bg-background  hover:bg-muted ' .
        '[--card-padding:calc(var(--spacing,_0.25rem)_*_5)] [--card-radius:var(--radius-ui)]';
    $isImage = Str::startsWith($icon, '/') || Str::startsWith($icon, 'http');
    $icon = $icon ?? '';
    $iconDark = $iconDark ?? null;

@endphp
<x-atoms.ui-link :href="$href" :class="$className">
    <span class="size-10 d-flex-place-center rounded-md p-2 ui-soft {{ $isImage ? 'ui-soft-gray' : 'ui-soft-primary' }}">
        @if ($isImage)
            @if ($iconDark)
                <img src="{{ $icon }}" alt="icon {{ $icon }}" width="40" height="40"
                    class="h-5 w-auto dark:hidden">
                <img src="{{ $iconDark }}" alt="icon {{ $iconDark }}" width="40" height="40"
                    class="h-5 w-auto not-dark:hidden">
            @else
                <img src="{{ $icon }}" alt="icon {{ $icon }}" width="40" height="40"
                    class="h-5 w-auto">
            @endif
        @else
            <x-ui.icon name="{{ $icon }}" class="flex text-primary text-2xl" />
        @endif
    </span>

    @if (Str::startsWith($href, 'http'))
        <x-ui.icon name="ph--arrow-square-out" class="absolute in-hover:text-primary top-(--card-padding) right-(--card-padding) text-muted-foreground text-xs" />
    @else
        <x-ui.icon name="ph--arrow-up-right" class="absolute in-hover:text-primary top-(--card-padding) right-(--card-padding) text-muted-foreground text-xs" />
    @endif

    <h3 class="font-medium text-lg text-foreground mt-4">{{ $title }}</h3>
    <p class="text-sm text-muted-foreground mt-1 leading-6">
        {{ $description }}
    </p>
</x-atoms.ui-link>
