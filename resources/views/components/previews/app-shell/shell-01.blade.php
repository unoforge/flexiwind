<x-previews.sidebar.02.sidebar />
<main class="md:pl-64 flex-1 flex flex-col h-full relative overflow-hidden bg-bg">
    <header class="h-14 bg-bg border-b border-border-strong/60 flex items-center justify-between px-6 sticky top-0 z-10">
        <div class="flex items-center gap-4">
            <div class="flex md:hidden border-r border-border pr-2">
                <x-ui.button variant="soft" size="sm" icon-only class="" data-toggle-sidebar>
                    <span aria-hidden="true" class="iconify ph--door-open"></span>
                </x-ui.button>
            </div>
            <x-ui.breadcrumb class="text-xs sm:text-sm text-fg-muted">
                <x-ui.breadcrumb.item href="#">
                    Core
                </x-ui.breadcrumb.item>
                <x-ui.breadcrumb.item active>
                    Dashboard
                </x-ui.breadcrumb.item>
            </x-ui.breadcrumb>
        </div>
        <div class="flex items-center gap-1">
            <div class="h-6 w-px bg-border mx-2 hidden sm:block"></div>
            <x-ui.button variant="ghost" icon-only size="sm">
                <span aria-hidden="true" class="iconify ph--magnifying-glass"></span>
            </x-ui.button>
            <x-ui.button variant="ghost" icon-only size="sm">
                <span aria-hidden="true" class="iconify ph--mailbox"></span>
            </x-ui.button>
        </div>
    </header>



    <!-- Dynamic Content Area -->
    <div class="flex-1 overflow-y-auto p-8 custom-scroll">
        <div class="max-w-5xl mx-auto animate-fade-in" id="main-content-area">
            <div class="mb-8">
                <h1 class="text-xl font-semibold tracking-tight text-fg-title">
                    Dashboard
                </h1>
                <p class="text-sm text-fg-muted mt-1">
                    Real-time overview of system performance.
                </p>
            </div>

            <!-- Stats Grid (Placeholder for dynamic content) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                <div class="rounded-ui h-40 border border-border-strong/70">

                </div>
                <div class="rounded-ui h-40 border border-border-strong/70">

                </div>
                <div class="rounded-ui h-40 border border-border-strong/70">

                </div>
            </div>

            <!-- Context Placeholder -->
            <div class="rounded-ui h-70 border border-border-strong/70">

            </div>
        </div>
    </div>
</main>
