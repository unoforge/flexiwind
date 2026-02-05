<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add select" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Card</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.card" />


</x-layouts.doc-page-wrapper>
