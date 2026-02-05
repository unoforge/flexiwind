<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add input" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.with-label" />

    <x-md.h2>With Icon/Text</x-md.h2>
    <x-md.h3>Leading</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.input.leading" />

    <x-md.h3>Trailing</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.input.trailing" />

</x-layouts.doc-page-wrapper>
