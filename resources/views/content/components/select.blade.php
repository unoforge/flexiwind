<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add select" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.with-label" />

    <x-md.h2>With Icon</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.select.with-icon" />


    <x-md.h2>Icon Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.icon-indicator" />

</x-layouts.doc-page-wrapper>
