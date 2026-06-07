## Theming Tokens

Flexiwind uses semantic tokens instead of hardcoded color values. You define meaning-first roles such as primary , secondary , and danger , then consume them through utilities across the UI.

Practical rule: update token values once in your theme layer, then let components inherit those values. This keeps theming predictable and avoids one-off styling.

### Semantic color roles

| Color | Description |
| --- | --- |
| primary | The main brand color used for core actions and key UI elements such as primary buttons, links, and active states. |
| secondary | A supporting brand color used for secondary actions, complementary UI elements, or to provide visual hierarchy alongside the primary color. |
| accent | A highlight color used sparingly to draw attention to specific elements like badges, highlights, or special interactions. |
| info | Used to communicate neutral or informative messages, such as tips, hints, or informational alerts. |
| success | Indicates successful actions or positive states, such as confirmations, completed tasks, or valid inputs. |
| warning | Signals caution or potential issues that require user attention but are not critical errors. |
| danger | Represents destructive actions, errors, or critical states that may cause data loss or irreversible changes. |
| gray | A neutral color scale used for backgrounds, borders, text, disabled states, and non-emphasized UI elements. |

### Background

Background tokens define app surfaces and elevation layers. Use utilities such as bg-bg , bg-bg-muted , bg-card , and bg-card-gray .

| Token | Description |
| --- | --- |
| --bg | Default app background. |
| --bg-subtle | Subtle background to separate sections. |
| --bg-surface | Elevated or surface layers (panels, sheets). |
| --bg-muted | Muted background for less emphasis. |
| --card | Card background. |
| --card-gray | Neutral/gray variant for cards. |
| --popover | Popover/tooltip background. |
| --popover-gray | Neutral/gray variant for popovers. |
| --overlay | Overlays and scrims (modals, drawers). |

### Foreground

Foreground tokens control text and icon hierarchy. Use text-fg for default content, text-fg-title for high-emphasis headings, and muted tokens for secondary content.

| Token | Description |
| --- | --- |
| --fg | Default foreground for body text and icons. |
| --fg-title | High-emphasis titles and headings. |
| --fg-subtitle | Secondary headings and labels. |
| --fg-muted | Muted/tertiary text, placeholders, help text. |

### Border

Border tokens define separators, outlines, and control edges. Use border-border as default, raise contrast with border-border-strong , and tune intensity with opacity utilities such as border-border/40 .

| Token | Description |
| --- | --- |
| --border | Default border color for components. |
| --border-strong | Stronger emphasis borders and outlines. |
| --border-subtle | Subtle dividers and separators. |
| --border-card | Card borders. |
| --border-input | Input and form control borders. |

### Border radius

Radius tokens keep rounding consistent between primitives and composed components.

| Variable | Description |
| --- | --- |
| --radius-ui | Default border radius for components. |

### Others

Keep additional tokens in the same semantic style: name by intent, not by raw value. This makes future redesigns or mode-specific adjustments safer and faster.
