@php
    $seo = [
        'ogImage' => [
            'src' => $ogImage['src'] ?? '/illustrations/blocks-light.webp',
            'alt' => $ogImage['alt'] ?? "Flexiwind Cover",
        ],
        'keywords' => trim('docs, flexiwind, laravel components, laravel blocks, laravel ui'),
        'title' => 'Flexiwind',
        'description' => $description ?? 'Easily add interactive Components to your App.',
    ];
@endphp

<x-layouts.base body-class="bg-bg flex flex-col" :seo="$seo">
    <x-organisms.navbar />
    {{ $slot }}
    <x-organisms.footer />
    <x-blocks.modal-search />
</x-layouts.base>
