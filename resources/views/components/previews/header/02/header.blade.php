<header class="h-14 bg-background  border-b border-border flex items-center justify-between px-6 sticky top-0 z-10">
    <div class="flex items-center gap-4">
        <div class="flex md:hidden border-r border-border pr-2">
            <x-ui.button variant="soft" size="sm" icon-only class="">
                <x-ui.icon name="ph--door-open" />
            </x-ui.button>
        </div>
        <x-ui.breadcrumbs class="text-xs sm:text-sm text-muted-foreground">
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
            <x-ui.icon name="ph--magnifying-glass" />
        </x-ui.button>
        <x-ui.button variant="ghost" icon-only size="sm">
            <x-ui.icon name="ph--mailbox" />
        </x-ui.button>
    </div>
</header>
