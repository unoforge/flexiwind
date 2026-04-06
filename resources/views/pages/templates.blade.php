<?php
use Livewire\Component;

new class extends Component {
    //
}; ?>
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
                Templates
            </span>
            <h2
                class="font-bold text-3xl md:text-4xl/tight lg:text-5xl/[1.1] max-w-2xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg mt-4">
                Production-Ready Laravel Templates
            </h2>
            <p class="text-fg-muted max-w-md text-sm mt-6.5">
                Start with fully structured application and marketing templates built on composable TALL UI blocks.
                Install, customize, and ship faster.
            </p>
        </div>
    </section>
    <x-site.templates-section />
    <x-site.site-cta />
</main>
