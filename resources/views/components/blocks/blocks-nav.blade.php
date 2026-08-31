@props(['allBlocks' => [], 'category'])


<nav data-scrollable-container
    class="sticky top-0 max-sm:px-3.5 sm:px-8 lg:max-w-336 xl:max-w-352 mx-auto w-full h-12 flex items-center gap-3
          before:absolute before:inset-x-0 before:bottom-0 before:h-0.5 before:bg-linear-to-l before:from-muted/20
          before:via-muted before:to-muted/20 bg-background /60 backdrop-blur-sm rounded-xl z-40">
    <div class="pr-3 border-r border-border">
        <x-ui.slideover.trigger iconOnly class="border border-border" slideOverId="block-list">
            <x-ui.icon name="ph--door-open" />
        </x-ui.slideover.trigger>
    </div>
    <div class="relative flex flex-1 overflow-hidden" x-ui-scrollable>
        <ul data-scrollable
            class="flex-1 flex items-center gap-0.5 h-12 overflow-hidden overflow-x-auto scrollbar-hidden text-sm relative">
            @foreach ($allBlocks as $blockKey => $block)
                <li class="border-b-2 border-transparent has-fx-current:border-primary h-full flex items-center group">
                    <a href="{{ route('blocks.show', [$block['category'], $blockKey]) }}"
                        class="px-3 py-1 inline-flex text-nowrap text-muted-foreground fx-current:text-foreground hover:bg-muted fx-current:bg-muted/70 fx-current:border-border/60 border border-transparent rounded-ui ease-linear duration-200 relative"
                        wire:navigate>
                        {{ $block['title'] ?? ucfirst($blockKey) }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="absolute left-0 inset-y-0 flex items-center">
            <button data-scroll-to-left aria-label="scroll to left"
                class="flex items-center p-1.5 bg-linear-to-r from-card fx-visible:hover:bg-card cursor-not-allowed fx-visible:cursor-pointer text-foreground rounded-md opacity-40 fx-visible:opacity-100 ease-linear backdrop-blur-sm">
                <x-ui.icon name="ph--caret-left" />
            </button>
        </div>
        <div class="absolute right-0 inset-y-0 flex items-center">
            <button data-scroll-to-right aria-label="scroll to right"
                class="flex items-center p-1.5 bg-linear-to-r from-card fx-visible:hover:bg-card cursor-not-allowed fx-visible:cursor-pointer text-foreground rounded-md opacity-40 fx-visible:opacity-100 ease-linear backdrop-blur-sm">
                <x-ui.icon name="ph--caret-right" />
            </button>
        </div>
    </div>
</nav>


<x-ui.slideover position="left" id="block-list">
    <x-ui.slideover.content>
        <livewire:v-ui.blocks-filter />
    </x-ui.slideover.content>
</x-ui.slideover>
