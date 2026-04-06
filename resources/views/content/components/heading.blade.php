<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.heading.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add heading" />

    <x-md.h2>Usage</x-md.h2>
    <x-md.paragraph>
        The Heading component provides semantic heading levels (H1-H5) with consistent sizing. Use the <x-docs.inline-code no-wrap text="level" /> prop to set the heading level, and <x-docs.inline-code no-wrap text="intent" /> for color styling.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Levels</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.heading.levels" />

    <x-md.h3>Intents</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.heading.intents" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="level" /> (1|2|3|4|5)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Heading level determining the HTML tag (h1-h5) and size.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (title|body|muted|primary|secondary|danger|warning)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Semantic color intent for the heading.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
