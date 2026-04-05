<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.collapse.demo" />


    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component</x-md.paragraph>

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="php artisan flexi:add collapse" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install dependencies</x-md.h3>
            <x-docs.callout type="note">
                This component requires JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <livewire:base.terminal :code="'npm i @flexilla/collapse'" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Usage</x-md.h3>
            <x-md.ol>
                <x-md.li><strong>With Alpine/Livewire</strong></x-md.li>
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-collapse-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>

                <x-md.paragraph>Initialize accordion in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-collapse-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>Close height</x-md.h2>
    <x-md.paragraph>
        You can determine the minimum height for closing collapse
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code component="components.examples.collapse.close-height" />


</x-layouts.doc-page-wrapper>
