# Layout And Navigation

Use this reference when the task is about app navigation, page structure, or choosing between components and blocks.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [navbar.md](./navbar.md)
- [sidebar.md](./sidebar.md)
- [breadcrumbs.md](./breadcrumbs.md)
- [tabs.md](./tabs.md)
- [pagination.md](./pagination.md)
- [link.md](./link.md)

## Public Docs

- `https://flexiwind.unoforge.com/components`
- `https://flexiwind.unoforge.com/components/breadcrumbs`
- `https://flexiwind.unoforge.com/components/tabs`
- `https://flexiwind.unoforge.com/components/pagination`
- `https://flexiwind.unoforge.com/components/sidebar`
- `https://flexiwind.unoforge.com/components/navbar`
- `https://flexiwind.unoforge.com/blocks`

## Verified Blade Primitives

- `x-ui.breadcrumbs`
- `x-ui.breadcrumbs.item`
- `x-ui.breadcrumbs.separator`
- `x-ui.tabs`
- `x-ui.tabs.list`
- `x-ui.tabs.list-wrapper`
- `x-ui.tabs.trigger`
- `x-ui.tabs.panel-wrapper`
- `x-ui.tabs.panel`
- `x-ui.pagination`
- `x-ui.pagination.content`
- `x-ui.pagination.item`
- `x-ui.pagination.link`
- `x-ui.pagination.ellipsis`
- `x-ui.sidebar-wrapper`

## Tabs

Verified structure:

- `x-ui.tabs` is the wrapper
- tabs are built from list and panel subcomponents
- do not document `x-ui.tabs.content` because the current repo uses `panel` and `panel-wrapper`

## Sidebar

Important verified behavior:

- install command: `php artisan flexi:add sidebar-wrapper`
- the docs require a manual JS import for the sidebar plugin
- the base primitive is `x-ui.sidebar-wrapper`
- the behavior relies on Alpine and data attributes such as `data-toggle-sidebar` and `data-toggle-sidebar-size`

Do not invent a standalone `x-ui.sidebar` primitive unless the user is working with custom local code that defines one.

## Navbar

The catalog contains a navbar docs page, but there is no same-named `resources/views/components/ui/navbar.blade.php` file in this repo.

Guidance:

- treat navbar as a documented usage surface
- inspect the page examples before suggesting a concrete Blade tag
- do not invent `x-ui.navbar.*` subcomponents

## Blocks

Use blocks when the user needs a fuller section or app shell instead of a single primitive.

Verified block source:

- `config/blocks.php`

Public entry points:

- `https://flexiwind.unoforge.com/blocks`
- `https://flexiwind.unoforge.com/blocks/{blockCategory}/{blockName}`

Verified high-level groups in the registry:

- application
- marketing

Verified examples in the registry include:

- login forms
- signup forms
- sidebars
- auth/OTP
- headers
- application tables
- app shells
- KPI cards
- empty states
- widgets
- hero sections
- features
