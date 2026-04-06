<x-layouts.doc-page-wrapper :current="$current" :prev-slug="$prevSlug" :next-slug="$nextSlug">
    <x-md.h2>Demo</x-md.h2>
    <livewire:base.component-tab-preview-code component="components.examples.pagination.basic" />

    <x-md.h2>Installation</x-md.h2>
    <livewire:base.terminal code="php artisan flexi:add pagination" />


    <x-md.h2>Composition</x-md.h2>
    <x-md.paragraph>
        The pagination component is built using a composition of smaller components:
    </x-md.paragraph>
    <x-md.ul>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.pagination" /> - Main navigation container</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.pagination.content" /> - Flex container for items with
            spacing</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.pagination.item" /> - Individual item wrapper (li
            element)</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.pagination.link" /> - Clickable page links with active
            states</x-md.li>
        <x-md.li><x-docs.inline-code no-wrap text="x-ui.pagination.ellipsis" /> - Ellipsis for omitted pages</x-md.li>
    </x-md.ul>
    <x-md.paragraph>
        This composition approach allows you to build custom pagination layouts while maintaining consistent styling and
        behavior.
    </x-md.paragraph>

    <x-md.h2>Examples</x-md.h2>
    <x-md.h3>Working with icons</x-md.h3>
    <livewire:base.component-tab-preview-code component="components.examples.pagination.control-icon" />



    <x-md.h2>Component API</x-md.h2>

    <x-md.h3>Pagination</x-md.h3>
    <x-md.paragraph>
        Main container for pagination navigation.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes (optional)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>PaginationContent</x-md.h3>
    <x-md.paragraph>
        Container for pagination items with proper spacing.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes (optional)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>PaginationItem</x-md.h3>
    <x-md.paragraph>
        Individual pagination item wrapper. All standard HTML li attributes are supported.
    </x-md.paragraph>

    <x-md.h3>PaginationLink</x-md.h3>
    <x-md.paragraph>
        Individual page number link with active state support.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="isActive" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the link is the current page (default: false)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="size" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Size variant: 'xs', 'sm', 'md', 'lg', 'xl' (default: 'sm')
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="isIconOnly" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Whether the link contains only an icon (default: false)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="href" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    URL for the link (default: '#')
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="variant" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Button variant (auto-set based on isActive)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>

    <x-md.h3>PaginationEllipsis</x-md.h3>
    <x-md.paragraph>
        Ellipsis indicator for omitted pages.
    </x-md.paragraph>
    <x-docs.table>
        <x-ui.table.row>
            <x-ui.table.cell>
                <x-docs.inline-code no-wrap text="class" />
            </x-ui.table.cell>
            <x-ui.table.cell>
                <x-docs.table-description>
                    Additional CSS classes (optional)
                </x-docs.table-description>
            </x-ui.table.cell>
        </x-ui.table.row>
    </x-docs.table>


    <x-md.h2>Customization</x-md.h2>
    <x-md.paragraph>
        The pagination links use CSS utilities that can be easily customized through CSS variables. For advanced look
        and feel customization, you can override these utilities:
    </x-md.paragraph>
    <livewire:base.load-code :name="['pagination-utilities']" />
    <x-md.paragraph>
        Simply override the CSS variables in your theme to customize colors, backgrounds, and hover states:
    </x-md.paragraph>
    <livewire:base.load-code :name="['pagination-custom-theme']" />
</x-layouts.doc-page-wrapper>
