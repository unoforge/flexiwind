<header class="h-14 border-b border-border sticky top-0 bg-background /80 lg:bg-(--docs-bg) backdrop-blur-lg saturate-150 z-40">
    <nav class="docs-container px-4 sm:px-8 flex justify-between h-full items-center">
        <div class="flex items-center gap-3">
            <div class="flex lg:hidden -ml-1.5">
                <button data-sidebar-trigger aria-label="toggle sidebar"
                    class="flex flex-col space-y-2 text-muted-foreground hover:bg-muted ease-linear duration-200 px-1.5 py-2.5 lg:hidden group pr-2 border-r border-muted mr-2">
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
                class="px-3 h-9 border border-input shadow-sm shadow-muted/20 bg-muted/60 hover:bg-muted/60 w-full flex justify-between items-center rounded-ui">
                <x-ui.icon name="ph--magnifying-glass" class="mr-3 text-sm text-muted-foreground" />
                <span class="min-[32rem]:flex-1 min-[32rem]:flex hidden text-muted-foreground text-sm">Search...</span>
                <span class="flex items-center text-sm text-muted-foreground">
                    <x-ui.icon name="ph--command" />
                    K
                </span>
            </x-ui.modal.trigger>
        </div>
        <div class="flex items-center gap-px">
            <x-atoms.ui-link href="https://github.com/unoforge/flexiwind" aria-label="Link to github repo"
                class="hidden min-[22rem]:d-flex-place-center size-8 hover:bg-muted rounded-lg text-foreground hover:text-foreground">
                <x-ui.icon name="ph--github-logo" />
            </x-atoms.ui-link>
            <button x-on:click="$store.theme.toggle()" aria-label="toggle theme"
                class="flex d-flex-place-center size-8 hover:bg-muted rounded-lg text-foreground hover:text-foreground relative">
                <x-ui.icon name="ph--sun" class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 invisible dark:visible" />
                <x-ui.icon name="ph--moon-stars" class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 visible dark:invisible" />
            </button>
            <x-ui.button intent="neutral" size="none" href="/the-club" class="ml-2 h-8 text-sm px-3">
                <x-ui.icon name="ph--cube" class="text-xs mr-1 hidden min-[560px]:flex" />
                Join the club
            </x-ui.button>
        </div>
    </nav>
</header>
