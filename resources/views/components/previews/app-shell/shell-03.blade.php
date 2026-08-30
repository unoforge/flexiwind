<div class="overflow-hidden overflow-y-auto lg:overflow-y-auto">
    <x-previews.sidebar.03.sidebar />
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
                        Workspace
                    </x-ui.breadcrumbs.item>
                    <x-ui.breadcrumbs.item active>
                        Team
                    </x-ui.breadcrumbs.item>
                </x-ui.breadcrumbs>
            </div>
            <div class="flex items-center gap-1">
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--bell" />
                </x-ui.button>
                <x-ui.button variant="ghost" icon-only size="sm">
                    <x-ui.icon name="ph--chats-circle" />
                </x-ui.button>
                <x-ui.button variant="ghost" size="sm" class="gap-2">
                    <x-ui.avatar src="/defaultavatar.webp" alt="User" size="xs" radius="full" />
                </x-ui.button>
            </div>
        </header>
        <div class="flex-1 overflow-y-auto p-8">
            <div class="lg:max-w-346 mx-auto animate-fade-in" id="main-content-area">
                <div class="rounded-ui border border-border-strong/70 overflow-hidden mb-8">
                    <div class="grid grid-cols-4 gap-px bg-border-strong/30">
                        <div class="bg-background  p-4 h-20">

                        </div>
                        <div class="bg-background  p-4 h-20">

                        </div>
                        <div class="bg-background  p-4 h-20">

                        </div>
                        <div class="bg-background  p-4 h-20">

                        </div>
                    </div>
                </div>

                <div class="rounded-ui border border-border-strong/70 overflow-hidden">
                    <div class="h-10 border-b border-border-strong/40">

                    </div>
                    <div class="divide-y divide-border-strong/30">
                        <div class="flex items-center gap-3 px-4 py-3 h-14">

                        </div>
                        <div class="flex items-center gap-3 px-4 py-3 h-14">

                        </div>
                        <div class="flex items-center gap-3 px-4 py-3 h-14">

                        </div>
                        <div class="flex items-center gap-3 px-4 py-3 h-14">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>