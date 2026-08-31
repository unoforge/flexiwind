<div class="overflow-hidden overflow-y-auto lg:overflow-y-auto">
    <x-previews.sidebar.02.sidebar />
    <main class="lg:pl-64 flex-1 flex flex-col h-full relative overflow-hidden bg-background ">
        <header
            class="h-14 bg-background  border-b border-border-strong/60 flex items-center justify-between px-6 sticky top-0 z-10">
            <div class="flex items-center gap-3">
                <div class="flex lg:hidden border-r border-border pr-2">
                    <x-ui.button variant="soft" size="sm" icon-only class="" data-toggle-sidebar>
                        <x-ui.icon name="ph--door-open" />
                    </x-ui.button>
                </div>
                <x-ui.breadcrumbs class="text-xs sm:text-sm text-muted-foreground">
                    <x-ui.breadcrumbs.item href="#">
                        Apps
                    </x-ui.breadcrumbs.item>
                    <x-ui.breadcrumbs.item active>
                        Analytics
                    </x-ui.breadcrumbs.item>
                </x-ui.breadcrumbs>
            </div>
            <div class="flex items-center gap-1">
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--bell" />
                </x-ui.button>
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--question" />
                </x-ui.button>
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--gear" />
                </x-ui.button>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto p-8">
            <div class="lg:max-w-346 mx-auto animate-fade-in" id="main-content-area">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="rounded-ui h-48 border border-border-strong/70">

                    </div>
                    <div class="rounded-ui h-48 border border-border-strong/70">

                    </div>
                </div>

                <div class="rounded-ui border border-border-strong/70 mb-8">
                    <div class="h-10 border-b border-border-strong/40">

                    </div>
                    <div class="p-4 space-y-3">
                        <div class="h-10 rounded-ui bg-muted/40">

                        </div>
                        <div class="h-10 rounded-ui bg-muted/40">

                        </div>
                        <div class="h-10 rounded-ui bg-muted/40">

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="rounded-ui h-32 border border-dashed border-border-strong/50">

                    </div>
                    <div class="rounded-ui h-32 border border-dashed border-border-strong/50">

                    </div>
                    <div class="rounded-ui h-32 border border-dashed border-border-strong/50">

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>