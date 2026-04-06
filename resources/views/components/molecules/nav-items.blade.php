@php
    $items = [
        [
            'text' => 'Home',
            'href' => '/',
            'onlyMobile' => true,
        ],
        [
            'text' => 'Docs',
            'href' => '/docs/introduction',
        ],
        [
            'text' => 'Components',
            'href' => '/components',
        ],
        [
            'text' => 'Blocks',
            'href' => '/blocks',
        ],
        [
            'text' => 'Templates',
            'href' => '/templates',
        ],
        [
            'text' => 'About',
            'href' => 'https://unoforge.vercel.app',
        ],
    ];

@endphp

<ul
    class="w-full flex flex-col lg:flex-row lg:items-center gap-0.5 text-fg-muted bg-bg lg:bg-transparent rounded-ui p-2 lg:p-0 border border-border dark:border-border-strong lg:border-none">
    @foreach ($items as $item)
        <li class="relative group {{ isset($item['onlyMobile']) && $item['onlyMobile'] ? 'md:hidden' : '' }}">
            <x-atoms.ui-link href="{{ $item['href'] }}"
                class="flex items-center text-sm hover:text-fg-title ease-linear duration-200 py-1.5 px-2.5 rounded-ui hover:bg-bg-muted/50">
                {{ $item['text'] }}
            </x-atoms.ui-link>
        </li>
    @endforeach
</ul>
