<main class="lg:pl-72">
    <header class="w-full flex h-16 bg-bg sticky top-0 z-40">
        <div class="flex items-center justify-between w-full h-full px-4 sm:px-8">
            <div class="flex items-center gap-3">
                <div
                    class="flex lg:hidden pr-2 relative before:absolute before:inset-y-2 before:right-0 before:w-0.5 before:bg-border">
                    <button data-toggle-sidebar
                        class="outline-none w-12 aspect-square flex flex-col relative justify-center items-center">
                        <span
                            class="w-6 h-0.5 rounded-full bg-fg-muted transition-transform duration-300 ease-linear in-[[aria-expanded=true]]:translate-y-1.5 in-[[aria-expanded=true]]:rotate-40"></span>
                        <span
                            class="w-6 origin-center mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear in-[[aria-expanded=true]]:opacity-0 in-[[aria-expanded=true]]:scale-x-0"></span>
                        <span
                            class="w-6 mt-1 h-0.5 rounded-full bg-fg-muted transition-all duration-300 ease-linear in-[[aria-expanded=true]]:-translate-y-1.5 in-[[aria-expanded=true]]:-rotate-40"></span>
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="outline-none">
                    <img src="https://avatars.githubusercontent.com/u/34010260?v=4" alt="user profil avatar"
                        width="240" height="240" class="size-10 rounded-full object-cover" />
                </button>
            </div>
        </div>
    </header>

    {{ $slot }}
</main>
