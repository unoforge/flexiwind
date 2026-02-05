@props([
    'activeGroup' => '',
    'activeItem' => '',
    'description' => null,
    'keywords' => null,
    'title' => '',
    'hideTableOfContent' => false,
    'ogImage' => ['src' => null, 'alt' => null],
])

@php

    $fullPath = '/' . ltrim(request()->path() ?: '', '/');
    $path = basename($fullPath);

    $blocks = config('blocks');

    $block = $blocks[$path] ?? [];

    $seo = [
        'ogImage' => [
            'src' => $ogImage['src'] ?? config('app.default_og_image', '/default-og.png'),
            'alt' => $ogImage['alt'] ?? config('app.default_og_alt', 'Default OG Alt'),
        ],
        'keywords' => trim(
            config('app.keywords_def', 'docs, flexiwind') . ', blocks, components, laravel blocks, livewire blocks',
        ),
        'title' => 'Flexiwind | Preview ' . ($block['title'] ?? ''),
        'description' => $block['description'] ?? 'Easily add interactive Components to your App.',
    ];

@endphp

<x-layouts.base body-class="bg-bg " :seo="$seo">
    <x-slot name="head">
        @vite(['resources/js/block.js'])
    </x-slot>
    <x-organisms.navbar />
    {{ $slot }}
    <x-blocks.modal-search />
</x-layouts.base>
