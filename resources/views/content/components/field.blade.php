<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.paragraph>
        <x-docs.inline-code text="x-ui.field" /> wraps any form control with label, hint, error message,
        and required indicator. It is the recommended way to build forms that need validation,
        helper text, or consistent layout in grids.
    </x-md.paragraph>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.field.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add field" />

    <x-md.h2>With error</x-md.h2>
    <x-md.paragraph>
        Pass an error string to display validation feedback. The hint is automatically hidden
        when an error is present. The inner input must manage its own
        <x-docs.inline-code text="invalid" /> prop for the red border styling.
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.field.with-error" />

    <x-md.h2>In grid layouts</x-md.h2>
    <x-md.paragraph>
        Each field naturally takes its grid cell. No extra wrappers or
        <x-docs.inline-code text="group-wrapper-class" /> workarounds needed.
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.field.grid" />

    <x-md.h2>Guidance</x-md.h2>
    <x-md.ul>
        <x-md.li>The control inside the slot must manage its own <x-docs.inline-code text="invalid" /> state — field only handles label + hint + error display.</x-md.li>
        <x-md.li>Always pass <x-docs.inline-code text="id" /> to the input and match it with <x-docs.inline-code text="for" /> on the field.</x-md.li>
        <x-md.li>Error overrides hint — when <x-docs.inline-code text="error" /> is set, hint is automatically hidden.</x-md.li>
        <x-md.li>Use <x-docs.inline-code text="required" /> to show the asterisk; the control itself still needs <x-docs.inline-code text="required" /> or Livewire validation.</x-md.li>
        <x-md.li>For simple standalone fields without hint/error, the built-in <x-docs.inline-code text="label" /> prop on input/textarea/select is sufficient.</x-md.li>
    </x-md.ul>

    <x-md.h2>Livewire</x-md.h2>
    <livewire:base.terminal code='<x-ui.field label="Email" for="email" :error="$errors->first(\'email\')">
    <x-ui.input type="email" id="email" wire:model="email" :invalid="$errors->has(\'email\')" />
</x-ui.field>' />

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="label" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Label text displayed above the control. Default: null</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="for" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description><x-docs.inline-code text="for" /> attribute on the label (matches the input's <x-docs.inline-code text="id" />).</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="hint" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Helper text in muted color below the control. Hidden when <x-docs.inline-code text="error" /> is set.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="error" /> (string|bool|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Error text in destructive color below the control. Replaces hint. Boolean <x-docs.inline-code text="true" /> hides hint without showing text.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="required" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Adds a red asterisk next to the label.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="labelClass" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Extra classes on the label element.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="class" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Extra classes on the wrapper div. Useful for grid span classes like <x-docs.inline-code text="col-span-full" />.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Avoid</x-md.h2>
    <x-md.ul>
        <x-md.li>Do not pass <x-docs.inline-code text="label" /> to the inner input when using <x-docs.inline-code text="x-ui.field" /> — use the field's <x-docs.inline-code text="label" /> prop instead.</x-md.li>
        <x-md.li>Do not use <x-docs.inline-code text="group-wrapper-class" /> on inputs inside <x-docs.inline-code text="x-ui.field" /> — the field handles layout.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
