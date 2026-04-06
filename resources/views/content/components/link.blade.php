<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add link" />


    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.with-icon" />
    <x-md.h3>As button</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.button" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="href" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Destination URL. Internal links and hashes stay in the same tab.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="asButton" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Renders the link as a button-styled action while keeping link semantics.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="underlined" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Applies underline styling.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="underlineOffset" /> (none|1|2|3|4|8)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls underline offset when underlined.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="ariaLabel" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Custom accessible label. Recommended for icon-only links.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="disabled" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Adds disabled accessibility attributes and removes focusability.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
