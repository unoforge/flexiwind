# Interactions (Flexilla)

Flexilla is the interactive engine behind Flexiwind's overlay and disclosure components. It provides unstyled, accessible JS behaviors — modals, dropdowns, popovers, tooltips, accordions, tabs, slideovers, and more.

## Architecture

```
php artisan flexi:add <component>
    ↓ (auto)
Installs @flexilla/<package> from npm
    +
Creates resources/js/plugins/<component>.js  (Alpine plugin wrapper)
    ↓ (manual)
Import the plugin in resources/js/flexilla.js (or app.js)
    ↓ (manual)
Include flexilla.js in the layout via @vite
```

The `flexi:add` command handles the npm install and plugin file creation automatically. You then need to import the plugin in your JS entry point and include that file in your layout.

**No Alpine plugins are installed from npm.** Each component creates a local plugin file (`resources/js/plugins/*.js`) that wraps a core `@flexilla/*` npm package into an Alpine directive.

## Quick Start

```bash
php artisan flexi:init
php artisan flexi:add flexiwind-base
```

`flexiwind-base` installs all common Flexilla packages and creates the `resources/js/flexilla.js` entry point with all plugins pre-imported and registered.

## Adding a Component (Step by Step)

```bash
# 1. Install the component — installs @flexilla/<package> + creates plugin file
php artisan flexi:add dropdown

# 2. Import the plugin in flexilla.js (or app.js)
```

```js
// resources/js/flexilla.js
import { DropdownPlugin } from "./plugins/dropdown";
Alpine.plugin(DropdownPlugin);
```

```blade
<!-- 3. Include flexilla.js in the layout via @vite -->
@vite(['resources/js/app.js', 'resources/js/flexilla.js'])
```

## Plugin File Pattern

Each plugin file wraps a `@flexilla/*` package into an Alpine directive with automatic cleanup:

```js
// resources/js/plugins/dropdown.js
import { Dropdown as FlexillaDropdown } from "@flexilla/dropdown";

export function DropdownPlugin(Alpine) {
    Alpine.directive("f-dropdown", (el, {}, { cleanup }) => {
        const dropdown = new FlexillaDropdown(el);
        cleanup(() => {
            dropdown.cleanup();
        });
    });
}
```

## Component → Package → Plugin Map

### Overlay & Disclosure

| Component | NPM Package | Plugin file |
|-----------|-------------|-------------|
| Modal | `@flexilla/modal` | `plugins/modal.js` |
| Slideover | `@flexilla/offcanvas` | `plugins/offcanvas.js` |
| Dropdown | `@flexilla/dropdown` | `plugins/dropdown.js` |
| Popover | `@flexilla/popover` | `plugins/popover.js` |
| Tooltip | `@flexilla/tooltip` | `plugins/tooltip.js` |
| Accordion | `@flexilla/accordion` | `plugins/accordion.js` |
| Collapse | `@flexilla/collapse` | `plugins/collapse.js` |
| Dissmissible | `@flexilla/dismissible` | `plugins/dissimissible.js` |

### Navigation & Input

| Component | NPM Package | Plugin file |
|-----------|-------------|-------------|
| Tabs | `@flexilla/tabs` | `plugins/tabs.js` |
| Navbar | `@flexilla/alpine-navbar` | `plugins/nav-bar.js` |
| OTP / Pin Input | `@flexilla/pin-input` | `plugins/pin-input.js` |
| Textarea auto-resize | `@flexilla/auto-resize-area` | `plugins/auto-resize-area.js` |
| Range | `@flexilla/custom-range` | `plugins/range-indicator.js` |

### Utilities

`@flexilla/utilities` provides DOM helpers used internally (no plugin wrapper needed):
- `disableTransitionsTemporarily()` — used for theme dark mode toggling
- `actionToggler`, `$` — used by the sidebar plugin

Auto-installed with `flexiwind-base`. No manual setup required.

## Import Patterns

### Centralized (recommended)

Keep all plugin imports in a dedicated `resources/js/flexilla.js`:

```js
import { AccordionPlugin } from "./plugins/accordion";
import { DropdownPlugin } from "./plugins/dropdown";
import { ModalPlugin } from "./plugins/modal";
import { TabsPlugin } from "./plugins/tabs";
import { RangeIndicatorPlugin } from "./plugins/range-indicator";
import { OffcanvasPlugin } from "./plugins/offcanvas";
import { AutoResizeAreaPlugin } from "./plugins/auto-resize-area";
import { PopoverPlugin } from "./plugins/popover";
import { TooltipPlugin } from "./plugins/tooltip";
import { PinInputPlugin } from "./plugins/pin-input";
import { NavbarPlugin } from "./plugins/nav-bar";
import "./sidebar-plugin";
import { CollapsePlugin } from "./plugins/collapse";
import { DissmissiblePlugin } from "./plugins/dissimissible";

Alpine.plugin(AccordionPlugin);
Alpine.plugin(DropdownPlugin);
Alpine.plugin(ModalPlugin);
Alpine.plugin(TabsPlugin);
Alpine.plugin(RangeIndicatorPlugin);
Alpine.plugin(OffcanvasPlugin);
Alpine.plugin(AutoResizeAreaPlugin);
Alpine.plugin(PopoverPlugin);
Alpine.plugin(TooltipPlugin);
Alpine.plugin(PinInputPlugin);
Alpine.plugin(NavbarPlugin);
Alpine.plugin(CollapsePlugin);
Alpine.plugin(DissmissiblePlugin);
```

Then register `flexilla.js` as a Vite input in `vite.config.js`:

```js
// vite.config.js
laravel({
    input: [
        'resources/js/app.js',
        'resources/js/flexilla.js',
    ],
}),
```

And include it in the layout:

```blade
@vite(['resources/js/app.js', 'resources/js/flexilla.js'])
```

### Inline in app.js

For simpler projects, import plugins directly in `app.js`:

```js
// resources/js/app.js
import { DropdownPlugin } from "./plugins/dropdown";
Alpine.plugin(DropdownPlugin);
```

Then `app.js` already loaded in the layout — no extra Vite entry needed.

## Standalone (without Alpine)

For projects not using Alpine.js, Flexilla components can be initialized directly from the core package:

```js
import { Modal } from "@flexilla/modal";
Modal.autoInit('[data-app-modal]');

import { Dropdown } from "@flexilla/dropdown";
Dropdown.autoInit('[data-f-dropdown]');
```

## Livewire Compatibility

All Flexilla components work with Livewire navigation. The Alpine plugins use `cleanup()` callbacks that destroy Flexilla instances when elements are removed. No manual re-initialization needed.

## Flexilla Agent Skills

For detailed per-component guidance on Flexilla APIs, events, accessibility, and positioning, install the Flexilla skill from the `unoforge/flexilla` repository:

```bash
php artisan boost:add-skill unoforge/flexilla
```

To update installed skills (including Flexilla):

```bash
php artisan boost:update
```

The Flexilla skill is installed the same way as Flexiwind skills — via Laravel Boost. It provides deeper documentation on:
- Flexilla component JS APIs (open, close, toggle methods)
- Event listeners and custom events
- Accessibility attributes and ARIA patterns
- Placement and positioning configuration
- Lifecycle management in SPA frameworks
