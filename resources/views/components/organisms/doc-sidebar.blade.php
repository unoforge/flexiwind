

@php
    use App\Support\SidebarData;

    $groups = SidebarData::groups();
    $sidebarItems = SidebarData::items();
@endphp


<div aria-hidden="true" data-sidebar-overlay
    class="fixed inset-0 bg-gray-800/30 z-100 backdrop-blur-md hidden fx-open:flex lg:hidden"></div>
<aside data-app-sidebar class="docs-sidebar max-lg:bg-background  z-120 lg:z-35 pt-4 border-r border-border lg:border-r-0 flex flex-col">
    <button data-close-sidebar aria-label="Close Sidebar"
        class="size-8 text-foreground border border-border bg-background  ease-linear absolute top-16 -right-3 flex items-center justify-center lg:hidden rounded-lg z-10">
        <x-ui.icon name="ph--caret-left" class="flex" />
    </button>

    <x-atoms.doc-sidebar-wrapper>
        <nav class="w-full space-y-6 relative px-5 lg:pl-0 lg:pr-4 h-full">
            <ul class="space-y-3 text-foreground">
                @foreach ($groups as $group)
                    <x-molecules.group-item wire:key="group-{{ $group['name'] }}" :name="$group['name']" :title="$group['title']" :path="$group['path']"
                        :icon="$group['icon']" :is-hidden="$group['hidden']??false" :no-wire="$group['noWire']"/>
                @endforeach
            </ul>
            @foreach ($sidebarItems as $item)
                <x-molecules.sidebar-group :label="$item['label']" :items="$item['items']" />
            @endforeach
        </nav>
    </x-atoms.doc-sidebar-wrapper>
</aside>
