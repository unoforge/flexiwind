<?php

use Livewire\Component;

new class extends Component {
    public $allBlocks;

    public function mount()
    {
        $blocks = config('blocks');
        $this->allBlocks = $blocks;
    }
    //
}; ?>
<main class="">
    <x-site.home-hero />
    <x-site.home-why-section />
    <x-site.home-core-features />
    <x-site.list-blocks-section :all-blocks="$allBlocks" />
    <x-site.site-cta />
</main>
