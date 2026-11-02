---
title: "Sidebar"
group: "Navigation"
order: 20
tier: "free"
description: "Collapsible vertical navigation container for application dashboards."
seoDescription: "Create responsive sidebars with Flexiwind's layout components."
keywords: "sidebar, navigation, aside, drawer"
---

Flexiwind provides a flexible sidebar system that can be customized to fit various design needs. While sidebars
may look different, they share common logic for toggling and resizing functionality.

The sidebar system uses AlpineJS for interactivity and provides a global setup that works with any sidebar
implementation.

## When to Use

- Use sidebars for app-level navigation and persistent contextual actions.
- Prefer collapsible behavior in dense dashboard interfaces.
- Keep primary navigation predictable across resized/open states.

## Installation

To use sidebars in your application, run the installation command:

```bash
php artisan flexi:add sidebar-wrapper
```

**What this command installs:**

- Sidebar plugin file: `resources/js/sidebar-plugin.js`
- Sidebar wrapper component: `resources/views/components/ui/sidebar-wrapper.blade.php`

**Manual setup required:**

After running the CLI command, you need to manually import the sidebar plugin in your application's JavaScript
file (typically `app.js`):

```js title="app.js"
// Import sidebar plugin
import "./sidebar-plugin.js";

// Your other app.js imports and initialization code
// ...
```

This manual import ensures the sidebar plugin is properly initialized when AlpineJS loads in your application.

## Global Setup

The sidebar functionality is handled through an AlpineJS plugin that provides toggle and resize capabilities for
all sidebars.

### AlpineJS Plugin

The sidebar plugin is automatically initialized when AlpineJS loads. It provides two main directives:

| Prop | Description |
| --- | --- |
| `x-sidebar` | Applied to the sidebar element to enable toggle and resize functionality |
| `data-toggle-sidebar` | Applied to trigger elements to open/close the sidebar |
| `data-toggle-sidebar-size` | Applied to trigger elements to resize the sidebar (collapsed/expanded) |

#### Plugin Features

- Automatic toggle functionality for opening/closing sidebars
- Resize functionality for collapsing/expanding sidebar width
- Overlay management with proper aria attributes
- Body scroll prevention when sidebar is open on mobile
- Cleanup on component destruction

### Sidebar Wrapper Component

The `x-ui.sidebar-wrapper` component provides the base structure for any
sidebar implementation:

| Prop | Description |
| --- | --- |
| `overlayBlured` (boolean) | Whether to apply backdrop blur to the overlay. Default: true |
| `class` (string) | Additional CSS classes for the sidebar element |
| `withoutOverlay` (boolean) | Hide the mobile backdrop overlay. Default: false |

**Component structure:**

```blade title="sidebar-wrapper-structure.blade.php"
<!-- Basic sidebar wrapper structure -->
<x-ui.sidebar-wrapper class="your-sidebar-classes">
    <!-- Your sidebar content here -->
    <nav>
        <!-- Navigation items -->
    </nav>
</x-ui.sidebar-wrapper>
```

### Sidebar Overlay Component

The `x-ui.sidebar-overlay` component is automatically rendered by the sidebar
wrapper on mobile. It provides a backdrop to close the sidebar when tapped outside.

| Prop | Description |
| --- | --- |
| `blured` (boolean) | Apply a backdrop blur effect. Default: true |
| `appearance` (string) | Visual style variant. Default: "default" |

## Usage Examples

### Demo Example

::preview{example="sidebar/demo" iframe height="520"}

### Basic Sidebar Implementation

Here's how to implement a basic sidebar using the wrapper component:

```blade title="sidebar-basic-implementation.blade.php"
<!-- Basic sidebar implementation -->
<x-ui.sidebar-wrapper class="fixed h-dvh w-72 bg-card border-r border-muted transition-all -translate-x-full fx-open:translate-x-0 lg:translate-x-0 z-80">
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center gap-x-2.5 px-3 py-2 rounded-md hover:bg-muted">
                    <x-ui.icon name="ph--house" />
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
</x-ui.sidebar-wrapper>
```

### Sidebar with Toggle Button

Add a toggle button to control the sidebar visibility:

```blade title="sidebar-with-toggle.blade.php"
<!-- Toggle button -->
<button data-toggle-sidebar class="lg:hidden p-2 rounded-md hover:bg-muted">
    <x-ui.icon name="ph--list" class="text-xl" />
</button>

<!-- Sidebar with toggle functionality -->
<x-ui.sidebar-wrapper 
    class="fixed h-dvh w-72 bg-card border-r border-muted transition-all -translate-x-full fx-open:translate-x-0 z-80">
    
    <!-- Sidebar content -->
    <div class="p-4">
        <h2 class="font-semibold">Sidebar Content</h2>
        <!-- Your sidebar content here -->
    </div>
</x-ui.sidebar-wrapper>
```

### Sidebar with Resize Functionality

Add resize functionality to collapse/expand the sidebar:

```blade title="sidebar-with-resize.blade.php"
<!-- Sidebar with resize functionality -->
<x-ui.sidebar-wrapper 
    class="fixed h-dvh bg-card border-r border-muted transition-all group
           w-72 lg:fx-resized:w-16 -translate-x-full fx-open:translate-x-0 lg:translate-x-0 z-80">
    
    <!-- Resize toggle button -->
    <button data-toggle-sidebar-size class="hidden lg:block p-2 rounded-md hover:bg-muted">
        <x-ui.icon name="ph--caret-left" class="text-xl group-aria-expanded:rotate-180 transition-transform" />
    </button> 
    
    <!-- Sidebar content -->
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center gap-x-2.5 px-3 py-2 rounded-md hover:bg-muted">
                    <x-ui.icon name="ph--house" />
                    <span class="in-fx-resized:hidden">Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
</x-ui.sidebar-wrapper>
```

## Data Attributes and States

The sidebar system uses data attributes to manage states:

| Prop | Description |
| --- | --- |
| `data-state` | Sidebar state: "open" or "close" |
| `data-resized` | Resize state: "true" or "false" |
| `aria-hidden` | Overlay accessibility state |

## Styling Guidelines

When creating custom sidebar implementations, follow these guidelines:

- Use `fx-open:` prefix for classes that should apply when sidebar is
  open
- Use `has-fx-active:` prefix for active navigation items
- Apply proper z-index values (z-70 for overlay, z-80 for sidebar)
- Use responsive classes to hide/show sidebar on different screen sizes
- Include proper transitions for smooth animations
