<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">
    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        You must have a dedicated file name <x-docs.inline-code text="utilities.css" /> where to put all your utilities.
    </x-md.paragraph>


    <x-md.h2>Variants</x-md.h2>

    <x-md.paragraph>
        There's 4 variants, and each variant has its intents, you can customize each one as you want.
    </x-md.paragraph>



    <x-md.h3>Solid variants</x-md.h3>
    <livewire:base.load-code :name="['ui-solid-both', 'ui-solid-light', 'ui-solid-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-ui />
    </x-docs.component-prev>


    <x-md.h3>Outline variants</x-md.h3>
    <livewire:base.load-code :name="['ui-outline-both', 'ui-outline-light', 'ui-outline-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-ui variant="outline" />
    </x-docs.component-prev>


    <x-md.h3>Soft variants</x-md.h3>
    <livewire:base.load-code :name="['ui-soft-both', 'ui-soft-light', 'ui-soft-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-ui variant="soft" />
    </x-docs.component-prev>

    <x-md.h3>Subtle variants</x-md.h3>
    <livewire:base.load-code :name="['ui-subtle-both', 'ui-subtle-light', 'ui-subtle-dark']" />
    <x-docs.component-prev>
        <x-docs.demo-ui variant="subtle" />
    </x-docs.component-prev>

</x-layouts.doc-page-wrapper>
