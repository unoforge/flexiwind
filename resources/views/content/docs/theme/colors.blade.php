<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">

    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        Flexiwind color tokens are defined with CSS variables and consumed through Tailwind utilities.
        Ensure your main stylesheet (usually <x-docs.inline-code text="app.css" />) is loaded globally,
        and load Flexiwind token definitions before custom overrides.
    </x-md.paragraph>

    <x-md.paragraph>
        Avoid hardcoded hex values in components.
        Use semantic tokens so theme updates happen in one place.
    </x-md.paragraph>

    <x-md.h2>Theme Modes</x-md.h2>
    <x-md.paragraph>
        Choose one mode strategy based on product requirements.
        Most applications should start with <x-docs.inline-code text="both" /> to support light and dark interfaces.
    </x-md.paragraph>

    <x-docs.table :columns="[['label' => 'Mode', 'class' => 'w-48'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="both" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Define variables for both light and dark modes.
                    Best default for applications with user theme switching.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>

        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="light" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Define only light mode variables.
                    Use this when dark mode is intentionally not supported.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>

        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="dark" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Define only dark mode variables.
                    Useful for dark-first products and internal tools.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Variable Tokens</x-md.h2>
    <x-md.paragraph>
        Start from the mode that matches your project, then adjust only semantic token values.
        Keep token names stable to avoid breaking class usage in templates.
    </x-md.paragraph>

    <livewire:base.load-code :name="['css-variables-color-both', 'css-variables-color-light', 'css-variables-color-dark']" />

    <x-md.h2>Theme Settings</x-md.h2>
    <x-md.paragraph>
        Register color tokens in <x-docs.inline-code text="@theme" /> so utilities are generated consistently.
        Once registered, use classes like <x-docs.inline-code text="bg-primary" />,
        <x-docs.inline-code text="text-fg" />, and <x-docs.inline-code text="border-border" />
        throughout your UI.
    </x-md.paragraph>

    <livewire:base.load-code :name="['css-variables-colors']" />

</x-layouts.doc-page-wrapper>
