<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.tooltip.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="php artisan flexi:add tooltip" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install tooltip dependencies</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component requires JS behavior. Flexiwind examples use
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine/Livewire</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-tooltip'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-tooltip-plugin-in-app']" />

                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/tooltip'" />
                <x-md.paragraph>Initialize tooltip in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-tooltip-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.tooltip" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Main tooltip content container attached to trigger by id.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="id" /> (required)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Unique id used as <x-docs.inline-code no-wrap text="tooltip-{id}" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="placement" /> (top|right|bottom|left...)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Preferred tooltip placement.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="bg" /> (default|gray|neutral|dark)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Background style preset for tooltip content.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="trigger" /> (hover|click)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Switches trigger strategy between hover and click. Default: hover</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.tooltip.trigger" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Trigger helper component with <x-docs.inline-code no-wrap text="tooltipId" /> plus button props.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

   
</x-layouts.doc-page-wrapper>
