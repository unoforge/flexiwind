@php

@endphp

<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug" :links="[]">
    <x-md.h2>Theming Tokens</x-md.h2>
    <x-md.paragraph>
        Flexiwind uses semantic tokens instead of hardcoded color values.
        You define meaning-first roles such as <x-docs.inline-code text="primary" />,
        <x-docs.inline-code text="secondary" />, and <x-docs.inline-code text="danger" />,
        then consume them through utilities across the UI.
    </x-md.paragraph>
    <x-md.paragraph>
        Practical rule: update token values once in your theme layer, then let components inherit those values.
        This keeps theming predictable and avoids one-off styling.
    </x-md.paragraph>

    <x-md.h3>Semantic color roles</x-md.h3>

    <x-docs.table :columns="[['label' => 'Color', 'class' => 'w-60'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="primary" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The main brand color used for core actions and key UI elements such as primary buttons, links, and active states.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-mediuma">
                <x-docs.inline-code no-wrap text="secondary" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A supporting brand color used for secondary actions, complementary UI elements, or to provide visual hierarchy alongside the primary color.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="accent" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A highlight color used sparingly to draw attention to specific elements like badges, highlights, or special interactions.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="info" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Used to communicate neutral or informative messages, such as tips, hints, or informational alerts.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="success" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Indicates successful actions or positive states, such as confirmations, completed tasks, or valid inputs.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="warning" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Signals caution or potential issues that require user attention but are not critical errors.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="danger" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Represents destructive actions, errors, or critical states that may cause data loss or irreversible changes.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="gray" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    A neutral color scale used for backgrounds, borders, text, disabled states, and non-emphasized UI elements.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>Background</x-md.h3>
    <x-md.paragraph>
        Background tokens define app surfaces and elevation layers.
        Use utilities such as <x-docs.inline-code text="bg-bg" />, <x-docs.inline-code text="bg-bg-muted" />,
        <x-docs.inline-code text="bg-card" />, and <x-docs.inline-code text="bg-card-gray" />.
    </x-md.paragraph>
    <x-docs.table :columns="[['label' => 'Token', 'class' => 'w-60'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--bg" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Default app background.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--bg-subtle" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Subtle background to separate sections.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--bg-surface" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Elevated or surface layers (panels, sheets).
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--bg-muted" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Muted background for less emphasis.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--card" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Card background.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--card-gray" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Neutral/gray variant for cards.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--popover" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Popover/tooltip background.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--popover-gray" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Neutral/gray variant for popovers.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--overlay" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Overlays and scrims (modals, drawers).
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h3>Foreground</x-md.h3>
    <x-md.paragraph>
        Foreground tokens control text and icon hierarchy.
        Use <x-docs.inline-code text="text-fg" /> for default content, <x-docs.inline-code text="text-fg-title" />
        for high-emphasis headings, and muted tokens for secondary content.
    </x-md.paragraph>
    <x-docs.table :columns="[['label' => 'Token', 'class' => 'w-60'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--fg" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Default foreground for body text and icons.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--fg-title" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    High-emphasis titles and headings.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--fg-subtitle" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Secondary headings and labels.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--fg-muted" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Muted/tertiary text, placeholders, help text.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h3>Border</x-md.h3>
    <x-md.paragraph>
        Border tokens define separators, outlines, and control edges.
        Use <x-docs.inline-code text="border-border" /> as default, raise contrast with
        <x-docs.inline-code text="border-border-strong" />, and tune intensity with opacity utilities such as
        <x-docs.inline-code text="border-border/40" />.
    </x-md.paragraph>
    <x-docs.table :columns="[['label' => 'Token', 'class' => 'w-60'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--border" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Default border color for components.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--border-strong" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Stronger emphasis borders and outlines.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--border-subtle" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Subtle dividers and separators.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--border-card" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Card borders.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--border-input" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Input and form control borders.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>Border radius</x-md.h3>
    <x-md.paragraph>
        Radius tokens keep rounding consistent between primitives and composed components.
    </x-md.paragraph>
    <x-docs.table :columns="[['label' => 'Variable', 'class' => 'w-60'], ['label' => 'Description', 'class' => '']]">
        <x-ui.table.row>
            <x-ui.table.cell class="font-medium">
                <x-docs.inline-code no-wrap text="--radius-ui" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Default border radius for components.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h3>Others</x-md.h3>
    <x-md.paragraph>
        Keep additional tokens in the same semantic style: name by intent, not by raw value.
        This makes future redesigns or mode-specific adjustments safer and faster.
    </x-md.paragraph>


</x-layouts.doc-page-wrapper>
