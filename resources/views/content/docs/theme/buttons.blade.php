
<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">
    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        You must have a dedicated file name <x-docs.inline-code text="button-styles.css" /> where to put all your button
        utilities.
    </x-md.paragraph>


    <x-md.h2>Variants</x-md.h2>

    <x-md.paragraph>
        There's 4 variants, and each variant has its intents, you can customize each one as you want.
    </x-md.paragraph>



    <x-md.h3>Solid variants</x-md.h3>
    <livewire:base.load-code :name="['btn-solid-both', 'btn-solid-light', 'btn-solid-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-buttons />
    </x-docs.component-prev>


    <x-md.h3>Flexi variants</x-md.h3>
    <livewire:base.load-code :name="['btn-flexi-both', 'btn-flexi-light', 'btn-flexi-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-buttons variant="flexi" />
    </x-docs.component-prev>


    <x-md.h3>Outline variants</x-md.h3>
    <livewire:base.load-code :name="['btn-outline-both', 'btn-outline-light', 'btn-outline-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-buttons variant="outline" />
    </x-docs.component-prev>


    <x-md.h3>Soft variants</x-md.h3>
    <livewire:base.load-code :name="['btn-soft-both', 'btn-soft-light', 'btn-soft-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-buttons variant="soft" />
    </x-docs.component-prev>

    <x-md.h3>Ghost variants</x-md.h3>
    <livewire:base.load-code :name="['btn-ghost-both', 'btn-ghost-light', 'btn-ghost-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-buttons variant="ghost" />
    </x-docs.component-prev>

</x-layouts.doc-page-wrapper>
