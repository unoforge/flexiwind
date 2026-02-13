<?php

use Livewire\Component;

new class extends Component
{
    public string $key_ui = '';

    public string $title = '';

    public string $preview = '';

    public array $code = [];

    public function mount(string $keyUi, string $preview, string $title, array $code)
    {
        $this->key_ui = $keyUi;
        $this->title = $title;
        $this->preview = $preview;
        $this->code = $code;
    }
};
?>

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

<article x-data x-ui-block wire:key="card-wrapper-{{ $key_ui }}" class="relative w-full">
    <div aria-hidden="true" class="inset-x-0 absolute top-0 left-0 h-12 border-y border-border-strong/60"></div>
    <div class="relative lg:max-w-336 xl:max-w-352 lg:mx-auto px-2 sm:px-4 xl:px-8 w-full">
        <div aria-hidden="true"
            class="inset-y-0 inset-x-1.5 sm:inset-x-3.5 xl:inset-x-7.5 pointer-events-none absolute flex scale-y-105 border-x border-border-strong/60">
        </div>
        <div aria-hidden="true"
            class="inset-x-0 -bottom-0.5 pointer-events-none absolute flex scale-x-105 border-b border-border-strong/60">
        </div>

        <div class="w-full flex justify-between items-center h-12 px-3.5 bg-bg-muted/50 relative">
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
                            <button :key="$trigger['target']" data-preview-size-trigger
                                data-state="{{ $trigger['isActive'] ? 'active' : 'inactive' }}"
                                data-target="{{ $trigger['target'] }}"
                                class="px-2 py-1 flex text-sm fx-active:bg-bg-muted/60 border border-transparent fx-active:border-border-strong/40 rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title cursor-pointer">
                                <span aria-hidden="true" class="flex iconify {{ $trigger['icon'] }} text-base pointer-events-none" />
                            </button>
                        @endforeach
                        <span class="hidden lg:flex lg:ml-2 lg:mr-1 w-px bg-bg-surface-elevated h-3"
                            aria-hidden="true"></span>
                    </div>
                    <x-ui.link href="{{ $preview }}" target="_blank" aria-label="Open in new tab"
                        title="Open in new tab"
                        class="px-2 py-1 flex fx-hidden:hidden gap-2 items-center text-sm fx-active:bg-bg rounded-[5px] ease-linear duration-200 font-300 text-fg fx-active:text-fg-title">
                        <span aria-hidden="true" class="flex iconify ph--arrows-out text-base"></span>
                    </x-ui.link>
                </div>
                <span class="mx-2.5 hidden sm:flex relative w-px bg-bg-surface-elevated h-6" aria-hidden="true"></span>
                <div class="hidden sm:flex">
                    @php
                        $command = "php flexi-cli add {$title}";
                    @endphp
                    <x-ui.button x-copy-command size="none" variant="none" data-command="{{ $command }}"
                        class="bg-bg shadow h-8 pl-2 pr-3 text-xs border border-border/50 rounded-md flex justify-center items-center cursor-pointer hover:bg-bg-surface">
                        <span aria-hidden="true" class="flex iconify ph--terminal"></span>
                        <span class="text-fg-muted ml-1">{{ $command }}</span>
                    </x-ui.button>
                </div>
            </div>
        </div>
        <div data-ui-previewbox
            class="bg-bg rounded-md ui-preview-height ui-preview-frame-box overflow-hidden flex items-center justify-center border border-gray-50 dark:border-gray-900 w-full relative group flex-1">
            <livewire:v-ui.preview-block url="{{ $preview }}" />
        </div>
    </div>
</article>