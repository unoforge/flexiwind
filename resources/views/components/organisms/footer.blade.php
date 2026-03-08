@props(['allBlocks'])

@php
    $footerItems = [
        [
            'title' => 'Navigations',
            'items' => [
                [
                    'text' => 'Home',
                    'href' => '/',
                ],
                [
                    'text' => 'Templates',
                    'href' => '/templates',
                ],
                [
                    'text' => 'Blocks',
                    'href' => '/blocks',
                ],
            ],
        ],
        [
            'title' => 'Documentation',
            'items' => [
                [
                    'text' => 'Introduction',
                    'href' => '/docs/introduction',
                ],
                [
                    'text' => 'CLI',
                    'href' => '/docs/cli',
                ],
                [
                    'text' => 'Installation',
                    'href' => '/docs/installation',
                ],
                [
                    'text' => 'Theming tokens',
                    'href' => '/docs/theme',
                ],
            ],
        ],
        [
            'title' => 'Resources',
            'items' => [
                [
                    'text' => 'About us',
                    'href' => 'https://unoforge.vercel.app',
                ],
                [
                    'text' => 'The club',
                    'href' => '/the-club',
                ],
                [
                    'text' => 'Flexilla',
                    'href' => '',
                ],
                [
                    'text' => 'Flexilla Alpine',
                    'href' => '',
                ],
            ],
        ],
    ];
@endphp


<footer class="mt-auto">
    <div class="mx-auto w-full lg:max-w-300 relative pt-20 border-dashed">
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
            <div class="flex justify-between size-full max-w-300 mx-auto relative">
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <span
                    class="absolute -top-4.5 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-1 left-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-4.5 right-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-1 -right-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
            </div>
        </div>
        <div
            class="pb-10 px-4 sm:px-6 lg:px-8 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 lg:gap-x-10 gap-y-8">
            <div class="col-span-2 md:col-span-1 lg:col-span-2">
                <div class="flex">
                    <a href="/" aria-label="Link to home page" class="flex">
                        <x-atoms.site-logo />
                    </a>
                </div>
                <div class="flex flex-col mt-8">
                    <p class="text-sm max-w-xs text-fg-muted">
                        Composable TALL UI blocks for Laravel Artisans.
                        Built for speed. Designed for control.
                    </p>
                    <div class="flex flex-wrap gap-2 mt-4">
                        <x-ui.link href="https://github.com/unoforge/flexiwind"
                            class="flex items-center px-2 h-6.5 rounded-ui ring ring-border-strong/70 text-sm text-fg-muted hover:text-fg-title hover:bg-bg-surface">
                            <span aria-hidden="true" class="iconify ph--github-logo"></span>
                            <span>
                                Github
                            </span>
                        </x-ui.link>
                        <x-ui.link href="https://x.com/johnkat_Mj"
                            class="flex items-center px-2 h-6.5 rounded-ui ring ring-border-strong/70 text-sm text-fg-muted hover:text-fg-title hover:bg-bg-surface">
                            <span aria-hidden="true" class="iconify ph--x-logo"></span>
                            <span>
                                Follow us
                            </span>
                        </x-ui.link>
                    </div>
                </div>
            </div>
            @foreach ($footerItems as $footerGroup)
                <x-blocks.block-footer :title="$footerGroup['title']" :items="$footerGroup['items']" />
            @endforeach
        </div>
        <div class="col-span-full text-fg-muted text-sm px-4 sm:px-6 lg:px-8 pb-3">
            <div class="text-sm border border-border bg-bg-surface/50 px-4 py-2 rounded-ui text-center">
                © unoForge {{ Date('Y') }}.
                Designed by <x-ui.link href="https://x.com/johnkat_Mj" aria-label="Link to https://x.com/johnkat_Mj"
                    underlined>Johnkat MJ</x-ui.link>.
            </div>
        </div>
    </div>
</footer>
