@props([
    'class' => '',
    'closestEl' => '[data-code-block]',
    'btnClass' => '',
    'inTabs'=>false
])

<div 
    x-data="copyToClipboard('{{ $closestEl }}', {{ $inTabs }})"
    class="{{ $class }}"
>
    <button 
        aria-label="copy code to clipboard"
        :data-state="copiedState"
        :disabled="copiedState === 'copied'"
        x-on:click="handleCopy()"
        class="group cursor-pointer btn btn-icon-sm rounded-lg hover-bg-gray950 dark-hover-bg-gray900 flex{{ $btnClass }}}"
    >
        <span aria-hidden="true" class="flex relative ease-linear text-sm">
            <span 
                aria-hidden="true"
                class="flex iconify ph--copy-simple absolute opacity-100 scale-100 group-data-[state='copied']:opacity-0 group-data-[state='copied']:scale-60 top-1/2 left-1/2 -translate-1/2 ease-linear duration-200"
            ></span>
            <span 
                aria-hidden="true"
                class="iconify ph--check-square-offset group-data-[state='copied']:flex absolute opacity-0 scale-60 group-data-[state='copied']:opacity-100 group-data-[state='copied']:scale-100 top-1/2 left-1/2 -translate-1/2 ease-linear duration-200"
            ></span>
        </span>
    </button>
</div>

