<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.divider.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add divider" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.divider.with-label" />

    <x-md.h2>Usage Notes</x-md.h2>
    <x-md.ul>
        <x-md.li>Use subtle spacing around dividers to avoid cramped layouts.</x-md.li>
        <x-md.li>Use labeled dividers to introduce sections like "Or continue with".</x-md.li>
        <x-md.li>Avoid stacking multiple dividers back-to-back.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (default|2|3)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls divider thickness.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="label" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>If provided, renders a labeled divider instead of a plain <x-docs.inline-code no-wrap text="hr" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="labelPlacement" /> (start|middle|end)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Aligns the label across the divider line.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="labelClass" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Additional classes for the label element.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Pair section spacing utilities with dividers to keep rhythm consistent.</x-md.li>
        <x-md.li>Use labeled dividers between auth actions, filter groups, or grouped settings.</x-md.li>
        <x-md.li>Keep divider color subtle so it supports, not dominates, content hierarchy.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
