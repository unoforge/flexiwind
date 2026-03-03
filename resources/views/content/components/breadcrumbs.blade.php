<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component:</x-md.paragraph>
    <livewire:base.terminal code="flexi-cli add breadcrumb" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use breadcrumbs when users navigate nested structures or deep app routes.</x-md.li>
        <x-md.li>Keep hierarchy labels short and consistent with page titles.</x-md.li>
        <x-md.li>Do not use breadcrumbs for flat, single-level navigation.</x-md.li>
    </x-md.ul>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With Icon</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.with-icon" />

    <x-md.h3>Outline wrapper</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.outline" />

    <x-md.h3>Custom indicator</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.breadcrumb.custom-indicator" />

    <x-md.h2>Structure</x-md.h2>
    <x-md.ul>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumb" /> wraps the trail and sets navigation semantics.</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumb.item" /> renders each crumb and separator.</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.breadcrumb.separator" /> customizes the visual divider between items.</x-md.li>
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

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>The component uses <x-docs.inline-code no-wrap text="nav" /> with breadcrumb labeling and <x-docs.inline-code no-wrap text="aria-current='page'" /> on active item.</x-md.li>
        <x-md.li>Keep labels concise and meaningful to help screen reader navigation.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Generate breadcrumb paths from route metadata to keep labels in sync.</x-md.li>
        <x-md.li>Hide less important ancestors on very small screens if space is constrained.</x-md.li>
        <x-md.li>Pair breadcrumbs with page headings for fast orientation.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use sidebar or tabs for section switching in shallow navigation trees.</x-md.li>
        <x-md.li>Use back links when users only need one-level return navigation.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
