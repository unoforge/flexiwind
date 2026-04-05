<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="php artisan flexi:add popover" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install popover dependencies</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                Flexiwind uses
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <x-md.paragraph>
                By default when adding the component with the CLI it will ask if you want to install dependdencies,
            </x-md.paragraph>
            <livewire:base.terminal :code="'npm i @flexilla/popover'" />

        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Usage</x-md.h3>
            <x-md.ol>
                <x-md.li><strong>With Alpine/Livewire</strong></x-md.li>
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-popover-plugin-in-app']" />

                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-md.paragraph>Initialize popover in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-popover-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.popover" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Popover content container connected to a trigger by
                    id.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="id" /> (required)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Unique id used as <x-docs.inline-code no-wrap
                        text="popover-{id}" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="placement" />
                (top|right|bottom|left...)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Preferred placement relative to
                    trigger.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="keepOpen" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls whether clicking inside closes
                    content.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="keepOpenOutside" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Prevents outside click closing
                    behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="gray" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Applies gray background
                    variant.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="trigger" /> (click|hover)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Switches trigger strategy between click and hover. Default: click</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.popover.trigger" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Trigger helper using <x-docs.inline-code no-wrap
                        text="popoverId" /> and button props.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Filter</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.filter" />
</x-layouts.doc-page-wrapper>
