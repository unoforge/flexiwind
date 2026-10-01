<div class="min-h-screen font-sans overflow-hidden overflow-y-auto lg:overflow-y-auto">
    <x-ui.sidebar-wrapper
        class="w-64 bg-background  lg:bg-gray-50/50 lg:dark:bg-background  border-r border-border flex-col flex z-60 lg:z-20 fixed left-0 transition-all duration-200 -translate-x-full invisible fx-open:visible fx-open:translate-x-0 lg:translate-x-0 lg:transition-none lg:visible transform h-dvh">
        <div class="h-14 flex items-center px-3 border-b border-border-strong/60">
            <button class="w-full flex items-center gap-2.5 py-1.5 group text-left">
                <div
                    class="size-8 bg-foreground text-background rounded-ui d-flex-place-center shadow-sm transition-colors duration-300">
                    <x-ui.icon name="ph--stack" class="size-3.5" />
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-foreground truncate">
                        Flexiwind
                    </p>
                    <p class="text-[10px] text-muted-foreground/60 font-medium truncate">
                        Sales
                    </p>
                </div>
                <x-ui.icon name="ph--caret-up-down" class="size-4 text-muted-foreground/60 group-hover:text-muted-foreground" />
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 px-3">
            <div class="mt-6 first:mt-1 ">
                <div class="px-2 text-xs font-medium text-muted-foreground/70 uppercase tracking-wider">
                    Main Navigation
                </div>
                <ul class="flex flex-col mt-1 space-y-0.5">
                    <li>
                        <a href="#" data-state="active"
                            class="flex items-center gap-3 px-2 py-1.5 rounded-ui text-sm transition-colors text-muted-foreground/80 hover:bg-card fx-current:bg-muted/60 fx-active:bg-muted/60 fx-active:text-foreground fx-current:text-foreground font-medium">
                            <x-ui.icon name="ph--chart-line-up" class="size-4 opacity-80" />
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-state="inactive"
                            class="flex items-center gap-3 px-2 py-1.5 rounded-ui text-sm transition-colors text-muted-foreground/80 hover:bg-card fx-current:bg-muted/60 fx-active:bg-muted/60 fx-active:text-foreground fx-current:text-foreground font-medium">
                            <x-ui.icon name="ph--chart-pie" class="size-4 opacity-80" />
                            <span>Analytics</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="p-3 border-t border-border-strong/60">
            <x-ui.button type="button" size="none" variant="ghost"
                class="gap-3 w-full px-2 py-2 text-sm font-medium transition-colors">
                <div
                    class="size-6 rounded-full bg-linear-to-tr from-muted to-card d-flex-place-center text-muted-foreground font-semibold ring-1 ring-background">
                    JD
                </div>
                <div class="text-left flex-1">
                    <p class="text-xs font-medium text-foreground truncate">John Doe</p>
                </div>
                <x-ui.icon name="ph--sliders-horizontal" class="size-4" />
            </x-ui.button>
        </div>
    </x-ui.sidebar-wrapper>
    <main class="md:pl-64 flex-1 flex flex-col h-full relative overflow-hidden bg-background ">
        <header
            class="h-14 bg-background  border-b border-border-strong/60 flex items-center justify-between px-6 sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <div class="flex md:hidden border-r border-border pr-2 -ml-2">
                    <x-ui.button data-toggle-sidebar variant="ghost" icon-only size="sm">
                        <x-ui.icon name="ph--door-open" />
                    </x-ui.button>
                </div>
            </div>
            <div class="flex items-center gap-1">

            </div>
        </header>
        <div class="flex-1 overflow-y-auto p-8">

        </div>
    </main>
</div>