<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add range" />

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use range for bounded numeric input where drag interaction is useful.</x-md.li>
        <x-md.li>Great for volume, threshold, intensity, and similar continuous values.</x-md.li>
        <x-md.li>Expose min/max context so users understand the selected scale.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (xs|sm|md)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls track and thumb sizing.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="min" /> (number|string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Lower bound for slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="max" /> (number|string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Upper bound for slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="customIndicator" /> (string|null)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Custom classes for a visual progress indicator tied to slider value.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="thumbBgCurrent" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Uses current text color for thumb background.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="noRadius" /> (boolean)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Removes rounded treatment on track/indicator.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Stepper</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.stepper" />

    <x-md.h3>Styles</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.styles" />

    <x-md.h3>Custom indicator</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.custom-indicator" />

    <x-md.h3>Sizes</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.range.sizes" />

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Always pair range with a visible label and readable current value.</x-md.li>
        <x-md.li>Keep keyboard operation intact for fine adjustments.</x-md.li>
        <x-md.li>Ensure adequate contrast for track, thumb, and progress indicator.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Bind slider values to live preview text so users understand impact immediately.</x-md.li>
        <x-md.li>Use sensible min/max defaults from domain constraints.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use numeric input when precision entry is more important than drag interaction.</x-md.li>
        <x-md.li>Use select/radio when the value set is small and discrete.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
