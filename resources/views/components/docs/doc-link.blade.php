@props(['href'])

@php
    $isInternalLink = ($href && (Str::startsWith($href, '/') || Str::startsWith($href, '#')));
@endphp

<x-atoms.ui-link
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'w-max underline decoration-dashed whitespace-normal decoration-1 break-words text-primary rounded-lg ease-linear duration-200 hover:text-primary-800 dark:hover:text-primary-300'
    ]) }}
>
    {{ $slot }}
    @unless($isInternalLink)
        <x-ui.icon name="ph--arrow-up-right" class="text-sm" />
    @endunless
</x-atoms.ui-link>