<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add meter" />

    <x-md.h2>Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.indicator" />

    <x-md.h2>Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.meter.sizes" />

    <x-md.h2>When to Use Meter vs Progress</x-md.h2>
    <x-md.ul>
        <x-md.li>Use meter for measured values (CPU usage, rating, health score).</x-md.li>
        <x-md.li>Use progress for ongoing tasks (uploading, processing, checkout flow).</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="value" /> (number)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Current measured value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="min" /> (number)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Minimum bound for the scale.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="max" /> (number)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Maximum bound for the scale.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (2xs|xs|sm|md|lg|xl)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls bar height.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="noRadius" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes rounded style.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use meter for quotas and capacity indicators (storage, bandwidth, limits).</x-md.li>
        <x-md.li>Pair with a numeric label for precise interpretation.</x-md.li>
        <x-md.li>Use semantic colors sparingly so threshold meaning stays clear.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
