<div class="min-h-screen font-sans overflow-hidden overflow-y-auto lg:overflow-y-auto">
    <x-ui.sidebar-wrapper
        class="w-64 bg-bg lg:bg-gray-50/50 lg:dark:bg-bg border-r border-border flex-col flex z-60 lg:z-20 fixed left-0 transition-all duration-200 -translate-x-full invisible fx-open:visible fx-open:translate-x-0 lg:translate-x-0 lg:transition-none lg:visible transform h-dvh">
        <div class="h-14 flex items-center px-3 border-b border-border-strong/60">
            <button class="w-full flex items-center gap-2.5 py-1.5 group text-left">
                <div
                    class="size-8 bg-fg-title text-bg rounded-ui d-flex-place-center shadow-sm transition-colors duration-300">
                    <span aria-hidden="true" class="size-3.5 iconify ph--stack"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-fg-title truncate">
                        Flexiwind
                    </p>
                    <p class="text-[10px] text-fg-muted/60 font-medium truncate">
                        Sales
                    </p>
                </div>
                <span class="iconify size-4 text-fg-muted/60 group-hover:text-fg-muted ph--caret-up-down">
                </span>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 px-3">
            <div class="mt-6 first:mt-1 ">
                <div class="px-2 text-xs font-medium text-fg-muted/70 uppercase tracking-wider">
                    Main Navigation
                </div>
                <ul class="flex flex-col mt-1 space-y-0.5">
                    <li>
                        <a href="#" data-state="active"
                            class="flex items-center gap-3 px-2 py-1.5 rounded-ui text-sm transition-colors text-fg-muted/80 hover:bg-bg-surface fx-current:bg-bg-muted/60 fx-active:bg-bg-muted/60 fx-active:text-fg-title fx-current:text-fg-title font-medium">
                            <span aria-hidden="true" class="iconify size-4 opacity-80 ph--chart-line-up"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-state="inactive"
                            class="flex items-center gap-3 px-2 py-1.5 rounded-ui text-sm transition-colors text-fg-muted/80 hover:bg-bg-surface fx-current:bg-bg-muted/60 fx-active:bg-bg-muted/60 fx-active:text-fg-title fx-current:text-fg-title font-medium">
                            <span aria-hidden="true" class="iconify size-4 opacity-80 ph--chart-pie"></span>
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
                    class="size-6 rounded-full bg-linear-to-tr from-bg-muted to-bg-surface d-flex-place-center text-fg-muted font-semibold ring-1 ring-bg">
                    JD
                </div>
                <div class="text-left flex-1">
                    <p class="text-xs font-medium text-fg-title truncate">John Doe</p>
                </div>
                <span aria-hidden="true" class="iconify size-4 ph--sliders-horizontal"></span>
            </x-ui.button>
        </div>
    </x-ui.sidebar-wrapper>
    <main class="md:pl-64 flex-1 flex flex-col h-full relative overflow-hidden bg-bg">
        <header
            class="h-14 bg-bg border-b border-border-strong/60 flex items-center justify-between px-6 sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <div class="flex md:hidden border-r border-border pr-2 -ml-2">
                    <x-ui.button data-toggle-sidebar variant="ghost" icon-only size="sm">
                        <span aria-hidden="true" class="iconify ph--door-open"></span>
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