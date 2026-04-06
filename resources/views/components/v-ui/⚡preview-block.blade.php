<?php

use Livewire\Component;

new class extends Component
{
    public string $url = '';

    public function mount(string $url)
    {
        $this->url = $url;
    }

    public function getFullUrl(): string
    {
        if (config('app.debug')) {
            return $this->url;
        }

        return 'https://flexiwind.laravel.cloud' . $this->url;
    }

};
?>

<div class="w-full h-full bg-bg duration-300 ease-linear ui-preview-frame flex items-center justify-center relative overflow-hidden"
    x-data="{ frameIsLoading: true, minLoadingDone: false }"
    x-init="setTimeout(() => minLoadingDone = true, 800)"
    x-effect="if (minLoadingDone && $refs.frame?.contentDocument?.readyState === 'complete') frameIsLoading = false">
    <div x-show="frameIsLoading" class="absolute inset-0" x-cloak>
       <x-ui.skeleton radius="ui" class="size-full" />
    </div>

    <iframe loading="lazy" src="{{ $this->getFullUrl() }}" x-ref="frame"
        x-on:load="if (minLoadingDone) frameIsLoading = false"
        x-preview-frame
        x-bind:data-frame-loading="frameIsLoading"
        class="
            w-full h-full max-h-full data-[frame-loading=true]:invisible data-[frame-loading=true]:opacity-0 overflow-hidden overflow-y-auto
        "></iframe>
</div>
