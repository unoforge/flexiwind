<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">


    <x-md.h2>Using Livewire</x-md.h2>

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Init theme</x-md.h3>
            <x-md.paragraph>
                Add the following code to your layout file head :
            </x-md.paragraph>
            <livewire:base.load-code :name="['theme-alpine-head']" />
        </x-docs.step>

        <x-docs.step>
            <x-md.h3>Theme Store</x-md.h3>
            <x-md.paragraph>
                Add the following code to your app JS file :
            </x-md.paragraph>
            <livewire:base.load-code :name="['theme-alpine']" />
        </x-docs.step>

         <x-docs.step>
            <x-md.h3>Toggle Theme</x-md.h3>
            <x-md.paragraph>
                Add the following code to your layout file :
            </x-md.paragraph>
            <livewire:base.load-code :name="['theme-toggle-button']" />
        </x-docs.step>
    </x-docs.steps>


    <x-md.h2>Without Livewire/Alpine</x-md.h2>

    <x-docs.steps>
         <x-docs.step>
            <x-md.h3>Install flexilla utilities</x-md.h3>
            <x-md.paragraph>
                Install the flexilla utilities package :
            </x-md.paragraph>
            <livewire:base.terminal code="npm i @flexilla/utilities" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Init theme</x-md.h3>
            <x-md.paragraph>
                Add the following code to your layout file head :
            </x-md.paragraph>
            <livewire:base.load-code :name="['theme-vanilla-init-head']" />
        </x-docs.step>

        <x-docs.step>
            <x-md.h3>Usage</x-md.h3>
            <x-md.paragraph>
                Add the following code to your app JS file :
            </x-md.paragraph>
            <livewire:base.load-code :name="['theme-usage']" />
        </x-docs.step>
    </x-docs.steps>

</x-layouts.doc-page-wrapper>
