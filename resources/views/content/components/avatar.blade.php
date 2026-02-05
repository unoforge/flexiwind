<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.avatar.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add avatar avatar-placeholder" />

    <x-md.h2>Placeholder Text</x-md.h2>
    <x-md.h3>With text</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.avatar.placeholder" />
    <x-md.h3>With Icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.avatar.placeholder-with-icon" />

    <x-md.h2>References</x-md.h2>

    <x-md.h3>Avatar Component</x-md.h3>
    <x-md.paragraph>
        The main avatar component is used to display user profile images. It supports different sizes and border radius
        options.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="size" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'default'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the size of the avatar. Available options:
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li><x-docs.inline-code no-wrap text="xs" /> - Extra small</li>
                        <li><x-docs.inline-code no-wrap text="sm" /> - Small</li>
                        <li><x-docs.inline-code no-wrap text="default" /> - Medium (default)</li>
                        <li><x-docs.inline-code no-wrap text="lg" /> - Large</li>
                        <li><x-docs.inline-code no-wrap text="xl" /> - Extra large</li>
                    </ul>
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="radius" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'circle'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the border radius of the avatar. Available options:
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li><x-docs.inline-code no-wrap text="none" /> - No border radius</li>
                        <li><x-docs.inline-code no-wrap text="md" /> - Medium border radius</li>
                        <li><x-docs.inline-code no-wrap text="xl" /> - Extra large border radius</li>
                        <li><x-docs.inline-code no-wrap text="circle" /> - Circular (default)</li>
                    </ul>
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Avatar Placeholder Component</x-md.h3>
    <x-md.paragraph>
        The avatar placeholder component is used when no image is available. It can display text or an icon.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="size" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'default'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the size of the avatar placeholder. Available options are the same as the avatar component.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="radius" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'circle'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the border radius of the avatar placeholder. Available options are the same as the avatar
                    component.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="text" /></x-ui.table.cell>
            <x-ui.table.cell>string|null</x-ui.table.cell>
            <x-ui.table.cell>null</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The text to display inside the avatar placeholder. If not provided, the slot content will be used.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="variant" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'solid'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The visual style variant of the avatar placeholder. Can be one of: 'solid', 'outline', 'ghost', etc.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="intent" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'gray'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The color intent of the avatar placeholder. Common intents include 'primary', 'success', 'warning',
                    'danger', etc.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
</x-layouts.doc-page-wrapper>
