<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.table.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add table" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use tables for dense, comparable data across consistent columns.</x-md.li>
        <x-md.li>Prefer concise column labels and predictable value formatting.</x-md.li>
        <x-md.li>Keep important actions visible without overwhelming each row.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Main table wrapper. Supports <x-docs.inline-code no-wrap text="wrapper" /> and <x-docs.inline-code no-wrap text="noDivider" /> options.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.columns" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Header wrapper. Supports <x-docs.inline-code no-wrap text="headerBgStyle" /> and <x-docs.inline-code no-wrap text="columnDivider" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.column" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Header cell with <x-docs.inline-code no-wrap text="align" /> and <x-docs.inline-code no-wrap text="whiteSpace" /> control.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.rows" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Body wrapper with <x-docs.inline-code no-wrap text="stripped" /> and divider behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.row" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Single row supporting <x-docs.inline-code no-wrap text="hoverable" />, <x-docs.inline-code no-wrap text="stripped" />, and <x-docs.inline-code no-wrap text="noDivider" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.table.cell" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Body cell with horizontal alignment and whitespace controls.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Striped</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.stripped" />

    <x-md.h3>Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable" />

    <x-md.h3>Striped + Hoverable</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.hoverable-stripped" />

    <x-md.h3>Custom Example</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.table.custom-1" />

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Use meaningful header cells for each column.</x-md.li>
        <x-md.li>Keep visual hierarchy consistent so rows are easy to scan.</x-md.li>
        <x-md.li>Ensure row hover states are not the only indicator of interactivity.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Define stable column schemas in one place to keep list/detail views aligned.</x-md.li>
        <x-md.li>Use consistent formatting for dates, currency, and status values across rows.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use card or list layouts for small datasets or mobile-first screens.</x-md.li>
        <x-md.li>Use grouped sections when data is narrative rather than comparable.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
