<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.alert.default" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add alert" />


    <x-md.h2>Examples</x-md.h2>

    <x-md.h3>With Title</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.alert.with-title" />

    <x-md.h3>Variants</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.alert.variants" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>Props</x-md.h3>
    <x-md.paragraph>
        The alert component accepts the following props. All props are optional.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="variant" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'solid'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The visual style variant of the alert. Can be 'solid', 'soft', 'outline', 'subtle', or
                    'link'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="intent" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'gray'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The color intent of the alert. Common intents include 'primary', 'success', 'warning', 'danger', and
                    'info'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="size" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'default'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Size of the alert. Can be 'xs', 'sm', 'default', or 'lg'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="radius" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'md'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Border radius of the alert. Common values include 'none', 'sm', 'md', 'lg', 'full'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes to apply to the alert
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
