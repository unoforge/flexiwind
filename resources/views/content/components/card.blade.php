<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">

    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.card.demo" />

    <x-md.h2>Installation</x-md.h2>
    <x-md.paragraph>Install the component</x-md.paragraph>
    <livewire:base.terminal code="php artisan flexi:add card" />

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>With Icon</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.card.with-icon" />

    <x-md.h3>E-Commerce 1</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.card.e-commerce-1" />

    <x-md.h3>E-Commerce 2</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.card.e-commerce-2" />

    <x-md.h3>Pricing</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.card.pricing-1" />

    <x-md.h2>References</x-md.h2>
    <x-md.h3>
        Composition
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                The main card container component
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card.header" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                Container for the card header section with flexible layout options
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card.content" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                Container for the main card content with configurable spacing
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card.title" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The card title component with configurable heading levels and sizes
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card.description" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The card description component for secondary text content
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="x-ui.card.footer" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                Container for the card footer section
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Props
    </x-md.h3>
    <x-md.paragraph>
        To configure the card component you can use the following props.
        All props are optional.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="fill" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The background fill style. Options: "default", "gray". Default: "default"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The padding size. Options: "2xs", "xs", "sm", "default", "lg", "none". Default: "default"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="variant" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The visual variant. Options: "none", "soft", "solid". Default: "none"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="intent" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The color intent when variant is not "none". Default: "gray"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="border" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the border on the card. Default: true
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="shadow" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the shadow on the card. Default: true
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes for the card. Default: ''
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Header Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="direction" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Flex direction. Options: "column", "row". Default: "column"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="justify" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Justify content alignment. Options: "start", "end", "center". Default: "start"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="flexNone" /> (boolean)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Disables flex layout when true. Default: false
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="gap" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Gap size between items. Options: "1", "2", "3", "4". Default: "2"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Content Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="gap" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Gap size between content items. Options: "1", "2", "3", "4". Default: "3"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Title Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="level" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    HTML heading level. Options: "1", "2", "3", "4". Default: "2"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="text" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The title text content. Default: null (uses slot content)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Text size. Options: "sm", "md", "lg", "xl". Default: "lg"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="weight" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Font weight. Options: "medium", "semibold", "bold". Default: "semibold"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Description Props
    </x-md.h3>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="text" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    The description text content. Default: null (uses slot content)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" /> (string)
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Text size. Options: "sm", "base", "lg". Default: "sm"
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>
        Card Footer Props
    </x-md.h3>
    <x-md.paragraph>
        The card footer component accepts all standard HTML attributes and passes them through to the container div. No specific props are defined.
    </x-md.paragraph>

    <x-md.h2>
        Style Guide
    </x-md.h2>
    <x-md.h3>
        Customizing Padding
    </x-md.h3>
    <x-md.paragraph>
        The card component uses CSS variables for padding that can be overridden for custom spacing:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="--card-padding" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the padding inside the card. Default value depends on the size prop.
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        You can override the padding using CSS classes:
    </x-md.paragraph>
    <livewire:base.load-code :name="['card-custom-padding']" />

    <x-md.h3>
        Customizing Border Radius
    </x-md.h3>
    <x-md.paragraph>
        The card component uses CSS variables for border radius:
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="--card-radius" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Controls the border radius of the card. Default: <x-docs.inline-code no-wrap text="var(--radius-ui)" />
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>
    <x-md.paragraph>
        You can override the border radius using CSS classes:
    </x-md.paragraph>
    <livewire:base.load-code :name="['card-custom-radius']" />

    <x-md.h3>
        Combining Customizations
    </x-md.h3>
    <x-md.paragraph>
        You can combine multiple variable overrides for complete control over the card appearance:
    </x-md.paragraph>
    <livewire:base.load-code :name="['card-combined-customization']" />
</x-layouts.doc-page-wrapper>
