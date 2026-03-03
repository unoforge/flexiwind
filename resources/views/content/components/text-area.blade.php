<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use textarea for multi-line input such as notes, descriptions, and long messages.</x-md.li>
        <x-md.li>Choose auto-resize only when vertical growth helps readability.</x-md.li>
        <x-md.li>Set expectations with placeholder and helper text.</x-md.li>
    </x-md.ul>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text-area.demo" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="flexi-cli add text-area" />

    <x-md.h2>Resize none</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text-area.no-resize" />

    <x-md.h2>Auto resize</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text-area.auto-resize" />

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install Autoresize plugin</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component requires JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. You can install the
                Alpine Plugin if using Alpine or the vanilla JS version as you need
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-autoresize-area'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-auto-resize-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-autoresize-area'" />
                <x-md.paragraph>Initialize Auto resize in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-auto-resize-in-app']" />

            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>With label</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.text-area.with-label" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Composition
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.textarea" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The main textarea component
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Textarea Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the textarea component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="type" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The textarea type. Default: "text"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The size of the textarea. Options: "sm", "md", "lg". Default: "md"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="disabled" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the textarea is disabled. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="readonly" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the textarea is readonly. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="label" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The label text for the textarea. Default: null
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="noBorder" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Removes the border from the textarea. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="inlinedLabel" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the label should be inline with the textarea. Default: false
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
                <x-docs.inline-code no-wrap text="radius" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The border radius size. Default: "lg"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="autoResize" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Enables automatic height adjustment based on content. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="resizeNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Disables manual resizing of the textarea. Default: false
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
    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        The complete API is documented in the <strong>References</strong> section above, including textarea props and utility behavior.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.paragraph>
        The examples above demonstrate default, no-resize, auto-resize, and labeled usage.
    </x-md.paragraph>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Always associate textarea fields with a visible label.</x-md.li>
        <x-md.li>Provide validation and helper text that can be understood without color cues.</x-md.li>
        <x-md.li>Keep focus state visible for keyboard users.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use character counters when content limits matter.</x-md.li>
        <x-md.li>Persist draft text for long-form user input flows.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use input for short single-line values.</x-md.li>
        <x-md.li>Use rich text editors only when formatting is truly required.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
