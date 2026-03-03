<header class="sticky top-0 z-50 px-2 md:px-4 pt-2">
    <nav class="bg-bg border border-border rounded-lg p-4 h-16 flex items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-4">
                <div class="flex lg:hidden border-r border-border pr-2">
                    <button class="rounded-md btn btn-icon-sm btn-ghost btn-ghost-gray" data-testid="button-menu">
                        <span aria-hidden="true" class="iconify ph--door-open"></span>
                    </button>
                </div>
                <h1 class="font-semibold text-fg-title hidden truncate sm:inline-flex" data-testid="header-title">
                    Dashboard Overview
                </h1>
            </div>

            <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
                <form class="w-full relative">
                    <x-ui.input.group>
                        <x-ui.input placeholder="Type something..." unStyled class="ps-9" />
                        <x-ui.input.trailing absolute class="flex items-center gap-0.5 text-xs font-light">
                            <x-ui.kbd variant="subtle" intent="gray" size="none" class="size-5 d-flex-place-center">
                                <span class="iconify ph--command"></span>
                            </x-ui.kbd>
                            <x-ui.kbd variant="subtle" intent="gray" size="none" class="size-5 d-flex-place-center">
                                k
                            </x-ui.kbd>
                        </x-ui.input.trailing>
                        <x-ui.input.leading absolute>
                            <span class="iconify ph--magnifying-glass text-xs text-fg-muted"></span>
                        </x-ui.input.leading>
                    </x-ui.input.group>
                </form>
            </div>

            <div class="flex items-center space-x-3">
                <!-- Notifications -->
                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <span aria-hidden="true" class="iconify ph--bell"></span>
                    <span
                        class="absolute -top-1 -right-1 size-4 bg-danger text-white text-xs rounded-full flex items-center justify-center"
                        data-testid="notification-badge">3</span>
                </x-ui.button>

                <!-- Messages -->
                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <span aria-hidden="true" class="iconify ph--envelope"></span>
                </x-ui.button>

                <div
                    class="items-center space-x-2 p-2 btn btn-ghost btn-ghost-gray rounded-md cursor-pointer transition-colors">
                    <img src="https://avatars.githubusercontent.com/u/34010260?v=4" alt="User avatar" width="200"
                        height="200" class="size-8 rounded-full" />
                    <div class="hidden md:flex flex-col flex-1">
                        <p class="text-sm font-medium text-fg-title line-clamp-1">
                            Tresor Kasenda
                        </p>
                        <p class="text-xs text-fg-muted line-clamp-1">
                            Software Developer
                        </p>
                    </div>
                    <span aria-hidden="true" class="iconify ph--caret-down text-xs text-fg-muted"></span>
                </div>
            </div>
        </div>
    </nav>
</header>