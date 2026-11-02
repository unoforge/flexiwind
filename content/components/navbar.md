---
title: "Navbar"
group: "Navigation"
order: 10
tier: "free"
description: "Header navigation component with support for branding and menus."
seoDescription: "Responsive navigation bar component for Laravel applications."
keywords: "navbar, header, navigation, menu, top-bar"
---

Flexiwind provides a flexible navbar system that uses the Flexilla navbar plugin for AlpineJS integration. The
navbar system includes responsive navigation, mobile menu functionality, and various layout options.

The navbar system uses AlpineJS for interactivity and provides a global setup that works with any navbar
implementation.

## When to Use

- Use navbar for top-level app navigation, branding, and global actions.
- Keep primary routes predictable and concise.
- Use responsive collapse behavior for small screens.

## Installation

To use navbars in your application, run the installation command:

```bash
npm i @flexilla/alpine-navbar
```

**Setup required:**

After installing the plugin, you need to manually import the navbar plugin in your application's JavaScript
file (typically `app.js`):

```js title="app.js"
// Import Flexilla navbar plugin
import NavbarPlugin from "./plugins/nav-bar";

// Register the plugin with Alpine
Alpine.plugin(NavbarPlugin);

// Your other app.js imports and initialization code
// ...
```

### AlpineJS Plugin

The navbar plugin is automatically initialized when AlpineJS loads. It provides the main directive:

| Prop | Description |
| --- | --- |
| `x-navbar` | Applied to navbar element to enable navigation functionality and mobile menu behavior |
| `data-toggle-nav` | Applied to trigger elements to open/close mobile navigation menu |

**Component structure:**

```blade title="navbar-wrapper-structure.blade.php"
<!-- Basic navbar wrapper structure -->
<div data-nav-overlay data-navbar-id="yourNavbarId" aria-hidden="true" 
     class="fixed bg-gray-800/40 inset-0 z-30 hidden fx-open:flex lg:hidden"></div>

<header class="w-full z-45 relative">
    <nav class="max-w-4xl mx-auto w-full flex justify-between">
        <!-- Mobile toggle button -->
        <button data-toggle-nav="yourNavbarId" aria-label="Toggle navbar">
            <!-- Hamburger icon -->
        </button>
        
        <!-- Brand/logo -->
        <a href="/">Your Brand</a>
        
        <!-- Navigation items -->
        <div x-data x-navbar id="yourNavbarId" class="flex lg:flex-1">
            <!-- Your navigation items -->
        </div>
        
        <!-- Action buttons -->
        <div class="flex items-center">
            <!-- Search, theme toggle, etc. -->
        </div>
    </nav>
</header>
```

## Data Attributes and States

The navbar system uses data attributes to manage states:

| Prop | Description |
| --- | --- |
| `data-nav-overlay` | Identifies the mobile navigation overlay element |
| `data-navbar-id` | Unique identifier for the navbar instance |
| `data-toggle-nav` | Links trigger element to specific navbar instance |
| `aria-expanded` | Accessibility state for mobile menu toggle |

## Styling Guidelines

When creating custom navbar implementations, follow these guidelines:

- Use `fx-open:` prefix for classes that should apply when mobile menu
  is open
- Use `group-aria-expanded:` prefix for elements that respond to
  toggle state
- Apply proper z-index values (z-30 for overlay, z-45 for navbar)
- Use responsive classes to show/hide elements on different screen sizes
- Include proper transitions for smooth animations
- Ensure proper contrast and accessibility

## API

The API is documented above in plugin directives, data attributes, and state behavior tables.

## Examples

### Demo Example

::preview{example="navbar/demo" iframe height="320"}
