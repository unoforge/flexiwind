<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add progress" />

    <x-md.h2>Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.indicator" />

    <x-md.h2>Progressbar Size</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.sizes" />

    <x-md.h2>Progress with Message</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.message" />



</x-layouts.doc-page-wrapper>
