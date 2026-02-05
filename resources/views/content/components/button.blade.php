<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add button" />

    <x-md.h2>Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.sizes" />
    <x-md.h2>Icons</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.icons" />
    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.with-icon" />

    <x-md.h3>Variants</x-md.h3>
    <x-docs.preview-ui>
        <x-examples.button.variants />
    </x-docs.preview-ui>
</x-layouts.doc-page-wrapper>
