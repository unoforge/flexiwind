<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">

    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        Define semantic color variables in your CSS, then register them in <x-docs.inline-code text="@theme" />
        so Tailwind utilities like <x-docs.inline-code text="bg-primary" /> and <x-docs.inline-code text="text-foreground" /> are generated.
    </x-md.paragraph>

    <x-md.paragraph>
        Avoid hardcoded hex values in components.
        Change token values in one place and all components update automatically.
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
        These are the CSS variables your theme defines. Update the values to match your brand,
        but keep token names stable so utility usage in templates stays unchanged.
    </x-md.paragraph>

    <livewire:base.load-code :name="['css-variables-color-both', 'css-variables-color-light', 'css-variables-color-dark']" />

    <x-md.h2>Theme Settings</x-md.h2>
    <x-md.paragraph>
        Register your tokens in <x-docs.inline-code text="@theme" /> so Tailwind generates utility classes for them.
        This connects your CSS variables to classes like <x-docs.inline-code text="bg-primary" />,
        <x-docs.inline-code text="text-foreground" />, and <x-docs.inline-code text="border-border" />.
    </x-md.paragraph>

    <livewire:base.load-code :name="['css-variables-colors']" />

</x-layouts.doc-page-wrapper>
