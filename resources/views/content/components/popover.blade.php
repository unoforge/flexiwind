<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add popover" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install popover dependencies</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component requires JS behavior. Flexiwind examples use
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-popover'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-popover-plugin-in-app']" />

                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/popover'" />
                <x-md.paragraph>Initialize popover in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-popover-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use popovers for compact but rich contextual content (forms, filters, action groups).</x-md.li>
        <x-md.li>Keep focus scope tight and avoid turning popovers into full dialogs.</x-md.li>
        <x-md.li>Use clear triggers so users understand where content comes from.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.popover" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Popover content container connected to a trigger by id.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="id" /> (required)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Unique id used as <x-docs.inline-code no-wrap text="popover-{id}" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="placement" /> (top|right|bottom|left...)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Preferred placement relative to trigger.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="keepOpen" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls whether clicking inside closes content.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="keppOpenOut" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Prevents outside click closing behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="gray" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Applies gray background variant.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="triggerOnHover" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Switches trigger strategy from click to hover.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.popover.trigger" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Trigger helper using <x-docs.inline-code no-wrap text="popoverId" /> and button props.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Filter</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.filter" />

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Use keyboard-focusable triggers and clear entry/exit behavior.</x-md.li>
        <x-md.li>Do not overload popovers with long-form content that requires scrolling.</x-md.li>
        <x-md.li>Ensure content remains readable and dismissible on small viewports.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use popovers for compact filter controls, quick actions, and inline details.</x-md.li>
        <x-md.li>Close popovers predictably after completion actions to reduce UI clutter.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use <x-docs.doc-link href="/components/tooltip">tooltip</x-docs.doc-link> for short non-interactive hints.</x-md.li>
        <x-md.li>Use <x-docs.doc-link href="/components/dropdown">dropdown</x-docs.doc-link> for concise action menus.</x-md.li>
        <x-md.li>Use <x-docs.doc-link href="/components/modal">modal</x-docs.doc-link> for complex or high-focus workflows.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
