@php
    $isInternalLink = isset($href) && Str::startsWith($href, '/') || Str::startsWith($href, '#');
@endphp

<x-atoms.ui-link 
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'w-max underline decoration-dashed whitespace-normal decoration-1 break-words text-primary rounded-lg ease-linear duration-200 hover:text-primary-800 dark:hover:text-primary-300']) }}
>
    {{ $slot }}
    
    @unless($isInternalLink)
        <span aria-hidden="true" class="iconify ph--arrow-up-right text-sm"></span>
    @endunless
</x-atoms.ui-link>
