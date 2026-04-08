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
    class="fixed h-dvh py-3 overflow-hidden w-11/12 max-w-64 md:w-64 transition-all -translate-x-full fx-open:translate-x-0 md:translate-x-0 bg-bg-surface border-r border-bg-muted/70 flex flex-col justify-between px-4 md:transition-none ease-linear z-80">
    <div class="min-h-max py-2 border-b border-border">
        <a href="#" class="flex items-center gap-x-3 font-semibold text-fg-subtitle">
            <div
                class="size-8 bg-fg-title text-bg rounded-ui d-flex-place-center shadow-sm transition-colors duration-300">
                <svg aria-hidden="true" width="488" height="488" class="size-5" viewBox="0 0 488 488" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_13_164)">
                        <path
                            d="M71.5342 71L416.602 416.068V416.068C321.314 511.356 166.822 511.356 71.5342 416.068V416.068C-23.7537 320.78 -23.7537 166.288 71.5342 71V71Z"
                            fill="currentColor" class=""></path>
                        <path
                            d="M483.659 249.5C483.659 274.629 436.788 344.5 411.659 344.5C386.53 344.5 392.659 274.629 392.659 249.5C392.659 224.371 413.03 204 438.159 204C463.288 204 483.659 224.371 483.659 249.5Z"
                            fill="currentColor" class=""></path>
                        <circle cx="243.429" cy="243.759" r="110" transform="rotate(48.3973 243.429 243.759)"
                            fill="currentColor" stroke="white" stroke-width="80" class="stroke-fg-title"></circle>
                        <path
                            d="M309 71C309 96.129 212.629 101 187.5 101C162.371 101 142 80.629 142 55.5C142 30.371 162.371 10 187.5 10C212.629 10 309 45.871 309 71Z"
                            fill="currentColor" class=""></path>
                        <path
                            d="M417 101.5C417 126.629 415.129 215.5 390 215.5C364.871 215.5 326 126.629 326 101.5C326 76.371 346.371 56 371.5 56C396.629 56 417 76.371 417 101.5Z"
                            fill="currentColor" class=""></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_13_164">
                            <rect width="488" height="488" fill="currentColor" class="text-bg"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            UnoPlanner
        </a>
    </div>
    <nav class="flex-1 pt-6 flex flex-col">
        <span class="mb-2 text-sm text-fg-muted uppercase">Navigation</span>
        <ul class="text-fg-muted space-y-2">
            @foreach ($items as $item)
                <x-previews.sidebar.02.sidebar-item text="{{ $item['text'] }}" href="{{ $item['href'] }}"
                    icon="{{ $item['icon'] }}" :is-active="$item['isActive'] ?? false" />
            @endforeach
        </ul>
    </nav>
    <div>
        <ul class="flex flex-col gap-y-2 text-fg-muted">
            <x-previews.sidebar.02.sidebar-item text="Settings" href="#" icon="ph--gear" />
            <li class="w-full">
                <x-ui.button size="none" variant="ghost" aria-label="Show Profile dropdown"
                    class="gap-3 w-full p-1.5 border border-border-strong/40">
                    <x-ui.avatar src="/avatar1.webp" height="50" width="50" loading="lazy" decoding="async"
                        alt="Johnkat MJ's avatar" size="md" radius="ui" />

                    <div class="flex flex-1 justify-between items-center overflow-hidden">
                        <div class="flex flex-col -space-y-0.5 text-left flex-1 overflow-hidden">
                            <span class="font-semibold text-sm text-fg-title truncate">
                                Johnkat MJ
                            </span>
                            <span class="text-xs text-fg-muted truncate">
                                johnkatmj@gmail.com
                            </span>
                        </div>
                        <span aria-hidden="true" class="flex min-w-max text-fg-muted opacity-60">
                            <span class="iconify ph--caret-up-down"></span>
                        </span>
                    </div>
                </x-ui.button>
            </li>
        </ul>
    </div>
</x-ui.sidebar-wrapper>
