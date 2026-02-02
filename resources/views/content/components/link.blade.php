<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add link" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.with-icon" />
    <x-md.h3>As button</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.button" />


</x-layouts.doc-page-wrapper>
