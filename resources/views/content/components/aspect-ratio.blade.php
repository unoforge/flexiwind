<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add aspect" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Square</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.square" />

    <x-md.h3>Video</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.demo" />

    <x-md.h3>Standard TV</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.standard-tv" />

    <x-md.h3>35mm film</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.mm-film" />

    <x-md.h3>Ultra wide</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.ultra-wide" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>Props</x-md.h3>
    <x-md.paragraph>
        The aspect ratio component accepts the following props. The <x-docs.inline-code no-wrap text="aspect" /> prop is required.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="aspect" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'video'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The container ratio. Predefined values include <x-docs.inline-code no-wrap text="video" />, <x-docs.inline-code no-wrap text="square" />, <x-docs.inline-code no-wrap text="35mm-film" />, <x-docs.inline-code no-wrap text="standard-tv" />, and <x-docs.inline-code no-wrap text="ultrawide" />.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional classes for the ratio container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
