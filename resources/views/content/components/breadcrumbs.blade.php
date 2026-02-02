<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Add the component</x-md.paragraph>
    <livewire:base.terminal code="flexi-cli add breadcrumb" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With Icon</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.with-icon" />

    <x-md.h3>Outline wrapper</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.outline" />

    <x-md.h3>Custom indicator</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.custom-indicator" />

</x-layouts.doc-page-wrapper>
