<section class="relative">
    <span aria-hidden="true" class="absolute bottom-4 h-4 inset-x-0 flex pointer-events-none">
        <div class="xl:max-w-380 flex flex-col justify-between h-4 w-full mx-auto">
            <span class="h-px bg-linear-to-l from-border-strong to-border/70"></span>
        </div>
    </span>
    <div aria-hidden="true" class="absolute inset-0 -top-20 pointer-events-none">
        <div class="flex justify-between size-full max-w-300 mx-auto relative">
            <div aria-hidden="true" class="absolute inset-x-0 bottom-8 top-14 flex noise-subtle opacity-60 dark:opacity-50"></div>
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

            <span
                class="absolute bottom-7 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>

            <svg width="401" height="401" viewBox="0 0 401 401" fill="none"
                class="absolute right-4 size-40 md:size-56 lg:size-64 top-13.5" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 0H401V401H291.912C257.067 401 232.196 365.878 238.503 331.609C246.986 285.517 249.519 227.824 220 195.989C187.027 160.428 121.321 164.958 70.2625 175.681C35.8141 182.915 0 157.979 0 122.78V0Z"
                    fill="#F5F0F0" class="fill-bg-muted/40"/>
            </svg>


        </div>
    </div>
    <div class="relative z-5 flex flex-col px-3.5 sm:px-4 pt-16 md:pt-20 pb-20 md:pb-28">
        <div class="sm:max-w-4xl sm:mx-auto w-full">
            <a href="#"
                class="rounded-ui text-fg bg-bg border border-border-strong/60 backdrop-saturate-50 text-sm pl-2 pr-1 py-1 flex w-max">
                Introducing Flexiwind v1
                <span
                    class="ml-2 w-max py-0.5 px-1 text-xs overflow-hidden rounded-[calc(var(--radius-ui)-3px)] bg-bg-muted/80 flex items-center">
                    <span aria-hidden="true" class="iconify ph--arrow-right"></span>
                </span>
            </a>
            <h1
                class="mt-6.5 font-bold text-3xl sm:text-4xl/tight md:text-5xl/[1.2] max-w-xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg">
                Craft and scale modern apps with composable TALL UI blocks
            </h1>
            <p class="max-w-md text-fg-muted text-sm md:text-base mt-6.5">
                Production-ready UI blocks and components designed for Laravel Artisans. Built on the TALL Stack to help
                you move faster, stay consistent, and ship with confidence.
            </p>
            <div class="flex flex-wrap gap-3 mt-9">
                <x-ui.button href="/blocks" size="sm" class="sm:btn-md">
                    <span aria-hidden="true" class="iconify ph--cube-duotone opacity-80 mr-2 size-3.5"></span>
                    Start Building
                </x-ui.button>

                <x-ui.button href="/components/button" variant="outline" size="sm" class="sm:btn-md">
                    <span aria-hidden="true" class="iconify ph--diamonds-four-duotone mr-2 size-3.5"></span>
                    Components
                </x-ui.button>
            </div>
        </div>
    </div>
</section>

<x-site.hero-illustrations />
