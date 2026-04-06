<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add text" />

    <x-md.h2>Usage</x-md.h2>
    <x-md.paragraph>
        The Text component provides semantic text styling with intent-based coloring. Use the <x-docs.inline-code no-wrap text="intent" /> prop to apply different text colors, and <x-docs.inline-code no-wrap text="as" /> to change the HTML tag.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Intents</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text.intents" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (muted|body|title|caption|primary|secondary|warning|danger)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Semantic color intent for the text.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="as" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>HTML tag to render (default: p).</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
