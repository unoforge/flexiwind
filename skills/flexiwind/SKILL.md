---
name: flexiwind
description: Use this skill when an AI assistant needs to help someone use Flexiwind in a Laravel Blade or Laravel Livewire project.
license: MIT
---

# Flexiwind Skill

Flexiwind is a Laravel-first UI component system built with Blade, Livewire, and Tailwind CSS v4. Think of it like shadcn/ui but for Laravel — it provides copy-paste components, blocks, and a semantic theming system, all installable via CLI.

## Goal

Help users build accurate Flexiwind integrations without inventing components, props, CLI commands, or block names.

## How Flexiwind Works

Flexiwind has three layers that work together:

1. **Components** (`x-ui.*`) — Reusable Blade primitives installed individually via CLI (`php artisan flexi:add button`). Each component is a Blade file you own and customize.

2. **Blocks** — Pre-built sections (login forms, sidebars, KPIs, hero sections, etc.) composed from components. Listed in `config/blocks.php`.

3. **Theme** — CSS variable tokens (`--primary`, `--background`, `--foreground`, `--title-foreground`, `--border`, etc.) consumed through Tailwind v4 `@theme` utilities (`bg-primary`, `text-foreground`, `text-title-foreground`, `border-border`).

## Source of truth

Use the files in this skill first. The public docs site is also available at `https://flexiwind.unoforge.com`.

- [references/best-practices.md](./references/best-practices.md) — verified usage rules and source-of-truth guidance
- [references/styling-principles.md](./references/styling-principles.md) — semantic tokens, dark mode, theming vocabulary
- [references/things-to-avoid.md](./references/things-to-avoid.md) — common mistakes and invented APIs to avoid
- [references/accessibility.md](./references/accessibility.md) — accessible usage patterns
- [references/performance.md](./references/performance.md) — performance guidance
- [references/theme.md](./references/theme.md) — full CSS variable token reference and theme setup
- [references/colors.md](./references/colors.md) — color token setup for light/dark/both modes
- [references/button-utilities.md](./references/button-utilities.md) — CSS utility definitions for button variants
- [references/components.md](./references/components.md) — full component reference index
- [references/interactions.md](./references/interactions.md) — Flexilla interaction setup, plugin imports, and livewire compatibility

## Working Rules

1. Never invent `x-ui.*` components that are not present in `resources/views/components/ui`.
2. Never invent props, CLI commands, or block names.
3. Distinguish between docs page names and Blade component names when they differ:

   | Docs page | Blade component | Install slug |
   |-----------|----------------|--------------|
   | text-area | `x-ui.textarea` | `text-area` |
   | aspect-ratio | `x-ui.aspect` | `aspect` |
   | sidebar | `x-ui.sidebar-wrapper` | `sidebar-wrapper` |
   | otp | `x-ui.otp` | `otp` |
   | alert-dialog | not standalone; built on `x-ui.modal` | — |
   | navbar | no Blade component; Alpine directives only | npm package |

4. Prefer documented composition patterns over custom abstractions.
5. When a component, prop, command, or block is not present in the skill files or the live docs, do not invent it.
6. Do not reference repository-local paths, examples, or source files in user-facing answers. Use Blade component syntax.
7. Components that require Flexilla JS must include the npm install and Alpine plugin import in any answer. For detailed Flexilla guidance (JS APIs, events, accessibility), suggest installing the Flexilla skill: `php artisan boost:add-skill unoforge/flexilla`.
8. The `dissmissible` component name is intentionally spelled with double-s in the codebase and CLI slug. Use that spelling exactly.

9. Follow component composition safety rules:
   - Trigger components (`x-ui.modal.trigger`, `x-ui.slideover.trigger`, `x-ui.dropdown.trigger`, `x-ui.popover.trigger`, `x-ui.tooltip.trigger`) already render as `<button>` elements. Do **not** nest another `<x-ui.button>` or `<button>` inside them — they accept button props directly.
   - Triggers must be placed **outside** their overlay wrapper (`<x-ui.modal>`, `<x-ui.slideover>`). These wrappers are invisible when closed — a trigger inside would be unclickable.
   - Trigger attribute names: `modal-id`, `slide-over-id` (not `slideover-id`), `dropdown-id`, `popover-id`, `tooltip-id`.
   - `x-ui.modal.close` and `x-ui.slideover.close` inherit `x-ui.button` props — do not nest a `<button>` or `<x-ui.button>` inside them. Passing text or an icon is fine.
   - `x-ui.dropdown.trigger` accepts button props (`variant`, `intent`, `size`, etc.) — pass them directly to the trigger rather than wrapping in a button.
   - Do not nest `<x-ui.link>` inside `<x-ui.button>` or vice versa. If you need a link that looks like a button, use `x-ui.button href` or `x-ui.link asButton`.
   - `x-ui.link` renders an `<a>` tag by default — do not put interactive elements (buttons, links) inside it.

