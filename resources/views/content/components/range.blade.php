<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add range" />


    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (xs|sm|md)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls track and thumb sizing.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="min" /> (number|string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Lower bound for slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="max" /> (number|string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Upper bound for slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="customIndicator" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Custom classes for a visual progress indicator tied to slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="thumbBackground" /> (default|current)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Uses current text color for thumb background when set to 'current'. Default: 'default'</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="radius" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls rounded treatment on track/indicator. Default: true</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Stepper</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.stepper" />

    <x-md.h3>Styles</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.styles" />

    <x-md.h3>Custom indicator</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.custom-indicator" />

    <x-md.h3>Sizes</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.sizes" />

   
</x-layouts.doc-page-wrapper>
