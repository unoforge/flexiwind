<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.paragraph>
        Flexiwind provides a flexible navbar system that uses the Flexilla navbar plugin for AlpineJS integration. The
        navbar system includes responsive navigation, mobile menu functionality, and various layout options.
    </x-md.paragraph>
    <x-md.paragraph>
        The navbar system uses AlpineJS for interactivity and provides a global setup that works with any navbar
        implementation.
    </x-md.paragraph>

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use navbar for top-level app navigation, branding, and global actions.</x-md.li>
        <x-md.li>Keep primary routes predictable and concise.</x-md.li>
        <x-md.li>Use responsive collapse behavior for small screens.</x-md.li>
    </x-md.ul>

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>
        To use navbars in your application, run the installation command:
    </x-md.paragraph>
    <livewire:base.terminal code="npm i @flexilla/alpine-navbar" />



    <x-md.paragraph>
        <strong>Setup required:</strong>
    </x-md.paragraph>
    <x-md.paragraph>
        After installing the plugin, you need to manually import the navbar plugin in your application's JavaScript
        file (typically <x-docs.inline-code no-wrap text="app.js" />):
    </x-md.paragraph>
    <livewire:base.load-code :name="['navbar-manual-setup']" />


    <x-md.h3>
        AlpineJS Plugin
    </x-md.h3>
    <x-md.paragraph>
        The navbar plugin is automatically initialized when AlpineJS loads. It provides the main directive:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-navbar" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applied to navbar element to enable navigation functionality and mobile menu behavior
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-toggle-nav" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applied to trigger elements to open/close mobile navigation menu
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>



    <x-md.paragraph>
        <strong>Component structure:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['navbar-wrapper-structure']" />


    <x-md.h2>
        Data Attributes and States
    </x-md.h2>
    <x-md.paragraph>
        The navbar system uses data attributes to manage states:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-nav-overlay" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Identifies the mobile navigation overlay element
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-navbar-id" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Unique identifier for the navbar instance
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-toggle-nav" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Links trigger element to specific navbar instance
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="aria-expanded" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Accessibility state for mobile menu toggle
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>
        Styling Guidelines
    </x-md.h2>
    <x-md.paragraph>
        When creating custom navbar implementations, follow these guidelines:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Use <x-docs.inline-code no-wrap text="fx-open:" /> prefix for classes that should apply when mobile menu
            is open</x-md.li>
        <x-md.li>Use <x-docs.inline-code no-wrap text="group-aria-expanded:" /> prefix for elements that respond to
            toggle state</x-md.li>
        <x-md.li>Apply proper z-index values (z-30 for overlay, z-45 for navbar)</x-md.li>
        <x-md.li>Use responsive classes to show/hide elements on different screen sizes</x-md.li>
        <x-md.li>Include proper transitions for smooth animations</x-md.li>
        <x-md.li>Ensure proper contrast and accessibility</x-md.li>
    </x-md.ul>

    <x-md.h2>API</x-md.h2>
    <x-md.paragraph>
        The API is documented above in plugin directives, data attributes, and state behavior tables.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>
        Demo Example
    </x-md.h3>
    <livewire:base.component-tab-preview-code in-iframe preview-url="/preview-ui/header/demo-navbar" component="components.examples.navbar.demo" />
</x-layouts.doc-page-wrapper>
