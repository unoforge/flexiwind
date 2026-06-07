<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <x-md.paragraph>
        Create dismissible content that users can close or hide. Commonly used for alerts, notifications, banners, and temporary messages.
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code component="components.examples.dissmissible.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component</x-md.paragraph>

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="php artisan flexi:add dissmissible" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install dependencies</x-md.h3>
            <x-docs.callout type="note">
                This component requires JavaScript. By default we use the interactive component library
                <x-docs.link href="https://flexilla.unoforge.com/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <livewire:base.terminal :code="'npm i @flexilla/dissmissible'" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Setup</x-md.h3>
            <x-md.paragraph>Add the plugin to your <x-docs.inline-code text="resources/js/app.js" /></x-md.paragraph>
            <livewire:base.load-code :name="['add-dissmissible-plugin-in-app']" />
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>API Reference</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="action" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Determines what happens when dismissed. Default is <x-docs.inline-code text="'remove-from-dom'" /> which removes the element from the document. Other options depend on your JavaScript setup.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="closable" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls whether the close button is displayed. Default is <x-docs.inline-code text="true" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="slot" /> (HTML)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>The main content to be displayed inside the dismissible component.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>

    <x-md.h3>Alert Notification</x-md.h3>
    <x-md.paragraph>
        Dismissible alert notifications for errors, warnings, and general information messages.
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code component="components.examples.dissmissible.alert-notification" />

    <x-md.h3>Custom close button</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.dissmissible.non-closable" />

    <x-md.h2>Composition</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.dissmissible" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The main dismissible container component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.dissmissible.close" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The close button component (automatically included when <x-docs.inline-code text="closable" /> is <x-docs.inline-code text="true" />)
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
