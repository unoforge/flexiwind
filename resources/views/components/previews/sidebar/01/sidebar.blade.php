<x-ui.sidebar-wrapper
    class="fixed h-dvh py-3 overflow-hidden w-11/12 max-w-72 md:w-72 transition-all -translate-x-full fx-open:translate-x-0 lg:-translate-x-0 bg-bg-surface border-r border-bg-muted/70 flex flex-col justify-between px-4 lg:transition-none ease-linear z-80">
    <div class="min-h-max py-2 border-b border-border">
        <a href="#" class="flex items-center gap-x-3 font-semibold text-fg-subtitle">
            <span class="size-9 rounded-md bg-bg-muted d-flex-place-center">
                <span aria-hidden="true" class="iconify ph--scroll"></span>
            </span>
            MyPlan
        </a>
    </div>
    <nav class="flex-1 pt-6 flex flex-col">
        <span class="mb-2 text-sm text-fg-muted uppercase">Navigation</span>
        <ul class="text-fg-muted space-y-2">
            <li
                class="relative before:absolute before:-left-1 before:w-1 before:inset-y-3 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
                <a href="#" data-state="active" aria-label="Link to Dashboard"
                    class="flex items-center px-3 py-2 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
                    <span class="flex iconify ph--house"></span>
                    Dashboard
                </a>
            </li>
            <li
                class="relative before:absolute before:-left-1 before:w-1 before:inset-y-3 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
                <a href="#" aria-label="Link to Dashboard"
                    class="flex items-center px-3 py-2 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
                    <span class="flex iconify ph--note"></span>
                    Notes
                </a>
            </li>
            <li
                class="relative before:absolute before:-left-1 before:w-1 before:inset-y-3 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
                <a href="#" aria-label="Link to Calendar page"
                    class="flex items-center px-3 py-2 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
                    <span class="flex iconify ph--calendar-dots"></span>
                    Calendar
                </a>
            </li>
            <li
                class="relative before:absolute before:-left-1 before:w-1 before:inset-y-3 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
                <a href="#" aria-label="Link to Dashboard"
                    class="flex items-center px-3 py-2 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
                    <span class="flex iconify ph--kanban"></span>
                    Tasks
                </a>
            </li>
        </ul>
    </nav>
    <div>
        <ul class="flex flex-col gap-y-2 text-gray-700 dark:text-gray-300">
            <li
                class="relative before:absolute before:-left-1 before:w-1 before:inset-y-3 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
                <a href="#" aria-label="Link to Dashboard"
                    class="flex items-center px-3 py-2 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
                    <span class="flex iconify ph--gear"></span>
                    Settings
                </a>
            </li>
            <li class="w-full">
                <button aria-label="Show Profile dropdown"
                    class="flex items-center gap-3 w-full p-2 rounded-lg border border-border-strong/40 bg-bg">
                    <div class="size-10 min-w-10 rounded-full overflow-hidden">
                        <img class="size-full rounded-full object-cover"
                            src="https://avatars.githubusercontent.com/u/34010260?v=4" width="200" height="200"
                            alt="Tresor kasenda" />
                    </div>
                    <div class="flex flex-1 justify-between items-center overflow-hidden">
                        <div class="flex flex-col -space-y-0.5 text-left flex-1 overflow-hidden">
                            <span class="font-semibold text-sm text-fg-title truncate">
                                Tresor Kasenda
                            </span>
                            <span class="text-xs text-fg-muted truncate">
                                kasenda@flexilla.info
                            </span>
                        </div>
                        <span aria-hidden="true"
                            class="flex min-w-max">
                            <span class="iconify ph--caret-up-down"></span>
                        </span>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</x-ui.sidebar-wrapper>
