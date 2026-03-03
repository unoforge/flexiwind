<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.button.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add button" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use buttons for direct actions such as submit, save, delete, and open.</x-md.li>
        <x-md.li>Use one clear primary action per section, then secondary actions as soft/outline.</x-md.li>
        <x-md.li>Keep labels verb-first and specific (for example: "Create project").</x-md.li>
    </x-md.ul>

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

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Use explicit labels for icon-only buttons via <x-docs.inline-code no-wrap text="aria-label" />.</x-md.li>
        <x-md.li>Do not communicate destructive intent with color alone; use clear labels.</x-md.li>
        <x-md.li>Use <x-docs.inline-code no-wrap text="disabled" /> only when users can understand why action is unavailable.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Keep one clear primary action per view and downgrade secondary actions visually.</x-md.li>
        <x-md.li>Use loading/disabled states to prevent duplicate submissions.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use <x-docs.doc-link href="/components/link">link</x-docs.doc-link> for pure navigation semantics.</x-md.li>
        <x-md.li>Use dropdown actions when too many secondary actions clutter the interface.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
