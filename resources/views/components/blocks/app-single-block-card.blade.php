@props(['key', 'title', 'preview', 'code'=>[]])

@php
    $sizeTriggers = [
        [
            'isActive' => true,
            'target' => 'desktop',
            'icon' => 'ph--laptop',
        ],
        [
            'isActive' => false,
            'target' => 'tablet',
            'icon' => 'ph--device-tablet-camera',
        ],
        [
            'isActive' => false,
            'target' => 'mobile',
            'icon' => 'ph--device-mobile-camera',
        ],
    ];
@endphp

<article class="relative">
    <div aria-hidden="true" class="inset-x-0 absolute top-0 left-0 h-12 border-y border-border-strong/60"></div>
    <x-ui.tabs
        class="relative lg:max-w-[84rem] xl:max-w-[88rem] mx-auto px-2 sm:px-4 xl:px-8 w-full">
        <div aria-hidden="true" class="inset-y-0 inset-x-1.5 sm:inset-x-3.5 xl:inset-x-7.5 pointer-events-none absolute flex scale-y-105 border-x border-border-strong/60"></div>
        <div aria-hidden="true" class="inset-x-0 -bottom-0.5 pointer-events-none absolute flex scale-x-105 border-b border-border-strong/60"></div>

        <x-ui.tabs.list-wrapper class="w-full flex justify-between items-center h-12 px-3.5 bg-bg-muted/50 relative">
            <x-ui.tabs.list class="bg-bg shadow b b-border/50 p-0.5 rounded-md flex items-center">
                <x-ui.tabs.trigger id="previewbox"
                    class="px-3 py-1 flex gap-2 items-center text-sm fx-active:bg-bg-muted/60 border border-transparent fx-active:border-border-strong/40 rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title">
                    <span aria-hidden="true" class="flex iconify ph--eye text-base"></span>
                    <span class="hidden md:flex"> Preview </span>
                </x-ui.tabs.trigger>
                <x-ui.tabs.trigger id="codebox"
                    class="px-3 py-1 flex gap-2 items-center text-sm fx-active:bg-bg-muted/60 border border-transparent fx-active:border-border-strong/40 rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title">
                    <span aria-hidden="true" class="flex iconify ph--code text-base"></span>
                    <span class="hidden md:flex"> Code </span>
                </x-ui.tabs.trigger>
            </x-ui.tabs.list>
            <span class="mx-2.5 flex relative w-px bg-bg-surface-elevated h-6" aria-hidden="true"></span>
            <div class="flex items-center flex-1">
                <span
                    class="px-3 py-1 bg-bg shadow border border-border/50 flex gap-2 items-center text-sm rounded-[5px] ease-linear duration-200 font-300 text-fg">
                    {{ $title }}
                </span>
            </div>
            <div class="flex items-center min-w-max text-fg">
                <div data-box-resize-box
                    class="bg-bg shadow border border-border/50 p-0.5 rounded-md flex items-center data-[position=fixed]:box-resize-controls">
                    <div data-responsive-toggler class="hidden lg:flex lg:fx-hidden-hidden items-center">
                        @foreach ($sizeTriggers as $trigger)
                            <button data-preview-size-trigger
                                data-state="{{ $trigger['isActive'] ? 'active' : 'inactive' }}"
                                data-target={trigger.target}
                                class="px-2 py-1 flex text-sm fx-active:bg-bg-muted/60 border border-transparent fx-active:border-border-strong/40 rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title cursor-pointer">
                                <span aria-hidden="true" class="flex iconify {{ $trigger['icon'] }} text-base" />
                            </button>
                        @endforeach
                        <span class="hidden lg:flex lg:ml-2 lg:mr-1 w-px bg-bg-surface-elevated h-3"
                            aria-hidden="true"></span>
                    </div>
                    <button data-to-fullscreen data-target="mob"
                        class="px-2 py-1 flex fx-hidden:hidden gap-2 items-center text-sm fx-active:bg-bg rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title">
                        <span aria-hidden="true" class="flex iconify ph--corners-out text-base"></span>
                    </button>
                </div>
                <span class="mx-2.5 hidden sm:flex relative w-px bg-bg-surface-elevated h-6" aria-hidden="true"></span>
                <div class="hidden sm:flex">
                    {{-- <CopyBlock client:load /> --}}
                    <x-ui.button size="none" data-copy-code variant="none"
                        class="bg-bg shadow h-8 pl-2 pr-3 text-xs border border-border/50 rounded-md flex justify-center items-center cursor-pointer hover:bg-bg-surface">
                        <span aria-hidden="true" class="flex iconify ph--terminal"></span>
                        <span class="text-fg-muted ml-1">php flexi-cli add ui01</span>
                    </x-ui.button>
                </div>
            </div>
        </x-ui.tabs.list-wrapper>
        <x-ui.tabs.panel-wrapper
            class="bg-bg rounded-md h-[calc(100vh-10rem)] max-h-[51rem] overflow-hidden flex border border-gray-50 dark:border-gray-900 w-full relative">
            <x-ui.tabs.panel active id="previewbox" aria-labelledby="previewbox"
                class="w-full group ring-offset-bg bg-bg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 data-[screen=maximized]:fixed data-[screen=maximized]:border-0 data-[screen=maximized]:h-full data-[screen=maximized]:w-full data-[screen=maximized]:left-0 data-[screen=maximized]:top-0 data-[screen=maximized]:z-120">
                {{-- <PreviewBlock url={block.preview} client:load /> --}}
            </x-ui.tabs.panel>
            <x-ui.tabs.panel id="codebox" aria-labelledby="codebox"
                class="h-full w-full overflow-hidden ring-offset-bg focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">
                <div class="w-full h-full overflow-hidden bg-black">
                    d;dl
                </div>
            </x-ui.tabs.panel>
        </x-ui.tabs.panel-wrapper>
    </x-ui.tabs>


</article>
