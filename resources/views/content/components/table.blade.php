<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.table.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Add the component</x-md.paragraph>
    <livewire:base.terminal code="flexi-cli add table" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Stripped</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.stripped" />

    <x-md.h3>Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable" />

    <x-md.h3>Stripped Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable-stripped" />

    <x-md.h3>Custom Example 1</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.custom-1" />
</x-layouts.doc-page-wrapper>
