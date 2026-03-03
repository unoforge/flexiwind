@php
    $items = [
        [
            'id' => '01',
            'href' => '#',
            'text' => 'Notes',
            'icon' => 'ph--note',
            'isActive' => true,
        ],
        [
            'id' => '02',
            'href' => '#',
            'text' => 'Calendar',
            'icon' => 'ph--calendar',
        ],
        [
            'id' => '03',
            'href' => '#',
            'text' => 'Tasks',
            'icon' => 'ph--kanban',
        ],
    ];
@endphp

<x-ui.sidebar-wrapper
    class="fixed h-dvh py-3 overflow-hidden w-11/12 max-w-64 md:w-64 transition-all -translate-x-full fx-open:translate-x-0 lg:translate-x-0 bg-bg-surface border-r border-bg-muted/70 flex flex-col justify-between px-4 lg:transition-none ease-linear z-80">
    <div class="min-h-max py-2 border-b border-border">
        <a href="#" class="flex items-center gap-x-3 font-semibold text-fg-subtitle">
            <span class="size-7 rounded-md bg-bg-muted d-flex-place-center">
                <span aria-hidden="true" class="iconify size-4 ph--scroll"></span>
            </span>
            MyPlan
        </a>
    </div>
    <nav class="flex-1 pt-6 flex flex-col">
        <span class="mb-2 text-sm text-fg-muted uppercase">Navigation</span>
        <ul class="text-fg-muted space-y-2">
            @foreach ($items as $item)
                <x-previews.sidebar.01.sidebar-item text="{{ $item['text'] }}" href="{{ $item['href'] }}" icon="{{ $item['icon'] }}" :is-active="$item['isActive'] ?? false" />
            @endforeach
        </ul>
    </nav>
    <div>
        <ul class="flex flex-col gap-y-2 text-fg-muted">
            <x-previews.sidebar.01.sidebar-item text="Settings" href="#" icon="ph--gear" />
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
                        <span aria-hidden="true" class="flex min-w-max">
                            <span class="iconify ph--caret-up-down"></span>
                        </span>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</x-ui.sidebar-wrapper>
