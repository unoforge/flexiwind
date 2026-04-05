<header class="h-14 bg-bg border-b border-border flex items-center justify-between px-6 sticky top-0 z-10">
    <div class="flex items-center gap-4">
        <div class="flex md:hidden border-r border-border pr-2">
            <x-ui.button variant="soft" size="sm" icon-only class="">
                <span aria-hidden="true" class="iconify ph--door-open"></span>
            </x-ui.button>
        </div>
        <x-ui.breadcrumbs class="text-xs sm:text-sm text-fg-muted">
            <x-ui.breadcrumbs.item href="#">
                Core
            </x-ui.breadcrumbs.item>
            <x-ui.breadcrumbs.item active>
                Dashboard
            </x-ui.breadcrumbs.item>
        </x-ui.breadcrumbs>
    </div>
    <div class="flex items-center gap-1">
        <div class="h-6 w-px bg-border mx-2 hidden sm:block"></div>
        <x-ui.button variant="ghost" icon-only size="sm">
            <span aria-hidden="true" class="iconify ph--magnifying-glass"></span>
        </x-ui.button>
        <x-ui.button variant="ghost" icon-only size="sm">
            <span aria-hidden="true" class="iconify ph--mailbox"></span>
        </x-ui.button>
    </div>
</header>
