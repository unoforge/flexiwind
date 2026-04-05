<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.alert-dialog.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>
        Alert dialog relies on the modal system. Install and review modal usage first on the
        <x-docs.doc-link href="/components/modal">modal documentation page</x-docs.doc-link>.
    </x-md.paragraph>


    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal" /> and subcomponents</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Alert dialog is implemented on top of modal primitives and behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.trigger" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Element that opens the confirmation dialog.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.content" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Dialog surface with layout, sizing, and close behavior options.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.header|title|description|footer" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Structured slots for clear confirmation copy and actions.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
