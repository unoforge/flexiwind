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
    use App\Support\ConfigData;

    $blocks = ConfigData::blocks();

    $blockCategory = request()->route('blockCategory');
    $blockName = request()->route('blockName');

    $block = $blocks[$blockCategory][$blockName] ?? [];


    $seo = [
        'ogImage' => [
            'src' => $ogImage['src'] ?? "/illustrations/blocks-light.webp",
            'alt' => $ogImage['alt'] ?? "Flexiwind Cover illustration",
        ],
        'keywords' => trim(
            'docs, flexiwind, blocks, components, laravel blocks, livewire blocks',
        ),
        'title' => "Flexiwind | {$blockName}",
        'description' => $block['description'] ?? 'Beautifully designed, copy-paste ready Tailwind CSS v4 components and Livewire blocks for Laravel. Build stunning UIs faster.',
    ];

@endphp

<x-layouts.base
    body-class="bg-bg "
    :seo="$seo"
    :script-entries="['resources/js/app.js', 'resources/js/flexilla.js', 'resources/js/search.js', 'resources/js/block.js']"
>
    <x-organisms.navbar />
    <div class="relative w-full -mt-20 h-20">
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
            <div class="flex justify-between size-full max-w-300 mx-auto relative">
                <div aria-hidden="true"
                    class="absolute inset-x-0 bottom-8 top-14 flex noise-subtle opacity-60 dark:opacity-50"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <span
                    class="absolute top-8.5 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-12.5 left-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-8.5 -right-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-12.5 right-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>

            </div>
        </div>
    </div>
    {{ $slot }}
    <x-organisms.blocks-cta />
    <x-organisms.footer />
    <x-blocks.modal-search />
</x-layouts.base>