## Answering Pattern

1. **Identify the need**: Is it a component, a block, theming, or CLI question?

2. **Read the source**: Open the relevant file from `components/*.md` or `references/*.md`.

3. **Give the smallest working example**:
   - Install command: `php artisan flexi:add <name>`
   - Minimal Blade usage with `x-ui.*` tags
   - JS initialization if the component requires Flexilla/Alpine plugins

4. **Call out important props** — size, variant, intent, and any required attributes.

5. **Add one short "avoid" note** when there is a common Flexiwind mistake for that component.

### Example Answer (good)

> To add a button:
> ```bash
> php artisan flexi:add button
> ```
> ```blade
> <x-ui.button variant="solid" intent="primary" size="md">
>     Click me
> </x-ui.button>
> ```
> Key props: `variant` (solid|soft|outline|ghost|none), `intent` (any semantic color), `size` (xs|sm|md|lg|xl).
> Avoid: Do not invent variant names outside the documented set.

### Example Answer (bad)

> Use flexi-ui-button with loading prop.
> ❌ "flexi-ui-button" doesn't exist. "loading" is not a documented prop.

## Components Overview

### Actions & Inputs
| Component | Install | Blade |
|-----------|---------|-------|
| Button | `flexi:add button` | `x-ui.button` |
| Input | `flexi:add input` | `x-ui.input` |
| Textarea | `flexi:add text-area` | `x-ui.textarea` |
| Select | `flexi:add select` | `x-ui.select` |
| Checkbox | `flexi:add checkbox` | `x-ui.checkbox` |
| Radio | `flexi:add radio` | `x-ui.radio` |
| Switch | `flexi:add switch` | `x-ui.switch` |
| OTP / Pin | `flexi:add otp` | `x-ui.otp` |
| Range | `flexi:add range` | `x-ui.range` |

### Layout & Structure
| Component | Install | Blade |
|-----------|---------|-------|
| Card | `flexi:add card` | `x-ui.card` |
| Divider | `flexi:add divider` | `x-ui.divider` |
| Field | `flexi:add field` | `x-ui.field` |
| Aspect Ratio | `flexi:add aspect` | `x-ui.aspect` |

### Navigation
| Component | Install | Blade |
|-----------|---------|-------|
| Navbar | npm (@flexilla/alpine-navbar) | Alpine directives |
| Sidebar | `flexi:add sidebar-wrapper` | `x-ui.sidebar-wrapper` |
| Breadcrumbs | `flexi:add breadcrumbs` | `x-ui.breadcrumbs` |
| Tabs | `flexi:add tabs` | `x-ui.tabs` |
| Pagination | `flexi:add pagination` | `x-ui.pagination` |
| Link | `flexi:add link` | `x-ui.link` |

### Data & Feedback
| Component | Install | Blade |
|-----------|---------|-------|
| Table | `flexi:add table` | `x-ui.table` |
| Avatar | `flexi:add avatar` | `x-ui.avatar` |
| Badge | `flexi:add badge` | `x-ui.badge` |
| Alert | `flexi:add alert` | `x-ui.alert` |
| Callout | `flexi:add callout` | `x-ui.callout` |
| Progress | `flexi:add progress` | `x-ui.progress` |
| Meter | `flexi:add meter` | `x-ui.meter` |
| Skeleton | `flexi:add skeleton` | `x-ui.skeleton` |
| Kbd | `flexi:add kbd` | `x-ui.kbd` |

### Overlays & Disclosure
| Component | Install | Blade | Flexilla? |
|-----------|---------|-------|-----------|
| Modal | `flexi:add modal` | `x-ui.modal` | Yes |
| Alert Dialog | built on modal | `x-ui.modal` | Yes |
| Slideover | `flexi:add slideover` | `x-ui.slideover` | Yes |
| Dropdown | `flexi:add dropdown` | `x-ui.dropdown` | Yes |
| Popover | `flexi:add popover` | `x-ui.popover` | Yes |
| Tooltip | `flexi:add tooltip` | `x-ui.tooltip` | Yes |
| Accordion | `flexi:add accordion` | `x-ui.accordion` | Yes |
| Collapse | `flexi:add collapse` | `x-ui.collapse` | Yes |
| Dissmissible | `flexi:add dissmissible` | `x-ui.dissmissible` | Yes |

