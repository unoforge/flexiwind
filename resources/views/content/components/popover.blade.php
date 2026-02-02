<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.demo" />


    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add popover" />
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
                <livewire:base.terminal :code="'npm i @flexilla/alpine-popover'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-popover-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-docs.callout intent="gray" type="note">
                    Make sure that the popover package is not installed
                </x-docs.callout>
                <livewire:base.terminal :code="'npm i @flexilla/popover'" />
                <x-md.paragraph>Initialize popover in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-popover-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Filter</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.popover.filter" />
</x-layouts.doc-page-wrapper>
