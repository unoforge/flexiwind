<?php

return [
    'add-accordion-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Accordion } from "@flexilla/accordion"

// init accordion for all Element with data-app-accordion attribute
Accordion.autoInit('[data-app-accordion]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-accordion-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineAccordion from "@flexilla/alpine-accordion"

Alpine.plugin(AlpineAccordion)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-modal-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Modal } from "@flexilla/modal"

// init Modal for all Element with data-app-modal attribute
Modal.autoInit('[data-app-modal]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-modal-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineModal from "@flexilla/alpine-modal"

Alpine.plugin(AlpineModal)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'card-custom-padding' => [
        'lang' => 'blade',
        'name' => 'card-custom-padding.blade.php',
        'code' => <<<'BLADE'
<x-ui.card class="[--card-padding:--spacing(8)]">
    <!-- Card content with custom padding -->
</x-ui.card>
BLADE,
    ],

    'card-custom-radius' => [
        'lang' => 'blade',
        'name' => 'card-custom-radius.blade.php',
        'code' => <<<'BLADE'
<x-ui.card class="[--card-radius:0.75rem]">
    <!-- Card content with custom border radius -->
</x-ui.card>

<x-ui.card class="[--card-radius:var(--radius-lg)]">
    <!-- Card content using predefined radius variable -->
</x-ui.card>
BLADE,
    ],

    'card-combined-customization' => [
        'lang' => 'blade',
        'name' => 'card-combined-customization.blade.php',
        'code' => <<<'BLADE'
<x-ui.card class="[--card-padding:--spacing(6)] [--card-radius:1rem]">
    <!-- Card with custom padding and radius -->
</x-ui.card>
BLADE,
    ],

    'inner-radius-example' => [
        'lang' => 'blade',
        'name' => 'inner-radius-example.blade.php',
        'code' => <<<'BLADE'
<!-- Card with custom padding and radius -->
<x-ui.card class="[--card-padding:--spacing(6)] [--card-radius:1rem]">
    <!-- Inner element with calculated radius -->
    <div class="inner-radius bg-primary text-white p-4">
        Content that fits perfectly
    </div>
</x-ui.card>
BLADE,
    ],

    'switch-basic-styling' => [
        'lang' => 'blade',
        'name' => 'switch-basic-styling.blade.php',
        'code' => <<<'BLADE'
<!-- Basic switch with custom colors -->
<x-ui.switch name="switch_basic" id="switch_basic" 
    class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
BLADE,
    ],

    'switch-outlined-styling' => [
        'lang' => 'blade',
        'name' => 'switch-outlined-styling.blade.php',
        'code' => <<<'BLADE'
<!-- Outlined switch -->
<x-ui.switch outlined name="switch_outline" id="switch_outline" 
    class="bg-bg text-transparent [--knob-bg:var(--color-gray-500)]" />
BLADE,
    ],

    'switch-custom-styling' => [
        'lang' => 'blade',
        'name' => 'switch-custom-styling.blade.php',
        'code' => <<<'BLADE'
<!-- Custom colors and sizes -->
<x-ui.switch size="xs" name="switch_custom" id="switch_custom" 
    class="bg-accent text-accent [--knob-bg:var(--color-white)]" />

<x-ui.switch size="lg" name="switch_custom2" id="switch_custom2" 
    class="bg-success text-success [--knob-bg:var(--color-gray-900)]" />
BLADE,
    ],

    'switch-with-labels' => [
        'lang' => 'blade',
        'name' => 'switch-with-labels.blade.php',
        'code' => <<<'BLADE'
<!-- Switch with label -->
<label for="switch_label" class="flex items-center gap-x-1">
    <x-ui.switch name="switch_label" id="switch_label" 
        class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
    <span class="text-sub-title ms-3">Enable notifications</span>
</label>

<!-- Switch with label on both sides -->
<label for="switch_both" class="flex items-center gap-x-1">
    <span class="text-sub-title me-3">Off</span>
    <x-ui.switch name="switch_both" id="switch_both" 
        class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
    <span class="text-sub-title ms-3">On</span>
</label>
BLADE,
    ],

    'sidebar-wrapper-structure' => [
        'lang' => 'blade',
        'name' => 'sidebar-wrapper-structure.blade.php',
        'code' => <<<'BLADE'
<!-- Basic sidebar wrapper structure -->
<x-ui.sidebar-wrapper class="your-sidebar-classes">
    <!-- Your sidebar content here -->
    <nav>
        <!-- Navigation items -->
    </nav>
</x-ui.sidebar-wrapper>
BLADE,
    ],

    'sidebar-manual-setup' => [
        'lang' => 'js',
        'name' => 'app.js',
        'code' => <<<'JS'
// Import sidebar plugin
import "./sidebar-plugin.js";

// Your other app.js imports and initialization code
// ...
JS,
    ],

    'navbar-manual-setup' => [
        'lang' => 'js',
        'name' => 'app.js',
        'code' => <<<'JS'
// Import Flexilla navbar plugin
import PluginNavbar from "@flexilla/alpine-navbar";

// Register the plugin with Alpine
Alpine.plugin(PluginNavbar);

// Your other app.js imports and initialization code
// ...
JS,
    ],

    'navbar-wrapper-structure' => [
        'lang' => 'blade',
        'name' => 'navbar-wrapper-structure.blade.php',
        'code' => <<<'BLADE'
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
BLADE,
    ],

    'sidebar-with-toggle' => [
        'lang' => 'blade',
        'name' => 'sidebar-with-toggle.blade.php',
        'code' => <<<'BLADE'
<!-- Toggle button -->
<button data-toggle-sidebar class="lg:hidden p-2 rounded-md hover:bg-bg-muted">
    <span class="iconify ph--list text-xl"></span>
</button>

<!-- Sidebar with toggle functionality -->
<x-ui.sidebar-wrapper 
    class="fixed h-dvh w-72 bg-bg-surface border-r border-bg-muted transition-all -translate-x-full fx-open:translate-x-0 z-80">
    
    <!-- Sidebar content -->
    <div class="p-4">
        <h2 class="font-semibold">Sidebar Content</h2>
        <!-- Your sidebar content here -->
    </div>
</x-ui.sidebar-wrapper>
BLADE,
    ],

    'sidebar-with-resize' => [
        'lang' => 'blade',
        'name' => 'sidebar-with-resize.blade.php',
        'code' => <<<'BLADE'
<!-- Sidebar with resize functionality -->
<x-ui.sidebar-wrapper 
    class="fixed h-dvh bg-bg-surface border-r border-bg-muted transition-all group
           w-72 lg:fx-resized:w-16 -translate-x-full fx-open:translate-x-0 lg:translate-x-0 z-80">
    
    <!-- Resize toggle button -->
    <button data-toggle-sidebar-size class="hidden lg:block p-2 rounded-md hover:bg-bg-muted">
        <span class="iconify ph--caret-left text-xl group-aria-expanded:rotate-180 transition-transform"></span>
    </button> 
    
    <!-- Sidebar content -->
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center gap-x-2.5 px-3 py-2 rounded-md hover:bg-bg-muted">
                    <span class="iconify ph--house"></span>
                    <span class="in-fx-resized:hidden">Dashboard</span>
                </a>
            </li>
        </ul>
    </nav>
</x-ui.sidebar-wrapper>
BLADE,
    ],

    'add-tabs-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Tabs } from "@flexilla/tabs"

// init Tabs for all Element with data-app-tabs attribute
Tabs.autoInit('[data-app-tabs]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-tabs-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineTabs from "@flexilla/alpine-tabs"

Alpine.plugin(AlpineTabs)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-auto-resize-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { AutoResizeTextArea } from "@flexilla/autoresize-area"

// init Auto resize area for all Element with data-app-auto-resize attribute
AutoResizeTextArea.autoInit('[data-app-auto-resize]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-auto-resize-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineAutoResize from "@flexilla/alpine-autoresize-area"

Alpine.plugin(AlpineAutoResize)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-dropdown-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Dropdown } from "@flexilla/dropdown"

// init Auto resize area for all Element with data-app-dropdown attribute
Dropdown.autoInit('[data-app-dropdown]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-dropdown-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineDropdown from "@flexilla/alpine-dropdown"

Alpine.plugin(AlpineDropdown)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-popover-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Popover } from "@flexilla/popover"

// init popover for all Element with data-app-popover attribute
Popover.autoInit('[data-app-popover]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-popover-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpinePopover from "@flexilla/alpine-dpopover"

Alpine.plugin(AlpinePopover)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

    'add-tooltip-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Tooltip } from "@flexilla/tooltip"

// init tooltip for all Element with data-app-tooltip attribute
Tooltip.autoInit('[data-app-tooltip]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-tooltip-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineTooltip from "@flexilla/alpine-tooltip"

Alpine.plugin(AlpineTooltip)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],




    'add-otp-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { PinInput} from "@flexilla/pin-input"

// init Pin Input for all Element with data-app-otp attribute
PinInput.autoInit('[data-app-otp]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-otp-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpinePinInput from "@flexilla/alpine-pin-input"

Alpine.plugin(AlpinePinInput)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],




    'add-offcanvas-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import { Offcanvas } from "@flexilla/offcanvas"

// init Modal for all Element with data-app-modal attribute
Offcanvas.autoInit('[data-app-offcanvas]') 
JS,
        'lines' => [
            1 => 'added',
            4 => 'added',
        ],
    ],
    'add-offcanvas-plugin-in-app' => [
        'lang' => 'js',
        'name' => 'flexilla.js',
        'code' => <<<'JS'
import AlpineOffcanvas from "@flexilla/alpine-offcanvas"

Alpine.plugin(AlpineOffcanvas)
JS,
        'lines' => [
            1 => 'added',
            3 => 'added',
        ],
    ],

];
