<?php

use Livewire\Component;

new class extends Component {
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

<article x-data x-ui-block wire:key="card-wrapper-{{ $key_ui }}" class="relative w-full px-1 sm:px-4 xl:px-8">
    <x-ui.tabs
        class="relative lg:max-w-336 xl:max-w-352 lg:mx-auto w-full bg-muted/50 ui-card [--card-padding:--spacing(1)] [--card-radius:var(--radius-ui)]">
        <x-ui.tabs.list-wrapper class="w-full flex justify-between items-center h-12 px-3.5 relative">
            <x-ui.tabs.list un-styled class="bg-background  shadow border border-border/50 p-0.5 rounded-md flex items-center">
                <x-ui.tabs.trigger un-styled id="preview"
                    class="px-2 py-1 flex items-center text-sm fx-active:bg-muted/60 fx-active:textfgti border border-transparent fx-active:border-border-strong/30 rounded-[5px] ease-linear duration-200 font-300 text-muted-foreground fx-active:text-foreground cursor-pointer">
                    <x-ui.icon name="ph--eye" class="opacity-70 size-3.5 mr-1" />
                    Preview
                </x-ui.tabs.trigger>
                <x-ui.tabs.trigger un-styled id="code"
                    class="px-2 py-1 flex items-center text-sm fx-active:bg-muted/60 fx-active:textfgti border border-transparent fx-active:border-border-strong/30 rounded-[5px] ease-linear duration-200 font-300 text-muted-foreground fx-active:text-foreground cursor-pointer">
                    <x-ui.icon name="ph--code" class="opacity-70 size-3.5 mr-1" />
                    Code
                </x-ui.tabs.trigger>
            </x-ui.tabs.list>
            <div class="flex items-center min-w-max text-foreground">

                <div class="hidden sm:flex">
                    @php
                        $command = "php artisan flexi:add {$title}";
                    @endphp
                    <x-ui.button x-copy-command size="none" variant="none" data-command="{{ $command }}"
                        class="bg-background  shadow h-8 pl-2 pr-3 text-xs border border-border/50 rounded-md flex justify-center items-center cursor-pointer hover:bg-card">
                        <x-ui.icon name="ph--terminal" class="flex" />
                        <span class="text-muted-foreground ml-1">{{ $command }}</span>
                    </x-ui.button>
                </div>
                <span class="mx-2.5 hidden sm:flex relative w-px bg-muted h-6" aria-hidden="true"></span>
                <div data-box-resize-box
                    class="flex items-center gap-1">
                    <x-ui.link href="{{ $preview }}" target="_blank" aria-label="Open in new tab"
                        title="Open in new tab"
                        class="p-1.5 flex text-sm rounded-[5px] ease-linear duration-200 bg-background  shadow border border-border/50">
                        <x-ui.icon name="ph--arrows-out" class="flex" />
                    </x-ui.link>
                </div>
            </div>
        </x-ui.tabs.list-wrapper>
        <x-ui.tabs.panel active id="preview" class="flex-1">
            <div data-ui-previewbox
                class="bg-background  inner-radius ui-preview-height ui-preview-frame-box overflow-hidden border border-gray-50 dark:border-gray-900 w-full relative group flex-1">
                <livewire:v-ui.preview-block url="{{ $preview }}" />
            </div>
        </x-ui.tabs.panel>
        <x-ui.tabs.panel id="code">
            <livewire:base.load-registry-source :name="$title"/>
        </x-ui.tabs.panel>
    </x-ui.tabs>
</article>