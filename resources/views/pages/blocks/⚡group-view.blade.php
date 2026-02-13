<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new 
#[Layout('layouts.view-block')] 
class extends Component {
    public $blockName;

    public $blockGroup;

    public $allBlocks;

    public function mount($blockName)
    {
        $this->blockName = $blockName;

        // Get all blocks from config
        $blocks = config('blocks');
        $this->allBlocks = $blocks;

        // Check if the block exists
        if (!isset($blocks[$blockName])) {
            $this->blockGroup = [];
        } else {
            // Get the specific block data
            $this->blockGroup = $blocks[$blockName];
        }
    }
};
?>

<main class="w-full overflow-hidden">
    <x-blocks.blocks-nav :current="$blockName" :all-blocks="$allBlocks" />
    @if (isset($blockGroup) && isset($blockGroup['blocks']) && count($blockGroup['blocks']) > 0)
        <x-blocks.block-page-header :title="$blockGroup['title'] ?? 'Block Group'" :description="$blockGroup['description'] ?? 'Block Group Description'" />
        <section class="mt-10 space-y-12 pb-16 w-full">
            @foreach ($blockGroup['blocks'] as $codeKey => $block)
                <livewire:v-ui.single-block
                    wire:key="block-{{ $blockName }}-{{ $codeKey }}-{{ $loop->index }}" :key-ui="$blockName . '-' . $codeKey . '-' . $loop->index"
                    :title="$block['name'] ?? ucfirst($codeKey)" :preview="$block['preview'] ?? '#'" :code="$block" />
            @endforeach
        </section>
    @else
        <div class="lg:max-w-336 xl:max-w-352 mx-auto px-2 sm:px-4 xl:px-8 w-full">
            <div
                class="mt-10 w-full bg-bg-surface border border-border-card/60 p-5 sm:p-10 lg:py-16 rounded-global flex flex-col text-center items-center">
                <h2 class="text-fg-title font-semibold text-3xl">
                    No Block found for <span class="text-primary">{{ $blockGroup['title']?? $blockName }}</span>
                </h2>
                <p class="mx-auto max-w-lg text-fg mt-4">
                    We're working on this, we'll release it soon
                </p>
                <div class="mt-8">
                    <x-ui.button href="https://github.com/unoforge/flexiwind" class="w-max">
                        Bring my contributing
                    </x-ui.button>
                </div>
            </div>
        </div>
    @endif
</main>
