<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.radio.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add radio" />

    <x-md.h2>Disabled</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.radio.disabled" />

    <x-md.h2>Best Practices</x-md.h2>
    <x-md.ul>
        <x-md.li>Keep option labels short and mutually exclusive.</x-md.li>
        <x-md.li>Preselect a sensible default when possible.</x-md.li>
        <x-md.li>Use a clear group label so the choice context is obvious.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="id" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Input id. Falls back to <x-docs.inline-code no-wrap text="name" /> if omitted.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="name" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Shared group name for mutually exclusive selection.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="value" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Submitted value for this option.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="checked" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Marks this option as selected by default.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="disabled" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Disables the radio option.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (sm|md|lg)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls control size.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="label" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Optional inline label rendered with the radio.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use radios for billing cycles, delivery methods, or preference modes with clear defaults.</x-md.li>
        <x-md.li>Combine with helper text when option consequences are not obvious.</x-md.li>
        <x-md.li>Keep the full option group visible when possible to reduce comparison effort.</x-md.li>
    </x-md.ul>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Group related radios in a fieldset with a descriptive legend.</x-md.li>
        <x-md.li>Make sure each option has a clear text label and sufficient click target size.</x-md.li>
        <x-md.li>Avoid using color alone to indicate selected state.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use <x-docs.doc-link href="/components/select">select</x-docs.doc-link> when the option list is long.</x-md.li>
        <x-md.li>Use <x-docs.doc-link href="/components/checkbox">checkbox</x-docs.doc-link> when multiple selections are allowed.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
