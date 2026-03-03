<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add skeleton" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Card</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.skeleton.card" />

    <x-md.h2>Usage Guidelines</x-md.h2>
    <x-md.ul>
        <x-md.li>Match skeleton shapes to final content structure.</x-md.li>
        <x-md.li>Use skeletons for loading states longer than a quick instant.</x-md.li>
        <x-md.li>Replace with real content as soon as data arrives.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="radiusNone" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes default rounded corners.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="bgNone" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes default background color.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="class" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Use for custom height, width, and layout.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Render skeletons with the same spacing/structure as final content to avoid layout shift.</x-md.li>
        <x-md.li>Replace skeletons progressively when partial data is available.</x-md.li>
        <x-md.li>For lists and tables, keep placeholder counts close to expected loaded rows.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
