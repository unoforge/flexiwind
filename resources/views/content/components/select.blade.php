<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use select for predefined choices where only one option should be selected.</x-md.li>
        <x-md.li>Prefer concise option labels and logical ordering.</x-md.li>
        <x-md.li>Use grouped options when lists become long or domain-categorized.</x-md.li>
    </x-md.ul>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add select" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.with-label" />

    <x-md.h2>With Icon</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.select.with-icon" />


    <x-md.h2>Icon Indicator</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.select.icon-indicator" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Composition
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.select" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The main select component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.group" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                A container wrapper for select groups that provides consistent styling and layout
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.leading" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A leading element container for selects, typically used for icons or text that appears
                    before the select content. Can be positioned absolutely or inline.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.trailing" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A trailing element container for selects, typically used for icons or text that appears
                    after the select content. Can be positioned absolutely or inline.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>



    <x-md.h3>
        Select Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the select component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The size of the select. Options: "sm", "md", "lg", "none". Default: "md"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="disabled" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the select is disabled. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="readonly" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the select is readonly. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="label" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The label text for the select. Default: null
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="noBorder" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border from the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="inlinedLabel" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the label should be inline with the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="labelClass" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the label. Default: ''
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="bgNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the background color from the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="noIndicator" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the default dropdown indicator arrow from the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="radiusNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border radius from the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="unStyled" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes all default styling from the select. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="groupWrapperClass" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the group wrapper. Default: null
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h3>
        Group Props
    </x-md.h3>
    <x-md.paragraph>
        The select component uses the same input group component. See <x-docs.link href="/components/input">input component references</x-docs.link> for group props.
    </x-md.paragraph>

    <x-md.h3>
        Leading/Trailing Props
    </x-md.h3>
    <x-md.paragraph>
        The select component uses the same input leading and trailing components. See <x-docs.link href="/components/input">input component references</x-docs.link> for leading/trailing props.
    </x-md.paragraph>

    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        Full API details are documented in the <strong>References</strong> section above, including base and group-related props.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.paragraph>
        Use demo, labeled select, icon support, and indicator variants above as integration references.
    </x-md.paragraph>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Always pair select fields with visible labels.</x-md.li>
        <x-md.li>Provide helper text when option meaning is ambiguous.</x-md.li>
        <x-md.li>Keep keyboard interaction and focus states visually obvious.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Preselect context-aware defaults to reduce user friction.</x-md.li>
        <x-md.li>Use placeholder options carefully to avoid accidental invalid submissions.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use radio inputs when all options should be visible simultaneously.</x-md.li>
        <x-md.li>Use autocomplete/combobox patterns for very large option sets.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
