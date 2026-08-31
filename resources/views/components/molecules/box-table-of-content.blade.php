@props(['contentHtml', 'fileName' => ''])

@php
    use App\Support\HeadingExtractor;
    $headings = HeadingExtractor::extractFromHtml($contentHtml);
@endphp

<div data-table-of-content
    class="box-tab-content tab-content-ui-background xl:bg-transparent xl:z-auto tab-content-ui-states tab-content-ui flex overflow-hidden">
    <x-atoms.scrollable-y class="w-full p-4">
        <div class="gap-y-8 flex flex-col min-h-full w-full">
            <div class="flex flex-col space-y-3">
                <span class="text-muted-foreground flex items-center">
                    <x-ui.icon name="ph--book-open" class="text-xs mr-2" />
                    On this page
                </span>
               
                <div>
                    <x-molecules.table-of-content :grouped-headings="$headings" />
                </div>
            </div>
            <x-molecules.contrib-doc :file-name="$fileName" />
        </div>
    </x-atoms.scrollable-y>
</div>