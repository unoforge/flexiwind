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

<x-ui.sidebar-wrapper class="w-64 bg-bg lg:bg-gray-50/50 lg:dark:bg-bg border-r border-border flex-col flex z-60 md:z-20 fixed left-0 transition-all duration-200 -translate-x-full invisible fx-open:visible fx-open:translate-x-0 lg:translate-x-0 lg:visible transform h-dvh">
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
            <span class="iconify size=4 text-fg-muted/60 group-hover:text-fg-muted ph--caret-up-down">
            </span>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3">
        @foreach ($items as $item)
            <x-previews.sidebar.02.sidebar-nav-group :title="$item['title']" :items="$item['items']" />
        @endforeach
    </nav>
    <div class="p-3 border-t border-border-strong/60">
        <x-ui.button variant="ghost" size="none" class="gap-3 w-full px-2 py-2 text-sm font-medium rounded-ui transition-colors">
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
