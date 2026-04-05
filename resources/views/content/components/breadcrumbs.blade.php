<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumbs.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component:</x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add breadcrumbs" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With Icon</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumbs.with-icon" />

    <x-md.h3>Outline wrapper</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumbs.outline" />

    <x-md.h3>Custom indicator</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumbs.custom-indicator" />

    <x-md.h2>Structure</x-md.h2>
    <x-md.ul>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumbs" /> wraps the trail and sets navigation semantics.</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumbs.item" /> renders each crumb and separator.</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumbs.separator" /> customizes the visual divider between items.</x-md.li>
    </x-md.ul>

    <x-md.h2>API Highlights</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="spacing" /> (on breadcrumb and item)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls spacing between items and separators.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="href" /> (item)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>If provided and item is not active, renders as a link.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="active" /> (item)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Marks current page and removes separator.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="separator" /> (item/separator)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Changes separator icon or custom text/markup.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="separatorNotIcon" /> (item)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Renders separator content as plain text/html instead of icon class.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
