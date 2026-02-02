<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.divider.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add divider" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.divider.with-label" />

</x-layouts.doc-page-wrapper>
