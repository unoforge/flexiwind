@props(['href', 'title', 'description', 'icon', 'iconDark' => null])


@php
    $className =
        'flex flex-col w-full ui-card text-fg ease-linear duration-200 relative ' .
        'hover:border-primary border border-gray-200 dark:border-gray-800/60 bg-bg hover:bg-bg-subtle ' .
        '[--card-padding:calc(var(--spacing,_0.25rem)_*_5)] [--card-radius:var(--global-main-radius)]';
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
            <span aria-hidden="true" class="flex iconify {{ $icon }} text-primary text-2xl"></span>
        @endif
    </span>

    @if (Str::startsWith($href, 'http'))
        <span aria-hidden="true"
            class="absolute in-hover:text-primary top-(--card-padding) right-(--card-padding) text-fg-muted text-xs iconify ph--arrow-square-out"></span>
    @else
        <span aria-hidden="true"
            class="absolute in-hover:text-primary top-(--card-padding) right-(--card-padding) text-fg-muted text-xs iconify ph--arrow-up-right"></span>
    @endif

    <h3 class="font-medium text-lg text-fg-title mt-4">{{ $title }}</h3>
    <p class="text-sm text-fg-muted mt-1 leading-6">
        {{ $description }}
    </p>
</x-atoms.ui-link>
