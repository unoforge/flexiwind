<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add skeleton" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Card</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.card" />


    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="radius" /> (circle)</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls border radius. Options: circle (default), ui
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="bgNone" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes default background color.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
