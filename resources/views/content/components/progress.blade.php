<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.progress.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add progress" />

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
            <x-ui.table.cell><x-docs.inline-code no-wrap text="noRadius" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes rounded corners for squared progress bars.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Best Practices</x-md.h2>
    <x-md.ul>
        <x-md.li>Use determinate progress when task length is known.</x-md.li>
        <x-md.li>Pair progress bars with short status text for clarity.</x-md.li>
        <x-md.li>For unknown duration, use a skeleton or spinner instead.</x-md.li>
    </x-md.ul>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Provide nearby text that describes what is progressing.</x-md.li>
        <x-md.li>Keep updates meaningful; avoid overly noisy UI updates.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
