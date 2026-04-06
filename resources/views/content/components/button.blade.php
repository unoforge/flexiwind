<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add button" />

    <x-md.h2>Button Principles</x-md.h2>

    <x-md.paragraph>
        In Flexiwind, a button is defined by three core dimensions:
        <strong>variant</strong>, <strong>intent</strong>, and <strong>size</strong>.
        This separation ensures visual consistency, clear action hierarchy,
        and full themeability.
    </x-md.paragraph>

    <x-md.paragraph>
        <strong>Variant</strong> controls the visual treatment of the button,
        while <strong>intent</strong> communicates the meaning of the action.
        If you want to customize the variant, take a look at the
        <x-docs.link href="/docs/theme/buttons">button utilities</x-docs.link> page.
    </x-md.paragraph>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="variant" /> (solid|soft|outline|ghost|none)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls visual style and default intent behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Semantic color tone. Falls back to variant defaults when omitted.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (xs|sm|md|lg|xl)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Defines button dimensions and typography.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="iconOnly" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Switches to icon-size geometry for icon-only actions.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="disabled" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Disables interaction and applies accessibility attributes.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="href" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>When set, renders as anchor; external links open in a new tab.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Sizes</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.sizes" />
    <x-md.h3>Icons</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.icons" />
    <x-md.h3>With icon</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.with-icon" />

    <x-md.h3>Variants</x-md.h3>
    <x-docs.preview-ui>
        <x-examples.button.variants />
    </x-docs.preview-ui>

</x-layouts.doc-page-wrapper>
