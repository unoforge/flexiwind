# Components Reference

Full index of Flexiwind components. Each component is installed individually via `php artisan flexi:add <slug>` and used as Blade `x-ui.*` component.

## Actions & Inputs

| Component | Install Slug | Blade Tag | Docs URL |
|-----------|-------------|-----------|----------|
| Button | `button` | `x-ui.button` | /components/button |
| Input | `input` | `x-ui.input` | /components/input |
| Textarea | `text-area` | `x-ui.textarea` | /components/text-area |
| Select | `select` | `x-ui.select` | /components/select |
| Checkbox | `checkbox` | `x-ui.checkbox` | /components/checkbox |
| Radio | `radio` | `x-ui.radio` | /components/radio |
| Switch | `switch` | `x-ui.switch` | /components/switch |
| OTP / Pin | `otp` | `x-ui.otp` | /components/otp |
| Range | `range` | `x-ui.range` | /components/range |

## Layout

| Component | Install Slug | Blade Tag | Docs URL |
|-----------|-------------|-----------|----------|
| Card | `card` | `x-ui.card` | /components/card |
| Divider | `divider` | `x-ui.divider` | /components/divider |
| Field | `field` | `x-ui.field` | /components/field |
| Aspect Ratio | `aspect` | `x-ui.aspect` | /components/aspect-ratio |

## Navigation

| Component | Install Slug | Blade Tag | Notes |
|-----------|-------------|-----------|-------|
| Navbar | npm (@flexilla/alpine-navbar) | Alpine directives | No Blade component |
| Sidebar | `sidebar-wrapper` | `x-ui.sidebar-wrapper` | — |
| Breadcrumbs | `breadcrumbs` | `x-ui.breadcrumbs` | — |
| Tabs | `tabs` | `x-ui.tabs` | Composition pattern |
| Pagination | `pagination` | `x-ui.pagination` | — |
| Link | `link` | `x-ui.link` | — |

## Data & Feedback

| Component | Install Slug | Blade Tag |
|-----------|-------------|-----------|
| Table | `table` | `x-ui.table` |
| Avatar | `avatar` | `x-ui.avatar` |
| Badge | `badge` | `x-ui.badge` |
| Alert | `alert` | `x-ui.alert` |
| Callout | `callout` | `x-ui.callout` |
| Progress | `progress` | `x-ui.progress` |
| Meter | `meter` | `x-ui.meter` |
| Skeleton | `skeleton` | `x-ui.skeleton` |
| Kbd | `kbd` | `x-ui.kbd` |

## Overlays & Disclosure

| Component | Install Slug | Blade Tag | Flexilla JS? |
|-----------|-------------|-----------|-------------|
| Modal | `modal` | `x-ui.modal` | Yes |
| Alert Dialog | — | built on `x-ui.modal` | Yes |
| Slideover | `slideover` | `x-ui.slideover` | Yes |
| Dropdown | `dropdown` | `x-ui.dropdown` | — |
| Popover | `popover` | `x-ui.popover` | — |
| Tooltip | `tooltip` | `x-ui.tooltip` | — |
| Accordion | `accordion` | `x-ui.accordion` | — |
| Collapse | `collapse` | `x-ui.collapse` | — |
| Dissmissible | `dissmissible` | `x-ui.dissmissible` | — |

## Typography

| Component | Install Slug | Blade Tag |
|-----------|-------------|-----------|
| Icon | `icon` | `x-ui.icon` |
| Text | `text` | `x-ui.text` |
| Heading | `heading` | `x-ui.heading` |

## Important Naming Notes

- `text-area` docs page → Blade `x-ui.textarea` (no hyphen)
- `aspect-ratio` docs page → install slug `aspect`, Blade `x-ui.aspect`
- `sidebar` docs page → install slug `sidebar-wrapper`, Blade `x-ui.sidebar-wrapper`
- `otp` docs page → Blade `x-ui.otp`
- `alert-dialog` docs page → no standalone primitive; built on `x-ui.modal`
- `dissmissible` is spelled with double-s intentionally
- `navbar` has no Blade component — uses AlpineJS directives

## Component Files

For detailed API, props tables, examples, and guidance, see the individual files in the `components/` directory.