### Typography
| Component | Install | Blade |
|-----------|---------|-------|
| Icon | `flexi:add icon` | `x-ui.icon` |
| Text | `flexi:add text` | `x-ui.text` |
| Heading | `flexi:add heading` | `x-ui.heading` |

## Key Composition Patterns

### Button
```blade
<x-ui.button variant="solid" intent="primary" size="md">
    <x-ui.icon name="ph--atom" class="mr-1.5" />
    With Icon
</x-ui.button>
```

### Input Group (CRITICAL — strict rules)
```blade
<x-ui.input.group>
    <x-ui.input variant="unstyled" type="email" placeholder="you@example.com" class="ps-9 px-3" />
    <x-ui.input.leading absolute class="text-foreground text-sm">
        <x-ui.icon name="ph--at" class="size-4" />
    </x-ui.input.leading>
</x-ui.input.group>
```
Rules: `variant="unstyled"` inside group, never pass `label` to grouped input.

### Modal
```blade
<x-ui.modal.trigger modal-id="edit-profile" variant="solid" intent="primary">
    Open
</x-ui.modal.trigger>

<x-ui.modal id="edit-profile">
    <x-ui.modal.content size="md">
        <x-ui.modal.header title="Title" description="Optional description." />
        <x-ui.modal.body>Content</x-ui.modal.body>
        <x-ui.modal.footer>
            <x-ui.button>Save</x-ui.button>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>
```
The trigger **must be outside** `<x-ui.modal>` — the dialog is hidden when closed. Requires Flexilla JS: `npm i @flexilla/modal`. Import plugin in Alpine.

### Card
```blade
<x-ui.card>
    <x-ui.card.header>
        <x-ui.card.title>Title</x-ui.card.title>
        <x-ui.card.description>Description</x-ui.card.description>
    </x-ui.card.header>
    <x-ui.card.content>Content</x-ui.card.content>
    <x-ui.card.footer>
        <x-ui.button size="sm">Action</x-ui.button>
    </x-ui.card.footer>
</x-ui.card>
```

### Table
```blade
<x-ui.table striped hoverable>
    <x-ui.table.columns>
        <x-ui.table.column>Name</x-ui.table.column>
        <x-ui.table.column>Email</x-ui.table.column>
    </x-ui.table.columns>
    <x-ui.table.rows>
        <x-ui.table.row>
            <x-ui.table.cell>John</x-ui.table.cell>
            <x-ui.table.cell>john@example.com</x-ui.table.cell>
        </x-ui.table.row>
    </x-ui.table.rows>
</x-ui.table>
```

## Blocks (Pre-built Sections)

Blocks are full sections composed from components. Available block categories from `config/blocks.php`:

### Application Blocks

| Category | Blocks |
|----------|--------|
| Login Form | `login01`, `login02`, `login03`, `login04`, `login05` |
| Signup Form | `signup01`, `signup02` |
| Sidebar | `sidebar01`, `sidebar02`, `sidebar03` |
| Auth (OTP) | `otp01`, `password-reset01` |
| Header Nav | `header01`, `header02`, `header03`, `header04`, `header05` |
| Table | `table01`, `table02`, `table03`, `table04`, `table05`, `table06`, `table07` |
| App Shell | `shell01`, `shell02`, `shell03` |
| Dash KPI | `kpi01`, `kpi02`, `kpi03`, `kpi04`, `kpi05` |
| Empty States | `empty-state01`, `empty-state02` |
| Widgets | `activity01`, `activity02`, `top-products` |
| Modal Form | `create-user-modal`, `confirm-action-modal` |
| Slideover Form | `settings-slideover`, `notification-preferences` |
| Dropdown Menu | `user-dropdown`, `table-actions-dropdown` |
| Stats Panel | `project-stats-panel`, `team-performance-card` |
| Toast Notification | `inline-toast`, `notification-stack` |
| User Management | `user-list` |
| Dashboard Analytics | `dash-analytics` |

### Marketing Blocks

| Category | Blocks |
|----------|--------|
| Hero Sections | `hero01` |
| Features | `features01` |

Block preview URLs follow the pattern: `https://flexiwind.unoforge.com/preview-ui/{category}/{block}`

## Theming

### Semantic Colors

