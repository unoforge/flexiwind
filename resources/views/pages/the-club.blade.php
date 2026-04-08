<x-layouts.app>
    <main class="">
        <section class="relative">
            <span aria-hidden="true" class="absolute bottom-0 h-px inset-x-0 flex pointer-events-none">
                <div class="xl:max-w-380 flex flex-col justify-between h-px w-full mx-auto">
                    <span class="h-px bg-linear-to-l from-border-strong to-border/70"></span>
                </div>
            </span>
            <div aria-hidden="true" class="absolute inset-0 -top-20 pointer-events-none">
                <div class="flex justify-between size-full max-w-300 mx-auto relative">
                    <div aria-hidden="true"
                        class="absolute inset-x-0 bottom-0 top-14 flex noise-subtle opacity-60 dark:opacity-50"></div>
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
                    <svg width="401" height="401" viewBox="0 0 401 401" fill="none"
                        class="absolute right-4 size-40 md:size-56 lg:size-64 top-13.5" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 0H401V401H291.912C257.067 401 232.196 365.878 238.503 331.609C246.986 285.517 249.519 227.824 220 195.989C187.027 160.428 121.321 164.958 70.2625 175.681C35.8141 182.915 0 157.979 0 122.78V0Z"
                            fill="#F5F0F0" class="fill-bg-muted/40" />
                    </svg>
                </div>
            </div>
            <div
                class="pt-14 pb-20 md:pb-28 px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl flex flex-col relative">
                <span class="w-max px-2 text-sm rounded-ui ui-subtle ui-subtle-gray">
                    Coming soon
                </span>
                <h2
                    class="font-bold text-3xl md:text-4xl/tight lg:text-5xl/[1.1] max-w-2xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg mt-4">
                    The club for those who want to scale fast, build better.
                </h2>
                <p class="text-fg-muted max-w-md text-sm mt-6.5">
                    Inside the club: tips and snippets, advanced blocks and components, and ready app UI starters.
                </p>
                <div class="flex flex-wrap gap-3 mt-9">
                    <x-ui.button href="https://tally.so/r/XxePV4" size="sm" class="sm:btn-md">
                        <span aria-hidden="true" class="iconify ph--magic-wand-duotone opacity-80 mr-2 size-3.5"></span>
                        Join the club waitlist
                    </x-ui.button>
                    <x-atoms.support-us-link />
                </div>
            </div>
        </section>
        @php
            $items = [
                [
                    'title' => 'Tips and snippets',
                    'icon' => 'ph--pencil',
                    'description' => 'Practical snippets you can copy, adapt, and use right away.',
                ],
                [
                    'title' => 'Advanced blocks and components',
                    'icon' => 'ph--pencil',
                    'description' => 'Advanced building blocks to ship faster without sacrificing quality.',
                ],
                [
                    'title' => 'Ready app UI starters',
                    'icon' => 'ph--pen',
                    'description' => 'Starter-ready app UI sections to accelerate your next launch.',
                ],
            ];
        @endphp

        <section class="">
            <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 border-dashed">
                <div
                    class="w-full mx-auto md:max-w-300 relative grid gap-x-4 gap-y-6 sm:grid-cols-2 md:grid-cols-3 lg:gap-x-12 py-6 sm:py-10 px-3.5 sm:px-10 md:px-16 lg:px-24">
                    <span aria-hidden="true" class="absolute -inset-x-1 flex justify-between items-center h-px">
                        <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                        <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                    </span>
                    <span aria-hidden="true"
                        class="absolute bottom-0 -inset-x-1 bg-border-strong/60 flex justify-between items-center h-px">
                        <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                        <span class="size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                    </span>
                    @foreach ($items as $item)
                        <div class="flex flex-col items-start">
                            <div class="h-7 px-5 flex items-center rounded-ui bg-primary text-white w-max">
                                <span aria-hidden class="iconify {{ $item['icon'] }} size-4"></span>
                            </div>
                            <h2 class="font-semibold text-fg-title mt-3 text-sm">
                                {{ $item['title'] }}
                            </h2>
                            <p class="text-sm text-fg-muted mt-1">
                                {{ $item['description'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70"></div>
            </div>
        </section>

        <x-site.site-cta />
    </main>
</x-layouts.app>
