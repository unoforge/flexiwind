<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add range" />

    <x-md.h2>Stepper</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.stepper" />

    <x-md.h2>Styles</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.styles" />

    <x-md.h2>Custom indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.custom-indicator" />

    <x-md.h2>Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.sizes" />


</x-layouts.doc-page-wrapper>
