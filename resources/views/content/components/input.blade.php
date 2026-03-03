<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use input for short single-line text, numbers, email, and identifier fields.</x-md.li>
        <x-md.li>Use labels and helper text to make expected format explicit.</x-md.li>
        <x-md.li>Group leading/trailing affordances only when they improve clarity.</x-md.li>
    </x-md.ul>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add input" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.with-label" />

    <x-md.h2>Input Groups</x-md.h2>
    <x-md.paragraph>
        Input groups allow you to compose inputs with leading or trailing elements
        such as icons, prefixes, suffixes, or actions.
    </x-md.paragraph>

    <x-md.paragraph>
        When using <x-docs.inline-code text="x-ui.input.group" />,
        the input itself must be rendered in <strong>unStyled mode</strong>.
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Always pass <x-docs.inline-code text="unStyled" /> to the input</x-md.li>
        <x-md.li>Never pass <x-docs.inline-code text="label" /> to the input</x-md.li>
        <x-md.li>Styling and layout are handled by the group container</x-md.li>
    </x-md.ul>

    <x-md.h3>Leading</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.input.leading" />

    <x-md.h3>Trailing</x-md.h3>
    <x-md.paragraph>
        Trailing elements are commonly used for icons, units, or contextual hints.
        Use <x-docs.inline-code text="x-ui.input.trailing" /> for this purpose.
    </x-md.paragraph>
    <livewire:base.component-tab-preview-code component="components.examples.input.trailing" />

    <x-md.paragraph>
        In some cases, the trailing/leading element can be visually separated
        and styled as part of the control. As you can see in given examples.
    </x-md.paragraph>

    <x-md.h2>Summary</x-md.h2>

    <x-md.ul>
        <x-md.li>Use the <x-docs.inline-code text="label" /> prop for simple inputs</x-md.li>
        <x-md.li>Use <x-docs.inline-code text="x-ui.label" /> for custom layouts</x-md.li>
        <x-md.li>Use <x-docs.inline-code text="x-ui.input.group" /> for composed inputs</x-md.li>
        <x-md.li>Always use <x-docs.inline-code text="unStyled" /> inside groups</x-md.li>
        <x-md.li>Never mix labels with grouped inputs</x-md.li>
    </x-md.ul>


    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Composition
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The main input component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.group" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                A container wrapper for input groups that provides consistent styling and layout
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.leading" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A leading element container for inputs, typically used for icons or text that appears
                    before the input content. Can be positioned absolutely or inline.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.input.trailing" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A trailing element container for inputs, typically used for icons or text that appears
                    after the input content. Can be positioned absolutely or inline.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>



    <x-md.h3>
        Input Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the input component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="type" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The input type. Default: "text"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The size of the input. Options: "sm", "md", "lg", "none". Default: "md"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="disabled" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the input is disabled. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="readonly" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the input is readonly. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="label" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The label text for the input. Default: null
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="noBorder" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border from the input. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="inlinedLabel" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the label should be inline with the input. Default: false
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
                <x-docs.inline-code no-wrap text="unStyled" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes all default styling from the input. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="bgNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the background color from the input. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="radiusNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border radius from the input. Default: false
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
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The size of the group. Options: "sm", "md", "lg", "xl", "none". Default: "md"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="noBorder" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border from the group. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="bgNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the background color from the group. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="radiusNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border radius from the group. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Leading/Trailing Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="absolute" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the element should be positioned absolutely within the input. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the element. Default: ''
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="clickable" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the element should be clickable. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        Full API details are documented in the <strong>References</strong> tables above (component, props, and subcomponents).
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.paragraph>
        The sections above include labeled inputs, grouped inputs, and leading/trailing affordances.
    </x-md.paragraph>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Every input should have an associated visible label.</x-md.li>
        <x-md.li>Expose validation errors with readable text, not color alone.</x-md.li>
        <x-md.li>Preserve keyboard focus visibility and logical tab order.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use consistent validation copy and state colors across forms.</x-md.li>
        <x-md.li>Pre-fill known values to reduce typing and improve completion rates.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use textarea for multi-line content.</x-md.li>
        <x-md.li>Use select/radio when choices are predefined.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
