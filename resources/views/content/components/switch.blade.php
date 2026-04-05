<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add switch" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.with-label" />


    <x-md.h2>Sizes</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.sizes" />

    <x-md.h2>Outlined</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.switch.outlined" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Switch Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the switch component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The size of the switch. Options: "xs", "sm", "md", "lg". Default: "md"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="outlined" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, renders the switch with an outline style instead of filled. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the switch. Default: ''
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>
        Styling
    </x-md.h2>
    <x-md.paragraph>
        The switch component can be customized using CSS classes and CSS custom properties. The component renders as an <x-docs.inline-code no-wrap text="input type="checkbox"" /> element.
    </x-md.paragraph>

    <x-md.h3>
        CSS Custom Properties
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="--knob-bg" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the background color of the switch knob (the circular part that moves).
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Styling Examples
    </x-md.h3>
    <x-md.paragraph>
        <strong>Basic styling with background and knob color:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['switch-basic-styling']" />

    <x-md.paragraph>
        <strong>Outlined switch styling:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['switch-outlined-styling']" />

    <x-md.paragraph>
        <strong>Custom colors and sizes:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['switch-custom-styling']" />

    <x-md.h3>
        Size Classes
    </x-md.h3>
    <x-md.paragraph>
        The switch component automatically applies size classes based on the <x-docs.inline-code no-wrap text="size" /> prop:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="xs" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies <x-docs.inline-code no-wrap text="switch-xs" /> or <x-docs.inline-code no-wrap text="switch-outline-xs" /> class
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="sm" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies <x-docs.inline-code no-wrap text="switch-sm" /> or <x-docs.inline-code no-wrap text="switch-outline-sm" /> class
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="md" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies <x-docs.inline-code no-wrap text="switch-md" /> or <x-docs.inline-code no-wrap text="switch-outline-md" /> class (default)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="lg" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applies <x-docs.inline-code no-wrap text="switch-lg" /> or <x-docs.inline-code no-wrap text="switch-outline-lg" /> class
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