| Token | Usage |
|-------|-------|
| `primary` | Brand color for primary actions |
| `secondary` | Supporting brand color |
| `accent` | Highlights and badges |
| `info` | Informational messages |
| `success` | Positive states |
| `warning` | Caution states |
| `destructive` | Destructive actions |
| `gray` | Neutrals and backgrounds |

### Token Families

- Background: `bg-background `, `bg-muted`, `bg-card`, `surface-background`
- Foreground: `text-foreground`, `text-title-foreground`, `text-muted-foreground`
- Border: `border-border`, `border-input`, `border-border-strong`, `border-border-card`

### CSS Setup

```css
/* app.css */
@import "tailwindcss";
@reference "./flexiwind/base.css";
@reference "./flexiwind/form.css";
@reference "./flexiwind/button.css";
@reference "./flexiwind/ui.css";
@reference "./flexiwind/utils.css";
@reference "./flexiwind/intents.css";

@theme inline {
    --color-primary: var(--primary);
    --color-secondary: var(--secondary);
    --color-background: var(--background);
    --color-foreground: var(--foreground);
    --color-title-foreground: var(--title-foreground);
    --color-border: var(--border);
    --radius-ui: var(--ui-radius);
    --radius-card: var(--card-radius);
}
```

## Requirements

| Dependency | Minimum | Recommended |
|---|---|---|
| PHP | `^8.3` | `^8.4` |
| Laravel | `^13.29` | `^13.29` |
| Livewire | `^4.4` | `^4.4` |
| Tailwind CSS | v4 | v4 |

> **As of 2026-08-29:** Laravel 13.29.0, Livewire 4.4.2. Update `composer.json` constraints accordingly before running `composer update`.

## CLI Reference

| Command | Description |
|---------|-------------|
| `php artisan flexi:init` | Initialize Flexiwind in project |
| `php artisan flexi:add <name>` | Install a component/block |
| `php artisan flexi:add flexiwind-base` | Install base dependencies |
| `php artisan flexi:help` | Show CLI help |

## flexiwind.yaml Config

The project's `flexiwind.yaml` defines the setup:

```yaml
framework: laravel
livewire: true
alpine: false
theme: flexiwind
themeMode: Both        # Both, Light, or Dark
cssFramework: tailwindcss
iconLibrary: phosphore
js_folder: resources/js
css_folder: resources/css
registries:
  '@flexiwind': https://raw.githubusercontent.com/unoforge/flexiwind/.../{name}.json
```

## Loading Files

Do not load everything at once. Read only the files relevant to the current task. See the component map above to find the right file.

## Quick Start (CLI)

```bash
# Requires PHP ^8.4, Laravel ^13.29, Livewire ^4.4, Tailwind CSS v4
composer require --dev unoforge/flexiwind-cli
php artisan flexi:init
php artisan flexi:add flexiwind-base
php artisan flexi:add button input
php artisan flexi:help
```

Docs: `https://flexiwind.unoforge.com/docs/introduction`

## Anti-Patterns

These are documented mistakes that agents must avoid when generating Flexiwind code.

### Button-in-Trigger

❌ Wrong:
```blade
<x-ui.modal.trigger modal-id="edit-profile">
    <x-ui.button>Open</x-ui.button>
</x-ui.modal.trigger>
```

✅ Correct:
```blade
<x-ui.modal.trigger modal-id="edit-profile" variant="solid" intent="primary">
    Open
</x-ui.modal.trigger>
```

Triggers already render as `<button>` elements and accept button props (`variant`, `intent`, `size`, etc.). Nesting a button inside creates invalid HTML (button inside button).

### Link-in-Button / Button-in-Link

❌ Wrong:
```blade
<x-ui.button><x-ui.link href="/dashboard">Dashboard</x-ui.link></x-ui.button>
<x-ui.link asButton><x-ui.button>Click</x-ui.button></x-ui.link>
```

✅ Correct:
```blade
<x-ui.button href="/dashboard">Dashboard</x-ui.button>
<x-ui.link asButton href="/login">Login</x-ui.link>
```

### Button-inside-Close

❌ Wrong:
```blade
<x-ui.modal.close>
    <x-ui.button>Close</x-ui.button>
</x-ui.modal.close>
```

✅ Correct:
```blade
<x-ui.modal.close>
    Cancel
</x-ui.modal.close>
```

`x-ui.modal.close` already wraps `<x-ui.button>` — nesting another button inside creates invalid HTML. Passing text or an icon is the correct usage.
