<main class="md:pl-64">
    <header class="w-full flex h-16 bg-background  sticky top-0 z-35">
        <div class="flex items-center justify-between w-full h-full px-4 sm:px-8">
            <div class="flex items-center gap-3">
                <div
                    class="flex md:hidden pr-2 relative before:absolute before:inset-y-2 before:right-0 before:w-0.5 before:bg-border">
                    <button data-toggle-sidebar
                        class="outline-none aspect-square flex flex-col relative justify-center items-center">
                        <x-ui.icon name="ph--door-open" />
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-0.5">
                <x-ui.button variant="ghost" size="sm" iconOnly>
                    <x-ui.icon name="ph--gear" class="size-4.5" />
                </x-ui.button>
                <div class="relative">
                    <x-ui.button variant="ghost" size="sm" iconOnly>
                        <x-ui.icon name="ph--bell" class="size-4.5" />
                    </x-ui.button>
                    <span class="absolute top-1.5 right-2 w-2 h-2 bg-destructive rounded-full border-2 border-background"></span>
                </div>
            </div>
        </div>
    </header>

    {{ $slot }}
</main>