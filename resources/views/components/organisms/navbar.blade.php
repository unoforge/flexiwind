<div data-nav-overlay data-navbar-id="mainNavbar"
    class="fixed bg-gray-800/40 inset-0 z-30 hidden fx-open:flex lg:hidden lg:fx-open:invisible lg:pointer-events-none">
</div>
<span aria-hidden="true" class="absolute top-8 h-4 inset-x-0 flex pointer-events-none">
    <div class="xl:max-w-380 flex flex-col justify-between h-4 w-full mx-auto">
        <span class="h-px bg-linear-to-l from-bg-muted/80 to-pattern-fg"></span>
        <span class="h-px bg-linear-to-r from-bg-muted/80 to-pattern-fg"></span>
    </div>
</span>
<header class="px-1.5 max-[350px]:px-2.5 sm:px-4 pt-2 w-full z-45 relative">
    <nav
        class="sm:max-w-4xl bg-bg shadow-sm border border-border/60 dark:border-border-strong shadow-gray-50 dark:shadow-transparent sm:mx-auto w-full flex justify-between ui-card [--card-padding:calc(var(--spacing)*4)] [--card-radius:var(--radius-ui)]">
        <div class="flex items-center gap-2 pr-3">
            <div class="flex lg:hidden pr-2 border-r border-border-strong/70">
                <button data-nav-trigger data-toggle-nav="mainNavbar"
                    class="flex py-2 flex-col relative justify-center items-center group" aria-label="Toggle navbar">
                    <span id="line-1"
                        class="w-6 h-0.5 rounded-full bg-fg-muted transition-transform duration-300 ease-linear group-aria-expanded:translate-y-1.5 group-aria-expanded:rotate-40"></span>
                    <span id="line-2"
                        class="w-6 origin-center  mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear group-aria-expanded:scale-x-0 group-aria-expanded:opacity-0"></span>
                    <span id="line-3"
                        class="w-6 mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear group-aria-expanded:-translate-y-1.5 group-aria-expanded:-rotate-40"></span>
                </button>
            </div>
            <a href="/" class="hidden min-[20rem]:flex gap-2 items-center relative">
                <x-atoms.site-logo />
            </a>
        </div>
        <div x-data x-navbar id="mainNavbar"
            class="flex lg:flex-1 lg:px-4
        fixed w-full lg:w-auto left-0 top-16 lg:top-0 px-1 sm:px-2
        invisible fx-open:visible opacity-0 fx-open:opacity-100 lg:opacity-100 lg:visible scale-90 fx-open:scale-100 lg:scale-100 lg:relative ease-linear duration-200 transition-all lg:transition-none origin-top
        ">
            <x-molecules.nav-items />
        </div>

        <div class="flex items-center gap-1.5 w-max">
            <x-ui.modal.trigger modal-id="search-modal" size="sm" iconOnly variant="flexi" intent="white">
                <span class="iconify ph--magnifying-glass text-sm"></span>
            </x-ui.modal.trigger>
            <x-ui.button href="https://github.com/unoforge/flexiwind" variant="flexi" intent="white" size="sm"
                iconOnly>
                <span class="iconify ph--github-logo"></span>
            </x-ui.button>
            <x-ui.button variant="flexi" intent="white" size="sm" iconOnly radius="none"
                x-on:click="$store.theme.toggle()" aria-label="toggle theme" class="relative">
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--sun invisible dark:visible"></span>
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--moon-stars visible dark:invisible"></span>
            </x-ui.button>
            <x-atoms.ui-link href="/the-club" aria-label="Link to club page"
                class="ml-1.5 btn h-8 text-sm px-3 btn-solid btn-solid-neutral rounded-ui text-bg max-[350px]:hidden"
                wire:navigate>
                <span class="iconify ph--cube text-xs mr-1 hidden min-[560px]:flex"></span>
                Join the club
            </x-atoms.ui-link>
        </div>
    </nav>
</header>
