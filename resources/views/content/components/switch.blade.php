<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add switch" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.with-label" />


    <x-md.h2>Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.sizes" />

    <x-md.h2>Outlined</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.outlined" />


</x-layouts.doc-page-wrapper>
