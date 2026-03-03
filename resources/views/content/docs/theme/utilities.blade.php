<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">
    <x-md.h2>Prerequisites</x-md.h2>
    <x-md.paragraph>
        Create a dedicated file such as <x-docs.inline-code text="utilities.css" /> for reusable theme utilities.
        Keep these utilities separate from component files to avoid duplicated style logic.
    </x-md.paragraph>

    <x-md.paragraph>
        Import utility definitions after theme tokens so utility classes can consume final variable values.
    </x-md.paragraph>

    <x-md.h2>Variants</x-md.h2>

    <x-md.paragraph>
        Utility variants mirror the same semantic intent system used across themed components.
        Choose a variant family, then apply the intent classes that match your use case.
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

    <x-md.h2>Utilities</x-md.h2>

    <x-md.h3>Card Utility</x-md.h3>
    <x-md.paragraph>
        <x-docs.inline-code no-wrap text="ui-card" /> applies shared card spacing and radius using theme variables.
        Use it as a base utility when you want cards to follow token-driven sizing.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="ui-card" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies padding and radius from <x-docs.inline-code no-wrap text="--card-padding" /> and
                    <x-docs.inline-code no-wrap text="--card-radius" />.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        <strong>How it works:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Uses <x-docs.inline-code no-wrap text="p-(--card-padding)" /> for internal spacing</x-md.li>
        <x-md.li>Uses <x-docs.inline-code no-wrap text="rounded-(--card-radius)" /> for outer radius</x-md.li>
        <x-md.li>Can be overridden per component when needed</x-md.li>
    </x-md.ul>
    <x-md.paragraph>
        <strong>Customization:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Override <x-docs.inline-code no-wrap text="--card-padding" /> for compact or spacious layouts</x-md.li>
        <x-md.li>Override <x-docs.inline-code no-wrap text="--card-radius" /> for roundness style changes</x-md.li>
        <x-md.li>Keep variable names stable so utility class usage stays unchanged</x-md.li>
    </x-md.ul>

    <x-md.h3>Inner Radius Utility</x-md.h3>
    <x-md.paragraph>
        <x-docs.inline-code no-wrap text="inner-radius" /> keeps inner elements aligned with the card's inner curve.
        It subtracts card padding from the outer radius to avoid visual overflow.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="inner-radius" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Computes <x-docs.inline-code no-wrap text="calc(var(--card-radius) - var(--card-padding))" />
                    for inner content blocks.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        <strong>Why it's useful:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Prevents inner surfaces from clipping beyond the card shape</x-md.li>
        <x-md.li>Keeps nested UI visually aligned with outer radius</x-md.li>
        <x-md.li>Works well for media blocks, nested actions, and inset containers</x-md.li>
    </x-md.ul>
    <x-md.paragraph>
        <strong>Usage example:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['inner-radius-example']" />

</x-layouts.doc-page-wrapper>
