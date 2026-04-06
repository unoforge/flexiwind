<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.checkbox.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add checkbox" />


    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="id" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Input id. If omitted, <x-docs.inline-code no-wrap text="name" /> is used.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="name" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Input name attribute.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="value" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Submitted value when checked.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="checked" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Sets initial checked state.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="disabled" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Disables interaction and applies disabled styles.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (sm|md|lg)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls checkbox visual size.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="label" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Optional inline label rendered next to the checkbox.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Always provide a meaningful label, either via <x-docs.inline-code no-wrap text="label" /> or an external label element.</x-md.li>
        <x-md.li>For grouped checkboxes, wrap related options in a <x-docs.inline-code no-wrap text="fieldset" /> with a clear legend.</x-md.li>
        <x-md.li>Avoid using color alone to communicate checked or error states.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
