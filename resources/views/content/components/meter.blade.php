<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add meter" />

    <x-md.h2>Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.indicator" />

    <x-md.h2>Meter Size</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.sizes" />



</x-layouts.doc-page-wrapper>
