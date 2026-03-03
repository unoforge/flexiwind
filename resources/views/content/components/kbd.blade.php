<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.kbd.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add kbd" />

    <x-md.h2>With Icon or Symbol</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.kbd.icon" />

    <x-md.h2>Grouped</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.kbd.grouped" />

    <x-md.h2>Usage Notes</x-md.h2>
    <x-md.ul>
        <x-md.li>Use short, recognizable labels like <x-docs.inline-code no-wrap text="Ctrl" />, <x-docs.inline-code no-wrap text="Cmd" />, or <x-docs.inline-code no-wrap text="Enter" />.</x-md.li>
        <x-md.li>Keep grouped shortcuts consistent in order (modifier keys first).</x-md.li>
        <x-md.li>Pair shortcuts with actionable UI labels for discoverability.</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="variant" /> (solid|soft|subtle|outline|default)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Controls visual style.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="intent" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Semantic color intent for the selected variant.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="size" /> (none|xs|sm|default|lg|xl)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Changes keycap size and typography.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell><x-docs.inline-code no-wrap text="radius" /> (string)</x-ui.table.cell>
            <x-ui.table.cell><x-docs.table-description>Rounded style token passed to the component.</x-docs.table-description></x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use kbd inside command palettes, menus, and table actions to teach shortcuts progressively.</x-md.li>
        <x-md.li>Match displayed key names with the real app shortcut bindings.</x-md.li>
        <x-md.li>Keep shortcut groups compact to preserve scanability in dense layouts.</x-md.li>
    </x-md.ul>

</x-layouts.doc-page-wrapper>
