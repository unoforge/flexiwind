@php
    $links = [
        [
            'text' => 'Templates',
            'href' => '/templates',
        ],
        [
            'text' => 'Blocks',
            'href' => '/blocks',
        ],
        [
            'text' => 'Components',
            'href' => '/components/button',
        ],
    ];
@endphp

<footer class="px-4 sm:px-8 xl:px-16 mt-14 border-t border-border pt-16">
    <div class="px-4 py-6 sm:px-6 pt4 flex flex-col gap-5 bg-gray-50/60 dark:bg-gray-900/30 border border-border-sub rounded-ui">
        <div class="w-full flex flex-col md:flex-row gap-6 md:justify-between items-center text-sm">
            <div class="text-sm text-fg">
                Published under 
                <x-atoms.ui-link 
                    href="https://github.com/unoforge/flexiwind"
                    aria-label="MIT License"
                    class="text-fg-muted"
                >
                    MIT License
                </x-atoms.ui-link>
            </div>
            <ul class="flex flex-wrap items-center gap-x-4 gap-y-2">
                @foreach ($links as $link)
                    <li>
                        <x-atoms.ui-link
                            aria-label="Link to {{ $link['text'] }}"
                            href="{{ $link['href'] }}"
                            class="text-fg-muted hover:text-fg-title flex items-center gap-x-0.5"
                        >
                            {{ $link['text'] }}
                            @if (!Str::startsWith($link['href'], ['/','#']))
                                <span aria-hidden="true" class="flex iconify ph--arrow-up-right text-xs"></span>
                            @endif
                        </x-atoms.ui-link>
                    </li>
                @endforeach
            </ul>
            <div class="flex">
                <x-atoms.social-links />
            </div>
        </div>
        <div class="text-sm border-t border-border bg-bg-subtle px-4 py-2 rounded-lg text-fg-muted text-center">
            &copy; unoForge {{ Date('Y') }}. By 
            <x-atoms.ui-link
                href="https://github.com/unoforge"
                class="underline underline-offset-2 text-fg-title"
            >
                Unoforge.
            </x-atoms.ui-link>
        </div>
    </div>
</footer>