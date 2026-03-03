<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use dropdowns for compact action lists and contextual menu options.</x-md.li>
        <x-md.li>Keep items concise and grouped by user intent.</x-md.li>
        <x-md.li>Avoid placing critical long-form flows inside dropdown menus.</x-md.li>
    </x-md.ul>

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.dropdown.demo" />


    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component</x-md.paragraph>

    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Install the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add dropdown" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install dependencies</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component requires JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. Install this only if you
                did not accept dependency installation when adding the component.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-dropdown'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-dropdown-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-docs.callout intent="gray" type="note">
                    Make sure that the dropdown package is not installed
                </x-docs.callout>
                <livewire:base.terminal :code="'npm i @flexilla/dropdown'" />
                <x-md.paragraph>Initialize dropdown in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-dropdown-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>


    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With icons</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.dropdown.with-icon" />

    <x-md.h3>With header</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.dropdown.with-header" />

    <x-md.h3>Submenu</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.dropdown.sub-menu" />

    <x-md.h2>References</x-md.h2>

    <x-md.h3>Dropdown Component</x-md.h3>
    <x-md.paragraph>
        The dropdown component creates a toggleable menu that appears when a trigger element is clicked.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="id" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>-</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A unique identifier for the dropdown. Required for proper functionality.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="placement" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'bottom'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls where the dropdown appears relative to the trigger. Common values:
                    <ul class="list-disc pl-5 mt-2 space-y-1">
                        <li><x-docs.inline-code no-wrap text="top" />, <x-docs.inline-code no-wrap
                                text="top-start" />, <x-docs.inline-code no-wrap text="top-end" /></li>
                        <li><x-docs.inline-code no-wrap text="right" />, <x-docs.inline-code no-wrap
                                text="right-start" />, <x-docs.inline-code no-wrap text="right-end" /></li>
                        <li><x-docs.inline-code no-wrap text="bottom" /> (default), <x-docs.inline-code no-wrap
                                text="bottom-start" />, <x-docs.inline-code no-wrap text="bottom-end" /></li>
                        <li><x-docs.inline-code no-wrap text="left" />, <x-docs.inline-code no-wrap
                                text="left-start" />, <x-docs.inline-code no-wrap text="left-end" /></li>
                    </ul>
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="keepOpen" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, clicking inside the dropdown won't close it. Useful for dropdowns with interactive
                    content.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="keppOpenOut" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, clicking outside the dropdown won't close it. The dropdown can only be closed
                    programmatically.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the dropdown container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="contentClass" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the dropdown content area.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Subcomponents</x-md.h3>
    <x-md.paragraph>
        The dropdown system includes several subcomponents for building rich dropdown menus.
    </x-md.paragraph>

    <x-docs.table :columns="[['label' => 'Component', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.trigger" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The clickable element that toggles the dropdown. Must have 'dropdown-id' attribute. The
                    'dropdown-id' attribute must match the 'id' attribute of the x-ui.dropdown component.
                    It inherits all attributes from the x-ui.button component.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.item" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A standard menu item. Can be used for navigation or actions.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.item-submenu" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Creates a nested submenu.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.separator" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A horizontal line to separate groups of menu items.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.header" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A header section for grouping related menu items.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.icon" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    An icon that can be placed next to menu items.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.dropdown.kbd" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Displays a keyboard shortcut key.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>JavaScript API</x-md.h3>
    <x-md.paragraph>
        To know more about the JavaScript API, check the <x-docs.link
            href="https://flexilla-docs.vercel.app/docs/components/dropdown">Flexilla Dropdown</x-docs.link>
        documentation.
    </x-md.paragraph>
    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        The API is documented in the <strong>References</strong> section above, including core props and subcomponents.
    </x-md.paragraph>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.ul>
        <x-md.li>Ensure every menu item has clear text and predictable action outcome.</x-md.li>
        <x-md.li>Maintain visible keyboard focus styles for menu navigation.</x-md.li>
        <x-md.li>Avoid hover-only access to critical menu actions.</x-md.li>
    </x-md.ul>

    <x-md.h2>Integration Tips</x-md.h2>
    <x-md.ul>
        <x-md.li>Use separators and headers to reduce cognitive load in long action lists.</x-md.li>
        <x-md.li>Keep destructive actions visually distinct and isolated from safe actions.</x-md.li>
    </x-md.ul>

    <x-md.h2>Alternatives</x-md.h2>
    <x-md.ul>
        <x-md.li>Use popover when content includes richer UI than a simple action list.</x-md.li>
        <x-md.li>Use buttons or inline links when only one or two actions are needed.</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
