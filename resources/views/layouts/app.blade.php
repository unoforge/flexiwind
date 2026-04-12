@php
    $seo = [
        'ogImage' => [
            'src' => $ogImage['src'] ?? '/cover-flexiwind.png',
            'alt' => $ogImage['alt'] ?? 'Flexiwind — Tailwind CSS Components & Blocks for Laravel',
        ],
        'keywords' => trim('flexiwind, laravel ui, laravel components, laravel blocks, livewire components, tailwind css, tailwind v4, blade components, laravel ui kit, copy paste ui, laravel blade'),
        'title' => 'Flexiwind — Tailwind CSS Components & Blocks for Laravel',
        'description' => $description ?? 'Beautifully designed, copy-paste ready Tailwind CSS v4 components and Livewire blocks for Laravel. Build stunning UIs faster.',
    ];
@endphp

<x-layouts.base
    body-class="bg-bg flex flex-col"
    :seo="$seo"
    :script-entries="['resources/js/app.js', 'resources/js/site-ui.js', 'resources/js/search.js']"
>
    <x-organisms.navbar />
    {{ $slot }}
    <x-organisms.footer />
    <x-blocks.modal-search />
</x-layouts.base>
