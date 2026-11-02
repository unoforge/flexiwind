<header class="sticky top-0 z-50 bg-background  border-b border-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="#" class="flex items-center gap-2.5">
                    <div class="size-8 bg-primary text-white rounded-lg d-flex-place-center">
                        <x-ui.icon name="ph--cube" class="size-4.5" />
                    </div>
                    <span class="font-bold text-lg text-foreground hidden sm:inline">Flowboard</span>
                </a>
                <nav class="hidden md:flex items-center gap-1">
                    <x-ui.button variant="ghost" size="sm" class="text-foreground font-medium">Dashboard</x-ui.button>
                    <x-ui.button variant="ghost" size="sm" class="text-muted-foreground">Analytics</x-ui.button>
                    <x-ui.button variant="ghost" size="sm" class="text-muted-foreground">Settings</x-ui.button>
                    <x-ui.button variant="ghost" size="sm" class="text-muted-foreground">Help</x-ui.button>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <x-ui.button variant="ghost" size="sm" iconOnly class="relative">
                    <x-ui.icon name="ph--bell" class="size-5" />
                    <span class="absolute top-1.5 right-1.5 size-1.5 bg-destructive rounded-full"></span>
                </x-ui.button>
                <x-ui.avatar src="/avatar2.webp" alt="User" size="sm" radius="full" />
            </div>
        </div>
    </div>
</header>