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

    <x-md.h2>Utilities</x-md.h2>
    
    <x-md.h3>Card Utilities</x-md.h3>
    <x-md.paragraph>
        The <x-docs.inline-code no-wrap text="ui-card" /> utility provides base styling for card components using CSS variables.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="ui-card" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies padding and border radius to card elements using <x-docs.inline-code no-wrap text="--card-padding" /> and <x-docs.inline-code no-wrap text="--card-radius" /> variables.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        <strong>How it works:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Uses <x-docs.inline-code no-wrap text="p-(--card-padding)" /> for padding</x-md.li>
        <x-md.li>Uses <x-docs.inline-code no-wrap text="rounded-(--card-radius)" /> for border radius</x-md.li>
        <x-md.li>Both variables are inherited from the card component's props or can be overridden</x-md.li>
    </x-md.ul>
    <x-md.paragraph>
        <strong>Customization:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Override <x-docs.inline-code no-wrap text="--card-padding" /> to change padding size</x-md.li>
        <x-md.li>Override <x-docs.inline-code no-wrap text="--card-radius" /> to change border radius</x-md.li>
        <x-md.li>Use CSS custom properties for fine-tuned control</x-md.li>
    </x-md.ul>

    <x-md.h3>Inner Radius Utility</x-md.h3>
    <x-md.paragraph>
        The <x-docs.inline-code no-wrap text="inner-radius" /> utility calculates border radius for elements inside cards, accounting for the card's padding.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="inner-radius" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Calculates border radius as <x-docs.inline-code no-wrap text="calc(var(--card-radius) - var(--card-padding))" /> for elements that need to fit perfectly inside card boundaries.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        <strong>Why it's needed:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Ensures inner elements don't overflow card boundaries</x-md.li>
        <x-md.li>Creates perfect visual alignment with card border radius</x-md.li>
        <x-md.li>Prevents visual gaps between card content and border</x-md.li>
        <x-md.li>Useful for buttons, images, or other components inside cards</x-md.li>
    </x-md.ul>
    <x-md.paragraph>
        <strong>Usage example:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['inner-radius-example']" />
    
</x-layouts.doc-page-wrapper>
