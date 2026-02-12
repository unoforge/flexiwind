<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">

    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        Flexiwind color tokens are defined using CSS variables and consumed through Tailwind utilities.
        Make sure your main stylesheet (usually <x-docs.inline-code text="app.css" />) is loaded globally
        and that Flexiwind styles are included before any custom overrides.
    </x-md.paragraph>

    <x-md.paragraph>
        Do not hardcode color values in your UI.
        Always rely on semantic tokens to keep your interface consistent,
        accessible, and theme-ready
    </x-md.paragraph>




    <x-md.h2>Theme Modes</x-md.h2>
    <x-md.paragraph>
        Flexiwind supports multiple <strong>theme modes</strong> depending on
        how your application handles color schemes.
        You can configure your project to support both light and dark themes,
        or restrict it to a single mode.
    </x-md.paragraph>

    <x-docs.table :columns="[['label' => 'Mode', 'class' => 'w-48'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="both" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Defines color variables for both light and dark themes.
                    Recommended for most applications that support theme switching.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>

        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="light" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Defines color variables for light mode only.
                    Use this when your application does not support dark mode.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>

        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="dark" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Defines color variables for dark mode only.
                    Useful for dark-first or terminal-like interfaces.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>



    <x-md.h2>Variable Tokens</x-md.h2>

    <livewire:base.load-code :name="['css-variables-color-both', 'css-variables-color-light', 'css-variables-color-dark']" />


    <x-md.h2>Theme Settings</x-md.h2>


    <x-md.paragraph>
        Define in @theme.
        Once defined, you can use utilities like
        <x-docs.inline-code text="bg-primary" />,
        <x-docs.inline-code text="border-border" />,
        or
        <x-docs.inline-code text="border-success" />
        anywhere in your UI.
    </x-md.paragraph>

    <livewire:base.load-code :name="['css-variables-colors']" />


</x-layouts.doc-page-wrapper>
