<main class="md:pl-64">
    <header class="w-full flex h-16 bg-bg sticky top-0 z-35">
        <div class="flex items-center justify-between w-full h-full px-4 sm:px-8">
            <div class="flex items-center gap-3">
                <div
                    class="flex md:hidden pr-2 relative before:absolute before:inset-y-2 before:right-0 before:w-0.5 before:bg-border">
                    <button data-toggle-sidebar
                        class="outline-none aspect-square flex flex-col relative justify-center items-center">
                        <span aria-hidden="true" class="iconify ph--door-open"></span>
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-0.5">
                <x-ui.button variant="ghost" size="sm" iconOnly>
                    <span class="iconify ph--gear size-4.5"></span>
                </x-ui.button>
                <div class="relative">
                    <x-ui.button variant="ghost" size="sm" iconOnly>
                        <span class="iconify ph--bell size-4.5"></span>
                    </x-ui.button>
                    <span class="absolute top-1.5 right-2 w-2 h-2 bg-danger rounded-full border-2 border-bg"></span>
                </div>
            </div>
        </div>
    </header>

    {{ $slot }}
</main>