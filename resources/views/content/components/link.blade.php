<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add link" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use links for navigation between pages, resources, and anchored sections.</x-md.li>
        <x-md.li>Use button styling only when a link needs stronger visual action emphasis.</x-md.li>
        <x-md.li>Keep link text explicit about destination and outcome.</x-md.li>
    </x-md.ul>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.with-icon" />
    <x-md.h3>As button</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.link.button" />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="href" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Destination URL. Internal links and hashes stay in the same tab.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="asButton" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Renders the link as a button-styled action while keeping link semantics.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="underlined" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Applies underline styling.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="underlineOffset" /> (none|1|2|3|4|8)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls underline offset when underlined.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="ariaLabel" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Custom accessible label. Recommended for icon-only links.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="disabled" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Adds disabled accessibility attributes and removes focusability.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Best Practices</x-md.h2>
    <x-md.ul>
        <x-md.li>Use descriptive link text instead of generic labels like "Click here".</x-md.li>
        <x-md.li>Reserve button styling for action-like links in compact UIs.</x-md.li>
        <x-md.li>For external links, mention destination when context is unclear.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use inline underlined links for long-form docs and body copy.</x-md.li>
        <x-md.li>Use button-style links in cards, banners, and compact action strips.</x-md.li>
        <x-md.li>For external docs/resources, keep destination trust clear with context text.</x-md.li>
    </x-md.ul>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Ensure icon-only links provide a clear <x-docs.inline-code no-wrap text="ariaLabel" />.</x-md.li>
        <x-md.li>Do not rely on color alone to indicate clickable text.</x-md.li>
        <x-md.li>Use disabled links sparingly and communicate why navigation is unavailable.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use <x-docs.doc-link href="/components/button">button</x-docs.doc-link> for in-place actions that do not navigate.</x-md.li>
        <x-md.li>Use dropdown menus when multiple destination links share one trigger.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
