<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.callout.demo" no-in-tabs />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add callout" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Show contextual guidance, warnings, notes, or update messages inline.</x-md.li>
        <x-md.li>Keep callouts concise and place them near related content.</x-md.li>
        <x-md.li>Prefer one callout per section to avoid visual noise.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="type" /> (default|update|note|warning|important)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Defines semantic tone and default icon/intent mapping.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Overrides default type intent when custom coloring is needed.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="variant" /> (solid|soft|subtle|outline|default)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Visual style inherited from alert primitives.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (xs|sm|default|lg)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls spacing and typography density.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="title" /> / <x-docs.inline-code no-wrap text="message" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Quick title/message API when not using slot composition.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="noIcon" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes leading icon and keeps content-only layout.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="iconWrapper" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Additional classes for icon container customization.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Message</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.callout.message" no-in-tabs />

    <x-md.h3>With Title</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.callout.with-title" no-in-tabs />

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Standardize callout tone mapping for release notes, warnings, and migration guides.</x-md.li>
        <x-md.li>Keep callouts near the affected control or content section.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
