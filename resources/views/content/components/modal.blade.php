<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.modal.demo" />


    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add modal" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install Modal</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component require JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. Install this only if you
                didn't accept dependencies installation during component addition.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-modal'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-modal-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-docs.callout intent="gray" type="note">
                    Make sure that the modal package is not installed
                </x-docs.callout>
                <livewire:base.terminal :code="'npm i @flexilla/modal'" />
                <x-md.paragraph>Initialize modal in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-modal-in-app']" />

            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>



    <x-md.h2>References</x-md.h2>

    <x-md.h3>Modal Component</x-md.h3>
    <x-md.paragraph>
        The modal component creates a dialog box that appears on top of the page content.
    </x-md.paragraph>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="modalId" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>-</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A unique identifier for the modal. Required for proper functionality.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="backdropClass" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the modal's backdrop/overlay.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="overlayBlured" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, applies a blur effect to the backdrop.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="closable" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the modal can be closed by clicking the close button or pressing ESC.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="staticBackdrop" /></x-ui.table.cell>
            <x-ui.table.cell>boolean/string</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the modal cannot be closed by clicking outside or pressing ESC.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="scrollableBody" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, allows the page to scroll while the modal is open.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Modal Content Component</x-md.h3>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="size" /></x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'md'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the width of the modal. Options: 'xs', 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl',
                    'full'
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="closable" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>true</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, shows a close button in the top-right corner.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="noGutter" /></x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, removes the default padding from the modal content.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Subcomponents</x-md.h3>
    <x-docs.table :columns="[['label' => 'Component', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.trigger" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The clickable element that opens the modal. Must have 'modal-id' attribute matching the modal's
                    'modalId'.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.content" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The main container for the modal content. Handles sizing and basic styling.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.header" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Container for the modal header, typically containing the title and close button.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.title" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The title of the modal. Should be placed inside the header.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap text="x-ui.modal.body" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The main content area of the modal. Handles scrolling when content is too long.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.footer" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Container for action buttons at the bottom of the modal.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium"><x-docs.inline-code no-wrap
                    text="x-ui.modal.close" /></x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A button to close the modal. Inherits props from x-ui.button.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3 class="mt-8">Events</x-md.h3>
    <x-docs.table :columns="[['label' => 'Event', 'class' => 'w-1/5'], ['label' => 'Description', 'class' => 'w-4/5']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="modal:the-id-of-your-modal:open" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Dispatch this event from JS or Livewire to open the modal.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="modal:the-id-of-your-modal:close" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Dispatch this event from JS or Livewire to close the modal.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.h3>JavaScript API</x-md.h3>
    <x-md.paragraph>
        To know more about the JavaScript API, check the <x-docs.link
            href="https://flexilla-docs.vercel.app/components/modal">Flexilla</x-docs.link> documentation.
    </x-md.paragraph>
</x-layouts.doc-page-wrapper>
