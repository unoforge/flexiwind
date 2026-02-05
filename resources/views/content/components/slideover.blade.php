<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.slideover.demo" />


    <x-md.h2>Installation</x-md.h2>


    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add slideover" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install Accordion</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component require JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. You can install the
                Alpine Plugin if using Alpine or the vanilla JS version as you need
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-offcanvas'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-offcanvas-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/modal'" />
                <x-md.paragraph>Initialize modal in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-offcanvas-in-app']" />

            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>

    <x-md.h2>References</x-md.h2>

    <x-md.h3>Slideover Component</x-md.h3>
    <x-md.paragraph>
        The slideover component creates a panel that slides in from the edge of the screen.
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
                    A unique identifier for the slideover. Required for proper functionality.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="position" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'right'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The edge from which the slideover appears. Options: 'right', 'left', 'top', 'bottom'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the slideover container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="isFloated" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the slideover floats above the content with a shadow.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="staticBackdrop" /></x-ui.table.cell>
            <x-ui.table.cell>boolean/string</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the slideover cannot be closed by clicking outside or pressing ESC.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="backdropBlured" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, applies a blur effect to the backdrop.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="scrollableBody" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, allows the page to scroll while the slideover is open.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="size" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'md'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the size of the slideover. Options: 'sm', 'md', 'lg', 'xl', '2xl', '3xl'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="closable" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the slideover can be closed by clicking the close button or pressing ESC.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Slideover Content Component</x-md.h3>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="class" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the content container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="as" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'div'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The HTML element or component to render as the root element.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Subcomponents</x-md.h3>
    <x-docs.table :columns="[['label' => 'Component', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.trigger" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The clickable element that opens the slideover. Must have 'slideover-id' attribute matching the
                    slideover's 'id'.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.content" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The main container for the slideover content. Handles sizing and basic styling.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.header" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Container for the slideover header, typically containing the title and close button.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.title" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The title of the slideover. Should be placed inside the header.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.body" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The main content area of the slideover. Handles scrolling when content is too long.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.footer" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Container for action buttons at the bottom of the slideover.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.close" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A button to close the slideover. Inherits props from x-ui.button.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.slideover.description" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    An optional description text that can be added below the title.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Events</x-md.h3>
    <x-docs.table :columns="[['label' => 'Event', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="sheet:the-id-of-your-slideover:open" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Dispatch this event from JS or Livewire to open the slideover.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="sheet:the-id-of-your-slideover:close" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Dispatch this event from JS or Livewire to close the slideover.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.h3>JavaScript API</x-md.h3>
    <x-md.paragraph>
        To know more about the JavaScript API, check the <x-docs.link
            href="https://flexilla-docs.vercel.app/components/tabs">Flexilla</x-docs.link> documentation.
    </x-md.paragraph>


</x-layouts.doc-page-wrapper>
