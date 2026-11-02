<header class="sticky top-0 z-50 px-2 md:px-4 pt-2">
    <nav class="bg-background  border border-border rounded-lg p-4 h-16 flex items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-2">
                <div class="flex lg:hidden pr-2 border-r border-border">
                    <button class="rounded-md btn btn-icon-sm btn-ghost btn-ghost-gray">
                        <x-ui.icon name="ph--door-open" />
                    </button>
                </div>
                <a href="#" class="flex items-center space-x-3">
                    <div class="size-8 bg-primary text-white rounded-lg d-flex-place-center">
                        <x-ui.icon name="ph--lightning" />
                    </div>
                    <h1 class="text-lg font-semibold text-foreground hidden sm:inline-flex">
                        WorkSpace
                    </h1>
                </a>
            </div>

            <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
                <form class="w-full relative">
                    <x-ui.input.group>
                        <x-ui.input placeholder="Type something..." variant="unstyled" class="ps-9" />
                        <x-ui.input.trailing absolute class="flex items-center gap-0.5 text-xs font-light">
                            <x-ui.kbd variant="subtle" intent="gray" size="none" class="size-5 d-flex-place-center">
                                <x-ui.icon name="ph--command" />
                            </x-ui.kbd>
                            <x-ui.kbd variant="subtle" intent="gray" size="none" class="size-5 d-flex-place-center">
                                k
                            </x-ui.kbd>
                        </x-ui.input.trailing>
                        <x-ui.input.leading absolute>
                            <x-ui.icon name="ph--magnifying-glass" class="text-xs text-muted-foreground" />
                        </x-ui.input.leading>
                    </x-ui.input.group>

                </form>
            </div>

            <div class="flex items-center space-x-3">
                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <x-ui.icon name="ph--bell" />
                    <span
                        class="absolute -top-1 -right-1 size-4 bg-destructive text-white text-xs rounded-full flex items-center justify-center"
                        data-testid="notification-badge">3</span>
                </x-ui.button>

                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <x-ui.icon name="ph--envelope" />
                </x-ui.button>

                <x-ui.button size="none" variant="ghost"
                    class="items-center space-x-2 cursor-pointer transition-colors">
                    <x-ui.avatar src="/avatar2.webp" alt="User avatar" width="200" loading="lazy" decoding="async"
                        height="200" class="size-8 rounded-full" />
                    <x-ui.icon name="ph--caret-down" class="text-xs text-muted-foreground" />
                </x-ui.button>
            </div>
        </div>
    </nav>
</header>
