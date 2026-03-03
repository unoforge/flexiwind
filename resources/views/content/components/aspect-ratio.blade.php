<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use aspect ratio to preserve media layout before content loads.</x-md.li>
        <x-md.li>Ideal for thumbnails, embeds, and responsive card galleries.</x-md.li>
        <x-md.li>Choose ratios based on media intent, not visual guesswork.</x-md.li>
    </x-md.ul>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add aspect" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Square</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.square" />

    <x-md.h3>Video</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.demo" />

    <x-md.h3>Standard TV</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.standard-tv" />

    <x-md.h3>35mm film</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.mm-film" />

    <x-md.h3>Ultra wide</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.aspect.ultra-wide" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>Props</x-md.h3>
    <x-md.paragraph>
        The aspect ratio component accepts the following props. The <x-docs.inline-code no-wrap text="aspect" /> prop is required.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="aspect" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'video'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The container ratio. Predefined values include <x-docs.inline-code no-wrap text="video" />, <x-docs.inline-code no-wrap text="square" />, <x-docs.inline-code no-wrap text="35mm-film" />, <x-docs.inline-code no-wrap text="standard-tv" />, and <x-docs.inline-code no-wrap text="ultrawide" />.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional classes for the ratio container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        The full prop API is listed in the <strong>References</strong> section above.
    </x-md.paragraph>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Provide descriptive alt text for images inside ratio containers.</x-md.li>
        <x-md.li>Ensure important visual content is not cropped unintentionally.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use consistent ratios in media grids to avoid layout jump between cards.</x-md.li>
        <x-md.li>Pair with lazy loading in long feeds for better performance.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
