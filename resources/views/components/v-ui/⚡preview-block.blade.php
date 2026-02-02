<?php

use Livewire\Component;

new class extends Component
{
    public string $url = '';

    public function mount(string $url)
    {
        $this->url = $url;
    }

};
?>

<div class="w-full h-full bg-bg duration-300 ease-linear  ui-preview-frame
    flex items-center justify-center relative lg:group-data-[size=mobile]:rounded-ui lg:group-data-[size=tablet]:rounded-ui
     lg:group-data-[size=tablet]:w-194.5 lg:group-data-[size=mobile]:w-96 overflow-hidden"
    x-data="{ frameIsLoading: true }">
    <div x-show="frameIsLoading" class="absolute inset-0 flex items-center justify-center">
        <x-ui.skeleton radius-none class="size-full rounded-global" />
    </div>

    <iframe loading="lazy" src="{{ $url }}" x-bind:data-frame-loading="frameIsLoading"
        x-on:load="frameIsLoading = false" x-preview-frame
        class="
            w-full h-full max-h-full data-[frame-loading=true]:invisible data-[frame-loading=true]:opacity-0 overflow-hidden
        "></iframe>
</div>
