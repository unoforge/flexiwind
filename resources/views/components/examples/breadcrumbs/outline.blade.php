<div class="w-full flex flex-col gap-6">
    <x-ui.breadcrumbs wrapper="py-2 px-4 rounded-md border border-border-strong">
        <x-ui.breadcrumbs.item href="#">
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#">
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item active>
            Current Page
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>
    <x-ui.breadcrumbs wrapper="border-y py-2 px-4 border-border-strong" class="text-fg-muted">
        <x-ui.breadcrumbs.item href="#">
            <span aria-hidden="true" class="flex iconify ph--house size-4 mr-1"></span>
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#">
            <span aria-hidden="true" class="flex iconify ph--link-break size-4 mr-1"></span>
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item active>
            <span aria-hidden="true" class="flex iconify ph--link-simple-horizontal size-4 mr-1"></span>
            <span aria-current="page" class="flex">Current Page</span>
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>
</div>
