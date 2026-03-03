<header class="sticky top-0 z-50 px-2 md:px-4 pt-2">
    <nav class="bg-bg border border-border rounded-lg p-4 h-16 flex items-center">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center space-x-2">
                <div class="flex lg:hidden pr-2 border-r border-border">
                    <button class="rounded-md btn btn-icon-sm btn-ghost btn-ghost-gray">
                        <span aria-hidden="true" class="iconify ph--door-open"></span>
                    </button>
                </div>
                <a href="#" class="flex items-center space-x-3">
                    <div class="size-8 bg-primary text-white rounded-lg d-flex-place-center">
                        <span aria-hidden="true" class="iconify ph--lightning"></span>
                    </div>
                    <h1 class="text-lg font-semibold text-fg-title hidden sm:inline-flex">
                        WorkSpace
                    </h1>
                </a>
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
                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <span aria-hidden="true" class="iconify ph--bell"></span>
                    <span
                        class="absolute -top-1 -right-1 size-4 bg-danger text-white text-xs rounded-full flex items-center justify-center"
                        data-testid="notification-badge">3</span>
                </x-ui.button>

                <x-ui.button variant="outline" size="sm" iconOnly variant="ghost" class="relative">
                    <span aria-hidden="true" class="iconify ph--envelope"></span>
                </x-ui.button>

                <x-ui.button size="none" variant="ghost"
                    class="items-center space-x-2 cursor-pointer transition-colors">
                    <x-ui.avatar src="https://avatars.githubusercontent.com/u/34010260?v=4" alt="User avatar" width="200"
                        height="200" class="size-8 rounded-full" />
                    <span aria-hidden="true" class="iconify ph--caret-down text-xs text-fg-muted"></span>
                </x-ui.button>
            </div>
        </div>
    </nav>
</header>
