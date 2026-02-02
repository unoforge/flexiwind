<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.default" />


    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Add the component</x-md.paragraph>

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add accordion" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Add the </x-md.h3>
            <x-docs.callout type="note">
                This component require JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <x-md.paragraph>
                    If you've installed the plugin during component addition then you don't need to install it here.
                </x-md.paragraph>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-accordion'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-accordion-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-md.paragraph>
                    By default when adding the component with the CLI it will ask if you want to install dependdencies,
                    and here it comes with the Alpine Plugin, if you've accepted installing it you need to uninstall the
                    plugin and then Install the Vanilla Version
                </x-md.paragraph>
                <livewire:base.terminal :code="'npm i @flexilla/accordion'" />
                <x-md.paragraph>Initialize accordion in <x-docs.inline-code text="app.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-accordion-in-app']" />

            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>


    <x-md.h2>Open multiple</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.multiple" />


    <x-md.h2>Variants</x-md.h2>

    <x-md.h3>Solid</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.solid" />

    <x-md.h3>Soft</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.soft" />

    <x-md.h3>Outline</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.outline" />

    <x-md.h3>Subtle</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.subtle" />

    <x-md.h3>Link</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.accordion.link" />




    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Composition
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.accordion" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The accordion container component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.accordion.item" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The accordion item component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.accordion.trigger" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The accordion trigger component of each item, each item must have one trigger
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.accordion.content" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The accordion content component of each item, each item must have one content
                    and it will be hidden by default and shown when the trigger is clicked
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.accordion.indicator" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The accordion item indicator component, the default is a arrow icon that will be rotated when the
                    item is open. Must be inside the trigger.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>



    <x-md.h3>
        Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the accordion component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="defaultValue" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The default value of the accordion, it will be the value of the item that will be open by default.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="type" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The type of the accordion, it can be "single" or "multiple".
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="keepOneOpen" />(boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    If true, the accordion will keep one item open at a time. All items can't be closed at the same
                    time.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="multiple" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The equivalent of type="multiple"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h3>
        Item Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="id" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The id of the accordion item. It's required and must be unique.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

</x-layouts.doc-page-wrapper>
