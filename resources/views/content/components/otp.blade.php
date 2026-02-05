<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.otp.demo" no-in-tabs />

    <x-md.h2>Installation</x-md.h2>
    <x-docs.steps>
        <x-docs.step>
            <x-md.h3>Add the component</x-md.h3>
            <livewire:base.terminal code="flexi-cli add otp" />
        </x-docs.step>
        <x-docs.step>
            <x-md.h3>Install Otp Plugin</x-md.h3>
            <x-docs.callout intent="gray" type="note">
                This component require JS. By default we're using our own Interactive Component Library
                <x-docs.link href="https://flexilla-docs.vercel.app/">Flexilla</x-docs.link>. Install this only if you
                didn't accept dependencies installation during component addition.
            </x-docs.callout>
            <x-md.ol>
                <x-md.li><strong>With Alpine</strong></x-md.li>
                <livewire:base.terminal :code="'npm i @flexilla/alpine-pin-input'" />
                <x-md.paragraph>Add plugin in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>

                <livewire:base.load-code :name="['add-otp-plugin-in-app']" />
                <x-md.li><strong>Without Alpine</strong></x-md.li>
                <x-docs.callout intent="gray" type="note">
                    Make sure that the dropdown package is not installed
                </x-docs.callout>
                <livewire:base.terminal :code="'npm i @flexilla/pin-input'" />
                <x-md.paragraph>Initialize Pin Input in <x-docs.inline-code text="flexilla.js" /></x-md.paragraph>
                <livewire:base.load-code :name="['add-otp-in-app']" />
            </x-md.ol>
        </x-docs.step>
    </x-docs.steps>


    <x-md.h2>Examples</x-md.h2>

    <x-md.h3>Numeric OTP</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.otp.numeric" no-in-tabs />

    <x-md.h3>Alphabetic OTP</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.otp.alpha" no-in-tabs />

    <x-md.h3>Alpha Numeric OTP</x-md.h3>
    <livewire:base.component-tab-preview-code no-in-tabs component="components.examples.otp.alpha-numeric" no-in-tabs />

    <x-md.h2>References</x-md.h2>

    <x-md.h3>OTP Component</x-md.h3>
    <x-md.paragraph>
        The OTP (One-Time Password) component creates a group of input fields designed for entering verification codes.
        It provides built-in validation and auto-focus management between fields.
    </x-md.paragraph>

    <x-md.h3>OTP Container</x-md.h3>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="validation" />
            </x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>null</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Defines the input validation pattern. Can be one of:
                    <ul class="list-disc pl-5 mt-1 space-y-1">
                        <li><x-docs.inline-code no-wrap text="number" /> - Only numeric input (0-9)</li>
                        <li><x-docs.inline-code no-wrap text="alpha" /> - Only alphabetic characters (a-z, A-Z)</li>
                        <li><x-docs.inline-code no-wrap text="alphanumeric" /> - Both letters and numbers</li>
                        <li>Custom regex pattern - Any valid JavaScript regex pattern</li>
                    </ul>
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="class" />
            </x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>''</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the OTP container.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>OTP Input</x-md.h3>
    <x-docs.table :columns="[
        ['label' => 'Prop', 'class' => 'w-1/5'],
        ['label' => 'Type', 'class' => 'w-1/5'],
        ['label' => 'Default', 'class' => 'w-1/5'],
        ['label' => 'Description', 'class' => 'w-2/5'],
    ]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="size" />
            </x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'md'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the size of the input. Can be one of: 'xs', 'sm', 'md', 'lg', 'xl'.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="type" />
            </x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'text'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The HTML input type. Typically 'text' or 'password'.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="radius" />
            </x-ui.table.cell>
            <x-ui.table.cell>string</x-ui.table.cell>
            <x-ui.table.cell>'lg'</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Border radius of the input. Can be one of: 'none', 'sm', 'md', 'lg', 'xl', '2xl', '3xl', 'full'.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="disabled" />
            </x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the input is disabled and not interactive.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="readonly" />
            </x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, the input is read-only and cannot be modified.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="noBorder" />
            </x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, removes the border from the input.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="unStylled" />
            </x-ui.table.cell>
            <x-ui.table.cell>boolean</x-ui.table.cell>
            <x-ui.table.cell>false</x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    When true, removes all default styling from the input.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>JavaScript API</x-md.h3>
    <x-md.paragraph>
        The OTP component is powered by the <x-docs.inline-code no-wrap text="@flexilla/pin-input" /> package.
        For advanced usage and methods, refer to the <x-docs.link href="#">Flexilla Pin Input
            Documentation</x-docs.link>.
    </x-md.paragraph>

    <x-md.h3>Accessibility</x-md.h3>
    <x-md.paragraph>
        The OTP component is built with accessibility in mind:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Proper ARIA attributes for screen readers</x-md.li>
        <x-md.li>Keyboard navigation support (Tab, Shift+Tab, Arrow keys)</x-md.li>
        <x-md.li>Auto-focus management between fields</x-md.li>
        <x-md.li>Paste support for easier code entry</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>
