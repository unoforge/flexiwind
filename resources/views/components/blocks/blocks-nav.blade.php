@props(['current', 'allBlocks' => []])


<nav data-scrollable-container
    class="sticky top-0 lg:max-w-[84rem] xl:max-w-[88rem] mx-auto w-full h-12 flex items-center
          before:absolute before:inset-x-0 before:bottom-0 before:h-0.5 before:bg-gradient-to-l before:from-bg-muted/20
          before:via-bg-muted before:to-bg-muted/20 bg-bg/60 backdrop-blur-sm rounded-xl z-40">
    <ul data-scrollable
        class="flex items-center gap-0.5 h-12 px-6 sm:px-8 overflow-hidden overflow-x-auto scrollbar-hidden text-sm relative">
        @foreach ($allBlocks as $blockKey => $block)
            <li data-state="{{ $blockKey === $current ? 'active' : 'inactive' }}"
                class="border-b-2 border-transparent fx-active:border-primary h-full flex items-center group">
                <a href="{{ route('blocks.show', $blockKey) }}"
                    class="px-3 py-1 inline-flex text-nowrap text-fg-muted group-fx-active:text-fg-subtitle hover:bg-bg-muted group-fx-active:bg-bg-muted/70 group-fx-active:border-border/60 border border-transparent rounded-global ease-linear duration-200 relative" wire:navigate>
                    {{ $block['title'] ?? ucfirst($blockKey) }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="absolute left-0 inset-y-0 flex items-center">
        <button data-scroll-to-left aria-label="scroll to left"
            class="flex items-center p-1.5 bg-gradient-to-r from-bg-surface fx-visible:hover:bg-bg-surface cursor-not-allowed fx-visible:cursor-pointer text-fg rounded-md opacity-40 fx-visible:opacity-100 ease-linear backdrop-blur-sm">
            <span aria-hidden="true" class="i-ph-caret-left text-xl"></span>
        </button>
    </div>
    <div class="absolute right-0 inset-y-0 flex items-center">
        <button data-scroll-to-right aria-label="scroll to right"
            class="flex items-center p-1.5 bg-gradient-to-r from-bg-surface fx-visible:hover:bg-bg-surface cursor-not-allowed fx-visible:cursor-pointer text-fg rounded-md opacity-40 fx-visible:opacity-100 ease-linear backdrop-blur-sm">
            <span aria-hidden="true" class="i-ph-caret-right text-xl"></span>
        </button>
    </div>
</nav>
