@php
    $seo = [
        'ogImage' => [
            'src' => $ogImage['src'] ?? '/cover-flexiwind.webp',
            'alt' => $ogImage['alt'] ?? "Flexiwind Cover",
        ],
        'keywords' => trim('docs, flexiwind, laravel components, laravel blocks, laravel ui'),
        'title' => 'Flexiwind',
        'description' => $description ?? 'Easily add interactive Components to your App.',
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
