<header class="sticky top-0 z-50 bg-background ">
    <div class="flex items-center justify-between h-14 px-4 sm:px-6">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="flex md:hidden border-r border-border pr-2">
                    <x-ui.button variant="ghost" size="sm" iconOnly>
                        <x-ui.icon name="ph--list" class="size-5" />
                    </x-ui.button>
                </div>
                <span class="text-lg font-bold text-foreground tracking-tight">Analytics</span>
            </div>
            <div class="h-5 w-px bg-border hidden sm:block"></div>
            <x-ui.breadcrumbs class="hidden sm:flex text-sm">
                <x-ui.breadcrumbs.item href="#">Home</x-ui.breadcrumbs.item>
                <x-ui.breadcrumbs.item href="#">Analytics</x-ui.breadcrumbs.item>
                <x-ui.breadcrumbs.item active>Overview</x-ui.breadcrumbs.item>
            </x-ui.breadcrumbs>
        </div>
        <div class="flex items-center gap-2">
            <div class="hidden md:flex items-center bg-muted/50 rounded-lg p-0.5 border border-border">
                <x-ui.button size="xs" variant="ghost" class="text-foreground font-medium">Daily</x-ui.button>
                <x-ui.button size="xs" variant="ghost" class="text-muted-foreground">Weekly</x-ui.button>
                <x-ui.button size="xs" variant="ghost" class="text-muted-foreground">Monthly</x-ui.button>
            </div>
            <div class="h-5 w-px bg-border mx-1 hidden sm:block"></div>
            <x-ui.button variant="ghost" size="sm" iconOnly>
                <x-ui.icon name="ph--download" class="size-4.5" />
            </x-ui.button>
            <x-ui.button variant="ghost" size="sm" iconOnly>
                <x-ui.icon name="ph--gear" class="size-4.5" />
            </x-ui.button>
            <x-ui.button variant="ghost" size="sm" iconOnly class="relative">
                <x-ui.icon name="ph--bell" class="size-4.5" />
                <span class="absolute top-1.5 right-1.5 size-1.5 bg-destructive rounded-full"></span>
            </x-ui.button>
            <x-ui.avatar src="/defaultavatar.webp" alt="User" size="sm" radius="full" />
        </div>
    </div>
</header>