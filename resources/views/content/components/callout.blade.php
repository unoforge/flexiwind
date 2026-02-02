<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.callout.demo" no-in-tabs />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add callout" />


    <x-md.h2>Examples</x-md.h2>


    <x-md.h3>Message</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.callout.message" no-in-tabs />


    <x-md.h3>With Title</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.callout.with-title" no-in-tabs />


</x-layouts.doc-page-wrapper>
