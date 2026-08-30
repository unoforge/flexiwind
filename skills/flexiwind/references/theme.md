## Theming Tokens

Flexiwind uses semantic tokens instead of hardcoded color values. You define meaning-first roles such as primary , secondary , and destructive , then consume them through utilities across the UI.

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
| destructive | Represents destructive actions, errors, or critical states that may cause data loss or irreversible changes. |
| gray | A neutral color scale used for backgrounds, borders, text, disabled states, and non-emphasized UI elements. |

### Background

Background tokens define app surfaces and elevation layers. Use utilities such as `bg-background `, `bg-muted`, `bg-card`, and `surface-background`.

| Token | Description |
| --- | --- |
| --background | Default app background. |
| --muted | Subtle background to separate sections. |
| --card | Card background. |
| --surface-background | Neutral surface background for panels and repeated items. |
| --popover | Popover/tooltip background. |
| --popover-foreground | Foreground used inside popovers and tooltips. |

### Foreground

Foreground tokens control text and icon hierarchy. Use `text-foreground` for body text, `text-title-foreground` for high-emphasis headings, then use `text-muted-foreground` for supporting copy.

| Token | Description |
| --- | --- |
| --foreground | Default foreground for body text and icons. |
| --title-foreground | High-emphasis titles and headings. |
| --muted-foreground | Muted/tertiary text, placeholders, help text. |

### Border

Border tokens define separators, outlines, and control edges. Use `border-border` as default, raise contrast with `border-border-strong`, and tune intensity with opacity utilities such as `border-border/40`.

| Token | Description |
| --- | --- |
| --border | Default border color for components. |
| --border-strong | Stronger emphasis borders and outlines. |
| --border-card | Card borders. |
| --border-input | Input and form control borders. |
| --input | Native input border token exposed as `border-input`. |
| --ring | Focus ring token exposed as `ring-ring`. |

### Border radius

Radius tokens keep rounding consistent between primitives and composed components.

| Variable | Description |
| --- | --- |
| --radius-ui | Default border radius for components. |

### Others

Keep additional tokens in the same semantic style: name by intent, not by raw value. This makes future redesigns or mode-specific adjustments safer and faster.
