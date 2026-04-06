@php
    $items = [
        [
            'id' => 'group01',
            'title' => 'Main Navigation',
            'items' => [
                [
                    'id' => 'g1_01',
                    'text' => 'Dashboard',
                    'href' => '#',
                    'isActive' => true,
                    'icon' => 'ph--chart-line-up',
                ],
                [
                    'id' => 'g1_02',
                    'text' => 'Analytics',
                    'href' => '#',
                    'icon' => 'ph--chart-pie',
                ],
                [
                    'id' => 'g1_03',
                    'text' => 'Reports',
                    'href' => '#',
                    'icon' => 'ph--file-text',
                ],
                [
                    'id' => 'g1_04',
                    'text' => 'Calendar',
                    'href' => '#',
                    'icon' => 'ph--calendar',
                ],
            ],
        ],
        [
            'id' => 'group02',
            'title' => 'Management',
            'items' => [
                [
                    'id' => 'g2_01',
                    'text' => 'Customers',
                    'href' => '#',
                    'icon' => 'ph--users',
                ],
                [
                    'id' => 'g2_02',
                    'text' => 'Products',
                    'href' => '#',
                    'icon' => 'ph--package',
                ],
                [
                    'id' => 'g2_03',
                    'text' => 'Orders',
                    'href' => '#',
                    'icon' => 'ph--shopping-cart',
                ],
                [
                    'id' => 'g2_04',
                    'text' => 'Inventory',
                    'href' => '#',
                    'icon' => 'ph--warehouse',
                ],
            ],
        ],
    ];
@endphp

<x-ui.sidebar-wrapper
    class="w-64 bg-bg lg:bg-gray-50/50 lg:dark:bg-bg border-r border-border flex-col flex z-60 lg:z-20 fixed left-0 transition-all duration-200 -translate-x-full invisible fx-open:visible fx-open:translate-x-0 lg:translate-x-0 lg:transition-none lg:visible transform h-dvh">
    <div class="h-14 flex items-center px-3 border-b border-border-strong/60">
        <div class="w-full flex items-center gap-2.5 py-1.5 group text-left">
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
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-fg-title truncate">
                    UnoFlex
                </p>
                <p class="text-[10px] text-fg-muted/60 font-medium truncate">
                    Sales
                </p>
            </div>
            <x-ui.button variant="ghost" size="sm" icon-only aria-label="Resize sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-4">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m10 15-3-3 3-3" />
                </svg>
            </x-ui.button>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3">
        @foreach ($items as $item)
            <x-previews.sidebar.01.sidebar-nav-group :title="$item['title']" :items="$item['items']" />
        @endforeach
    </nav>
    <div class="p-3 border-t border-border-strong/60">
        <x-ui.button variant="ghost" size="none"
            class="gap-3 w-full px-2 py-2 text-sm font-medium rounded-ui transition-colors">
            <div
                class="size-6 rounded-full bg-linear-to-tr from-bg-muted to-bg-surface d-flex-place-center text-fg-muted font-semibold ring-1 ring-bg">
                JM
            </div>
            <div class="text-left flex-1">
                <p class="text-xs font-medium text-fg-title truncate">Johnkat MJ</p>
            </div>
            <span aria-hidden="true" class="iconify size-3.5 opacity-80 ph--caret-up"></span>
        </x-ui.button>
    </div>
</x-ui.sidebar-wrapper>