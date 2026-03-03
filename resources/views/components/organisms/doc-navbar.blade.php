<header class="h-14 border-b border-border sticky top-0 bg-bg/80 lg:bg-(--docs-bg) backdrop-blur-lg saturate-150 z-40">
    <nav class="docs-container px-4 sm:px-8 flex justify-between h-full items-center">
        <div class="flex items-center gap-3">
            <div class="flex lg:hidden -ml-1.5">
                <button data-sidebar-trigger aria-label="toggle sidebar"
                    class="flex flex-col space-y-2 text-fg-muted hover:bg-bg-subtle ease-linear duration-200 px-1.5 py-2.5 lg:hidden group pr-2 border-r border-bg-muted mr-2">
                    <span aria-hidden="true"
                        class="group-fx-open:rotate-45 group-fx-open:translate-y-1.5 w-6 h-0.5 rounded-full bg-current"></span>
                    <span aria-hidden="true"
                        class="group-fx-open:-rotate-45 group-fx-open:-translate-y-1 w-6 h-0.5 rounded-full bg-current"></span>
                </button>
            </div>
            <a href="/" class="hidden min-[34rem]:flex gap-2 items-center relative">
                <x-atoms.site-logo />
            </a>
        </div>
        <div class="sm:max-w-sm flex-1 mr-2 sm:mr-0 flex">
            <x-ui.modal.trigger modal-id="search-modal" size="none" variant="none" radius="none"
                class="px-3 h-9 border border-border-input shadow-sm shadow-bg-muted/20 bg-bg-subtle/60 hover:bg-bg-muted/60 w-full flex justify-between items-center rounded-global">
                <span class="mr-3 iconify ph--magnifying-glass text-sm text-fg-muted"></span>
                <span class="min-[32rem]:flex-1 min-[32rem]:flex hidden text-fg-muted text-sm">Search...</span>
                <span class="flex items-center text-sm text-fg-muted">
                    <span aria-hidden="true" class="iconify ph--command"></span>
                    K
                </span>
            </x-ui.modal.trigger>
        </div>
        <div class="flex items-center gap-px">
            <x-atoms.ui-link href="https://github.com/unoforge/flexiwind" aria-label="Link to github repo"
                class="hidden min-[22rem]:d-flex-place-center size-8 hover:bg-bg-muted rounded-lg text-fg hover:text-fg-title">
                <span class="iconify ph--github-logo"></span>
            </x-atoms.ui-link>
            <button x-on:click="$store.theme.toggle()" aria-label="toggle theme"
                class="flex d-flex-place-center size-8 hover:bg-bg-muted rounded-lg text-fg hover:text-fg-title relative">
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--sun invisible dark:visible"></span>
                <span
                    class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--moon-stars visible dark:invisible"></span>
            </button>
            <x-ui.button intent="neutral" size="none" href="/the-club" class="ml-2 h-8 text-sm px-3">
                <span class="iconify ph--cube text-xs mr-1 hidden min-[560px]:flex"></span>
                Join the club
            </x-ui.button>
        </div>
    </nav>
</header>
