<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add input" />

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.input.with-label" />

    <x-md.h2>Input Groups</x-md.h2>
    <x-md.paragraph>
        Input groups allow you to compose inputs with leading or trailing elements
        such as icons, prefixes, suffixes, or actions.
    </x-md.paragraph>

    <x-md.paragraph>
        When using <x-docs.inline-code text="x-ui.input.group" />,
        the input itself must be rendered in <strong>variant mode</strong>.
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Always set <x-docs.inline-code text="variant" /> to <x-docs.inline-code text="unstyled" /> for the input</x-md.li>
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
        <x-md.li>Always use <x-docs.inline-code text="variant" /> inside groups</x-md.li>
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
                <x-docs.inline-code no-wrap text="invalid" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                   Whether the input is invalid or not for visual, default : false.
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
                <x-docs.inline-code no-wrap text="variant" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The variant of the input. Options: "default", "ghost", "flush", "unstyled". Default: "default"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="labelPosition" /> (top|inline)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Position of the label relative to the input. Options: "top", "inline". Default: "top"
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
                <x-docs.inline-code no-wrap text="variant" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The variant of the group. Options: "default", "ghost", "flush", "unstyled". Default: "default"
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

</x-layouts.doc-page-wrapper>
