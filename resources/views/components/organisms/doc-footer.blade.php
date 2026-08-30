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
            'href' => '/components',
        ],
    ];
@endphp

<footer class="px-4 sm:px-8 xl:px-16 mt-1 border-t border-border pt-16">
    <div class="px-4 py-6 sm:px-6 pt4 flex flex-col gap-5 bg-gray-50/60 dark:bg-gray-900/30 border border-border-strong rounded-ui">
        <div class="w-full flex flex-col md:flex-row gap-6 md:justify-between items-center text-sm">
            <div class="text-sm text-foreground">
                Published under 
                <x-atoms.ui-link 
                    href="https://github.com/unoforge/flexiwind"
                    aria-label="MIT License"
                    class="text-muted-foreground"
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
                            class="text-muted-foreground hover:text-foreground flex items-center gap-x-0.5"
                        >
                            {{ $link['text'] }}
                            @if (!Str::startsWith($link['href'], ['/','#']))
                                <x-ui.icon name="ph--arrow-up-right" class="flex text-xs" />
                            @endif
                        </x-atoms.ui-link>
                    </li>
                @endforeach
            </ul>
            <div class="flex">
                <x-atoms.social-links />
            </div>
        </div>
        <div class="text-sm border-t border-border bg-muted px-4 py-2 rounded-lg text-muted-foreground text-center">
            &copy; unoForge {{ Date('Y') }}. By 
            <x-atoms.ui-link
                href="https://github.com/unoforge"
                class="underline underline-offset-2 text-foreground"
            >
                Unoforge.
            </x-atoms.ui-link>
        </div>
    </div>
</footer>