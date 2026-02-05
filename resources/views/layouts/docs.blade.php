@php
    use App\Support\SidebarPaginator;

    $path = '/' . ltrim(request()->path() ?: '', '/');
    $current = SidebarPaginator::getCurrent($path);

    $seo = [
        'ogImage' => [
            'src' => $current['ogImage']['src'] ?? config('base.default_og_image'),
            'alt' => $current['ogImage']['alt'] ?? config('base.default_og_alt'),
        ],
        'keywords' => trim(config('base.keywords_def') . ($current['keywords'] ? ', ' . $current['keywords'] : '')),
        'title' => 'Flexiwind | ' . $current['title'],
        'description' => $current['seoDescription'] ?? 'Easily add interactive Components to your App.',
    ];
@endphp

<x-layouts.base body-class="bg-bg " :seo="$seo">
    <x-slot name="head">
        @vite(['resources/css/docs.css', 'resources/js/docs.js'])
    </x-slot>
    <x-organisms.doc-navbar />
    <div
        class="grid lg:grid-cols-[16rem_minmax(0,1fr)] xl:grid-cols-[17rem_minmax(0,1fr)] lg:pl-8 xl:pr-8 docs-container">
        <x-organisms.doc-sidebar :path="$path"/>
        <div class="grid relative">
            <x-molecules.top-docs-nav />
            {{ $slot }}
            <x-organisms.doc-footer />
        </div>
    </div>

    <x-blocks.modal-search />
</x-layouts.base>
