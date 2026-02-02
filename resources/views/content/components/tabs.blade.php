<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.tabs.demo" />


    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add tabs" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install Dropdown</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component require JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. Install this only if you
                didn't accept dependencies installation during component addition.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-tabs'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-tabs-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-docs.callout intent="gray" type="note">
                    Make sure that the popover package is not installed
                </x-docs.callout>
                <livewire:base.terminal :code="'npm i @flexilla/tabs'" />
                <x-md.paragraph>Initialize tabs in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-tabs-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Form</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.tabs.form" />


    <x-md.h2>References</x-md.h2>

    <x-md.h3>Tabs Component</x-md.h3>
    <x-md.paragraph>
        The tabs component creates a tabbed interface for organizing content into separate views.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the tabs container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Subcomponents</x-md.h3>
    <x-docs.table :columns="[['label' => 'Component', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="x-ui.tabs.list-wrapper" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Optional wrapper component for the tabs list.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="x-ui.tabs.list" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The container for tab triggers. Should contain one or more <x-docs.inline-code no-wrap
                        text="x-ui.tabs.trigger" /> components.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="x-ui.tabs.trigger" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The clickable tab trigger. Must have an 'id' attribute that matches a corresponding panel's 'id'.
                    Accepts a 'class' prop for custom styling.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="x-ui.tabs.panel-wrapper" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Optional wrapper for tab panels. Can be used to add a common container around all panels.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="x-ui.tabs.panel" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The content panel for a tab. Must have an 'id' attribute that matches a trigger's 'id'.
                    Accepts 'show-as-grid' prop to use CSS Grid for layout.
                    Use the 'active' prop to set the initially visible panel.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Events</x-md.h3>
    <x-docs.table :columns="[['label' => 'Event', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="tab:changed" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Dispatched when the active tab changes. The event detail contains the ID of the newly active tab.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>JavaScript API</x-md.h3>
    <x-md.paragraph>
        To know more about the JavaScript API, check the <x-docs.link
            href="https://flexilla-docs.vercel.app/components/tabs">Flexilla</x-docs.link> documentation.
    </x-md.paragraph>
</x-layouts.doc-page-wrapper>
