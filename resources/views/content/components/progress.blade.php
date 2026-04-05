<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add progress" />

    <x-md.h2>Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.indicator" />

    <x-md.h2>Progress Bar Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.sizes" />

    <x-md.h2>Progress with Message</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.message" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="value" /> (number)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Current completion value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="max" /> (number)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Total target value (defaults to browser behavior if omitted).</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (2xs|xs|sm|md|lg|xl)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls bar thickness.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="radius" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls rounded corners for progress bars. Default: true</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
