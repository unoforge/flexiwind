<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.icon.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add icon" />

    <x-md.h2>Usage</x-md.h2>
    <x-md.paragraph>
        The Icon component provides a simple wrapper around Iconify icons. Use the <x-docs.inline-code no-wrap text="name" /> prop to specify the icon class, <x-docs.inline-code no-wrap text="size" /> for predefined sizes, and <x-docs.inline-code no-wrap text="intent" /> for semantic colors.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Sizes</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.icon.sizes" />

    <x-md.h3>Intents</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.icon.common" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="name" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>The Iconify icon class name (e.g., ph--house, ph--user).</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (xs|sm|md|lg|xl|2xl)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Predefined size for the icon.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (fg|muted|primary|secondary|success|warning|danger)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Semantic color intent for the icon.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="class" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Additional CSS classes for custom styling.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
