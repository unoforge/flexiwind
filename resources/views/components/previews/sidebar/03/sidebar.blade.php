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

<x-ui.sidebar-overlay
    class="md:hidden md:invisible invisible opacity-0 fx-open:visible fx-open:opacity-100 ease-linear transition-all duration-200 z-40" />
<x-ui.sidebar-wrapper
    class="group fixed md:fx-resized:w-14 w-64 md:transition-[width] ease-linear duration-200
         left-1.5 inset-y-1.5 z-100 flex flex-col overflow-hidden bg-gray-950 border border-gray-800/50 dark:border-gray-800 rounded-ui dark:bg-gray-900/50
         -translate-x-full scale-97 md:translate-x-0 md:scale-100 fx-open:translate-x-0 fx-open:scale-100">
    <div class="px-2 py-1 pb-4 border-b border-white/10">
        <div class="flex items-center gap-3 pt-2">
            <div class="min-w-9 bg-primary text-white size-9 rounded-ui d-flex-place-center">
                <svg aria-hidden="true" width="488" height="488" class="size-7" viewBox="0 0 488 488" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_13_164)">
                        <path
                            d="M71.5342 71L416.602 416.068V416.068C321.314 511.356 166.822 511.356 71.5342 416.068V416.068C-23.7537 320.78 -23.7537 166.288 71.5342 71V71Z"
                            fill="currentColor" class=""></path>
                        <path
                            d="M483.659 249.5C483.659 274.629 436.788 344.5 411.659 344.5C386.53 344.5 392.659 274.629 392.659 249.5C392.659 224.371 413.03 204 438.159 204C463.288 204 483.659 224.371 483.659 249.5Z"
                            fill="currentColor" class=""></path>
                        <circle cx="243.429" cy="243.759" r="110" transform="rotate(48.3973 243.429 243.759)"
                            fill="currentColor" stroke="white" stroke-width="80" class="stroke-primary"></circle>
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
            <div class="lg:group-fx-resized:hidden flex-1 flex flex-col leading-tight">
                <span class="line-clamp-1 text-sm font-bold tracking-wide text-white">Sky Sales</span>
                <span class="line-clamp-1 text-xs text-white/50 tracking-wide">Soft Store</span>
            </div>
        </div>
    </div>
    <ul class="px-2 py-3 flex flex-col gap-0.5 flex-1">
        @foreach ($items as $item)
            <x-previews.sidebar.03.sidebar-item text="{{ $item['text'] }}" href="{{ $item['href'] }}"
                icon="{{ $item['icon'] }}" :is-active="$item['isActive'] ?? false" />
        @endforeach
    </ul>
    <div class="hidden md:flex h-max dark">
        <x-ui.button :radius="false" data-toggle-sidebar-size type='button' size='none' variant='ghost'
            class="flex flex-1 items-center justify-center py-3 border-t border-white/10 transition-colors">
            <x-ui.icon name='ph--caret-right' class="hidden group-fx-resized:inline-flex" />
            <x-ui.icon name='ph--caret-left' class="group-fx-resized:hidden" />
        </x-ui.button>
    </div>
</x-ui.sidebar-wrapper>
