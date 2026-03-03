<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.alert-dialog.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>
        Alert dialog relies on the modal system. Install and review modal usage first on the
        <x-docs.doc-link href="/components/modal">modal documentation page</x-docs.doc-link>.
    </x-md.paragraph>

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Deleting records, disconnecting integrations, or irreversible updates.</x-md.li>
        <x-md.li>Actions with significant business or user impact.</x-md.li>
        <x-md.li>Scenarios where accidental clicks are costly.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal" /> and subcomponents</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Alert dialog is implemented on top of modal primitives and behavior.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.trigger" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Element that opens the confirmation dialog.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.content" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Dialog surface with layout, sizing, and close behavior options.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="x-ui.modal.header|title|description|footer" /></x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Structured slots for clear confirmation copy and actions.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.paragraph>
        Use the demo above as the base confirmation pattern, then customize title, description, and action labels for
        your domain action.
    </x-md.paragraph>

    <x-md.h2>Content Guidelines</x-md.h2>
    <x-md.ul>
        <x-md.li>Use a clear action-oriented title (for example: "Delete project?").</x-md.li>
        <x-md.li>Explain the consequence in one short sentence.</x-md.li>
        <x-md.li>Differentiate safe and destructive actions visually and by wording.</x-md.li>
    </x-md.ul>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Keep keyboard focus trapped in the dialog while open.</x-md.li>
        <x-md.li>Provide a clear cancel path and support <x-docs.inline-code no-wrap text="Esc" /> to close when appropriate.</x-md.li>
        <x-md.li>Ensure button labels are explicit (avoid generic "Yes" or "OK").</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use confirmation copy that includes the entity name and irreversible impact.</x-md.li>
        <x-md.li>Align destructive button intent with domain-critical actions only.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use standard <x-docs.doc-link href="/components/modal">modal</x-docs.doc-link> for non-destructive, multi-step content.</x-md.li>
        <x-md.li>Use <x-docs.doc-link href="/components/popover">popover</x-docs.doc-link> for lightweight contextual actions.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
