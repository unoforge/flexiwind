<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.paragraph>
        Flexiwind provides a flexible sidebar system that can be customized to fit various design needs. While sidebars
        may look different, they share common logic for toggling and resizing functionality.
    </x-md.paragraph>
    <x-md.paragraph>
        The sidebar system uses AlpineJS for interactivity and provides a global setup that works with any sidebar
        implementation.
    </x-md.paragraph>

    <x-md.h2>When to Use</x-md.h2>
    <x-md.ul>
        <x-md.li>Use sidebars for app-level navigation and persistent contextual actions.</x-md.li>
        <x-md.li>Prefer collapsible behavior in dense dashboard interfaces.</x-md.li>
        <x-md.li>Keep primary navigation predictable across resized/open states.</x-md.li>
    </x-md.ul>

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>
        To use sidebars in your application, run the installation command:
    </x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add sidebar-wrapper" />

    <x-md.paragraph>
        <strong>What this command installs:</strong>
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Sidebar plugin file: <x-docs.inline-code no-wrap text="resources/js/sidebar-plugin.js" /></x-md.li>
        <x-md.li>Sidebar wrapper component: <x-docs.inline-code no-wrap
                text="resources/views/components/ui/sidebar-wrapper.blade.php" /></x-md.li>
    </x-md.ul>

    <x-md.paragraph>
        <strong>Manual setup required:</strong>
    </x-md.paragraph>
    <x-md.paragraph>
        After running the CLI command, you need to manually import the sidebar plugin in your application's JavaScript
        file (typically <x-docs.inline-code no-wrap text="app.js" />):
    </x-md.paragraph>
    <livewire:base.load-code :name="['sidebar-manual-setup']" />

    <x-md.paragraph>
        This manual import ensures the sidebar plugin is properly initialized when AlpineJS loads in your application.
    </x-md.paragraph>

    <x-md.h2>Global Setup</x-md.h2>
    <x-md.paragraph>
        The sidebar functionality is handled through an AlpineJS plugin that provides toggle and resize capabilities for
        all sidebars.
    </x-md.paragraph>

    <x-md.h3>
        AlpineJS Plugin
    </x-md.h3>
    <x-md.paragraph>
        The sidebar plugin is automatically initialized when AlpineJS loads. It provides two main directives:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-sidebar" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applied to the sidebar element to enable toggle and resize functionality
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-toggle-sidebar" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applied to trigger elements to open/close the sidebar
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-toggle-sidebar-size" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Applied to trigger elements to resize the sidebar (collapsed/expanded)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h4>
        Plugin Features
    </x-md.h4>
    <x-md.ul>
        <x-md.li>Automatic toggle functionality for opening/closing sidebars</x-md.li>
        <x-md.li>Resize functionality for collapsing/expanding sidebar width</x-md.li>
        <x-md.li>Overlay management with proper aria attributes</x-md.li>
        <x-md.li>Body scroll prevention when sidebar is open on mobile</x-md.li>
        <x-md.li>Cleanup on component destruction</x-md.li>
    </x-md.ul>

    <x-md.h3>
        Sidebar Wrapper Component
    </x-md.h3>
    <x-md.paragraph>
        The <x-docs.inline-code no-wrap text="x-ui.sidebar-wrapper" /> component provides the base structure for any
        sidebar implementation:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="overlayBlured" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether to apply backdrop blur to the overlay. Default: true
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the sidebar element
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.paragraph>
        <strong>Component structure:</strong>
    </x-md.paragraph>
    <livewire:base.load-code :name="['sidebar-wrapper-structure']" />


    <x-md.h2>
        Usage Examples
    </x-md.h2>

    <x-md.h3>
        Demo Example
    </x-md.h3>
    <livewire:base.component-tab-preview-code in-iframe preview-url="/preview-ui/sidebar/demo-sidebar" component="components.examples.sidebar.demo" />


    <x-md.h3>
        Basic Sidebar Implementation
    </x-md.h3>
    <x-md.paragraph>
        Here's how to implement a basic sidebar using the wrapper component:
    </x-md.paragraph>
    <livewire:base.load-code :name="['sidebar-basic-implementation']" />

    <x-md.h3>
        Sidebar with Toggle Button
    </x-md.h3>
    <x-md.paragraph>
        Add a toggle button to control the sidebar visibility:
    </x-md.paragraph>
    <livewire:base.load-code :name="['sidebar-with-toggle']" />

    <x-md.h3>
        Sidebar with Resize Functionality
    </x-md.h3>
    <x-md.paragraph>
        Add resize functionality to collapse/expand the sidebar:
    </x-md.paragraph>
    <livewire:base.load-code :name="['sidebar-with-resize']" />

    <x-md.h2>
        Data Attributes and States
    </x-md.h2>
    <x-md.paragraph>
        The sidebar system uses data attributes to manage states:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-state" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Sidebar state: "open" or "close"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="data-resized" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Resize state: "true" or "false"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="aria-hidden" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Overlay accessibility state
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h2>
        Styling Guidelines
    </x-md.h2>
    <x-md.paragraph>
        When creating custom sidebar implementations, follow these guidelines:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Use <x-docs.inline-code no-wrap text="fx-open:" /> prefix for classes that should apply when sidebar is
            open</x-md.li>
        <x-md.li>Use <x-docs.inline-code no-wrap text="has-fx-active:" /> prefix for active navigation items</x-md.li>
        <x-md.li>Apply proper z-index values (z-70 for overlay, z-80 for sidebar)</x-md.li>
        <x-md.li>Use responsive classes to hide/show sidebar on different screen sizes</x-md.li>
        <x-md.li>Include proper transitions for smooth animations</x-md.li>
    </x-md.ul>

    <x-md.h2>Accessibility</x-md.h2>
    <x-md.paragraph>
        The sidebar system includes accessibility features:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li>Proper aria attributes on overlay</x-md.li>
        <x-md.li>Body scroll prevention on mobile when sidebar is open</x-md.li>
        <x-md.li>Keyboard navigation support</x-md.li>
        <x-md.li>Screen reader friendly markup</x-md.li>
    </x-md.ul>
</x-layouts.doc-page-wrapper>