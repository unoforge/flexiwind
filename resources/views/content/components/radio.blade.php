<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.radio.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add radio" />

    <x-md.h2>Disabled</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.radio.disabled" />


</x-layouts.doc-page-wrapper>
