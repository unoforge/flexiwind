<section class="relative">
    <div aria-hidden="true" class="absolute inset-0 -top-20 pointer-events-none">
        <div class="flex justify-between size-full max-w-300 mx-auto relative">
            <div aria-hidden="true" class="absolute inset-x-0 bottom-8 top-14 flex noise-subtle opacity-60 dark:opacity-50"></div>
            <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
            <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
            <span class="absolute top-8.5 -left-[3.5px] size-2 bg-background  border border-border-strong/60 shadow-sm rounded-ui"></span>
            <span class="absolute top-12.5 left-[11px] size-2 bg-background  border border-border-strong/60 shadow-sm rounded-ui"></span>
            <span class="absolute top-8.5 -right-[3.5px] size-2 bg-background  border border-border-strong/60 shadow-sm rounded-ui"></span>
            <span class="absolute top-12.5 right-[11px] size-2 bg-background  border border-border-strong/60 shadow-sm rounded-ui"></span>
        </div>
    </div>

    <div class="relative z-5 flex flex-col px-3.5 sm:px-4 pt-16 md:pt-20 pb-20 md:pb-24">
        <div class="sm:max-w-4xl sm:mx-auto w-full">
            <span class="w-max px-2 text-sm rounded-ui ui-subtle ui-subtle-gray">About us</span>
            <h1
                class="mt-6.5 font-bold text-3xl sm:text-4xl/tight md:text-5xl/[1.2] max-w-2xl text-balance text-transparent bg-clip-text bg-linear-to-br from-foreground to-muted-foreground/60 dark:via-foreground">
                Who we are: UnoForge
            </h1>
            <p class="max-w-xl text-muted-foreground text-sm md:text-base mt-6.5">
                UnoForge is a product and engineering studio focused on practical Laravel tooling. We build systems that
                stay maintainable, ship fast, and scale with real product needs.
            </p>
            <div class="flex flex-wrap gap-3 mt-9">
                <x-ui.button href="/templates" size="sm" class="sm:btn-md">
                    <x-ui.icon name="ph--layout-duotone" class="opacity-80 mr-2 size-3.5" />
                    Explore templates
                </x-ui.button>
                <x-ui.button href="/blocks" variant="outline" size="sm" class="sm:btn-md">
                    <x-ui.icon name="ph--cube-duotone" class="opacity-80 mr-2 size-3.5" />
                    Browse blocks
                </x-ui.button>
            </div>
        </div>
    </div>
</section>
