<div
data-nav-overlay
data-navbar-id="mainNavbar"
aria-hidden="true"
class="fixed bg-gray-800/40 inset-0 z-30 hidden fx-open:flex lg:hidden"
></div>
<header class="px-3.5 sm:px-4 pt-2 sm:pt-4 w-full z-45 relative">
    <nav
        class="max-w-4xl bg-bg shadow-sm border border-border/60 dark:border-border-strong shadow-gray-50 dark:shadow-none mx-auto w-full flex justify-between ui-card [--card-padding:calc(var(--spacing)*4)] [--card-radius:var(--radius-xl)]">
        <div class="flex items-center pr-3">
            <div class="flex lg:hidden pr-1 border-r border-border-strong/70">
                <button data-nav-trigger data-toggle-nav="mainNavbar"
                    class="p-2 rounded-full flex flex-col relative justify-center items-center group"
                    aria-label="Toggle navbar">
                    <span id="line-1"
                        class="w-6 h-0.5 rounded-full bg-fg-muted transition-transform duration-300 ease-linear group-aria-expanded:translate-y-1.5 group-aria-expanded:rotate-40"></span>
                    <span id="line-2"
                        class="w-6 origin-center  mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear group-aria-expanded:scale-x-0 group-aria-expanded:opacity-0"></span>
                    <span id="line-3"
                        class="w-6 mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear group-aria-expanded:-translate-y-1.5 group-aria-expanded:-rotate-40"></span>
                </button>
            </div>
            <a href="/" class="hidden min-[34rem]:flex gap-2 items-center relative">
                <img src="/logo-dark.png" width="430" height="435" alt="logo in light mode" class="dark:hidden h-7 w-auto">
                <img src="/logo-light.png" width="430" height="435" alt="logo in dark mode" class="hidden dark:flex h-7 w-auto">
                <x-ui.badge size="sm" intent="neutral" class="absolute left-6 -top-2">
                    Beta
                </x-ui.badge>
            </a>
        </div>
        <div x-data x-navbar id="mainNavbar"
            class="flex lg:flex-1 lg:px-10
        fixed w-full lg:w-auto left-0 top-14 lg:top-0 px-1 sm:px-2
        invisible fx-open:visible opacity-0 fx-open:opacity-100 lg:opacity-100 lg:visible scale-90 fx-open:scale-100 lg:scale-100 lg:relative ease-linear duration-200 transition-all lg:transition-none origin-top
        ">
            <x-molecules.nav-items />
        </div>

        <div class="flex items-center gap-1.5 w-max">
            <x-ui.modal.trigger modal-id="search-modal" size="sm" iconOnly variant="flexi" intent="white" radius="none"
                class="rounded-global">
                <span class="iconify ph--magnifying-glass text-sm"></span>
            </x-ui.modal.trigger>
            <x-ui.button href="https://github.com/unoforge/flexiwind" variant="flexi" intent="white" size="sm" iconOnly radius="none"
                class="rounded-global">
                <span class="iconify ph--github-logo"></span>
            </x-ui.button>
            <x-ui.button variant="flexi" intent="white" size="sm" iconOnly radius="none" x-on:click="$store.theme.toggle()"
                aria-label="toggle theme" class="rounded-global relative">
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--sun invisible dark:visible"></span>
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--moon-stars visible dark:invisible"></span>
            </x-ui.button>
        <x-atoms.ui-link href="/the-club" aria-label="Link to club page"
            class="ml-1.5 btn h-8 text-sm px-3 btn-solid btn-solid-primary rounded-lg text-white">
            <span class="iconify ph--cube text-xs mr-1 hidden min-[560px]:flex"></span>
            Join the club
        </x-atoms.ui-link>
        </div>
    </nav>
</header>
