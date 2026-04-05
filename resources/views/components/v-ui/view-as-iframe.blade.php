@props(['url'])

<div class="w-full h-96 bg-bg duration-300 ease-linear ui-preview-frame
    flex relative overflow-hidden" x-data="{ frameIsLoading: true }">
    <div x-show="frameIsLoading" class="absolute inset-0 flex items-center justify-center">
        <x-ui.skeleton radius-none class="size-full rounded-ui" />
    </div>

    <iframe loading="lazy" src="{{ $url }}" x-bind:data-frame-loading="frameIsLoading"
        x-on:load="frameIsLoading = false" x-preview-frame class="
            w-full h-full max-h-full data-[frame-loading=true]:invisible data-[frame-loading=true]:opacity-0 overflow-hidden overflow-y-auto
        "></iframe>
</div>