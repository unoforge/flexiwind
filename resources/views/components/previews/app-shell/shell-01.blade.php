<div class="overflow-hidden overflow-y-auto lg:overflow-y-auto">
    <x-previews.sidebar.01.sidebar />
    <main class="lg:pl-64 flex-1 flex flex-col h-full relative overflow-hidden bg-background ">
        <header
            class="h-14 bg-background  border-b border-border-strong/60 flex items-center justify-between px-6 sticky top-0 z-10">
            <div class="flex items-center gap-4">
                <div class="flex lg:hidden border-r border-border pr-2">
                    <x-ui.button variant="soft" size="sm" icon-only class="" data-toggle-sidebar>
                        <x-ui.icon name="ph--door-open" />
                    </x-ui.button>
                </div>
                <x-ui.breadcrumbs class="text-xs sm:text-sm text-muted-foreground">
                    <x-ui.breadcrumbs.item href="#">
                        Core
                    </x-ui.breadcrumbs.item>
                    <x-ui.breadcrumbs.item active>
                        Dashboard
                    </x-ui.breadcrumbs.item>
                </x-ui.breadcrumbs>
            </div>
            <div class="flex items-center gap-1">
                <div class="h-6 w-px bg-border mx-2 hidden sm:block"></div>
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--magnifying-glass" />
                </x-ui.button>
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--mailbox" />
                </x-ui.button>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto p-8">
            <div class="lg:max-w-346 mx-auto animate-fade-in" id="main-content-area">
                <div class="mb-8">
                    <h1 class="text-xl font-semibold tracking-tight text-foreground">
                        Dashboard
                    </h1>
                    <p class="text-sm text-muted-foreground mt-1">
                        Real-time overview of system performance.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="rounded-ui h-40 border border-border-strong/70">

                    </div>
                    <div class="rounded-ui h-40 border border-border-strong/70">

                    </div>
                    <div class="rounded-ui h-40 border border-border-strong/70">

                    </div>
                </div>

                <div class="rounded-ui h-70 border border-border-strong/70">

                </div>
            </div>
        </div>
    </main>
</div>