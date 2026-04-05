<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.table.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add table" />
    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Main table wrapper. Supports <x-docs.inline-code no-wrap text="wrapper" />, <x-docs.inline-code no-wrap text="divider" />, <x-docs.inline-code no-wrap text="grid" />, <x-docs.inline-code no-wrap text="striped" />, and <x-docs.inline-code no-wrap text="hoverable" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.columns" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Header wrapper. Supports <x-docs.inline-code no-wrap text="wrapper" />, <x-docs.inline-code no-wrap text="headerBgStyle" />, and <x-docs.inline-code no-wrap text="columnDivider" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.column" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Header cell with <x-docs.inline-code no-wrap text="align" />, <x-docs.inline-code no-wrap text="whiteSpace" />, and <x-docs.inline-code no-wrap text="class" /> props.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.rows" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Body wrapper. Supports <x-docs.inline-code no-wrap text="class" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.row" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Single row supporting <x-docs.inline-code no-wrap text="class" />, and <x-docs.inline-code no-wrap text="striped" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.cell" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Body cell with <x-docs.inline-code no-wrap text="align" />, <x-docs.inline-code no-wrap text="whiteSpace" />, and <x-docs.inline-code no-wrap text="class" /> props.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Striped</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.striped" />

    <x-md.h3>Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable" />

    <x-md.h3>Striped + Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable-striped" />

    <x-md.h3>Custom Example</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.custom-1" />
</x-layouts.doc-page-wrapper>
