<div class="w-full flex flex-col gap-6">
    <x-ui.breadcrumb wrapper="py-2 px-4 rounded-md border border-border-strong">
        <x-ui.breadcrumb.item href="#">
            Home
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item href="#">
            Navigation
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item active>
            Current Page
        </x-ui.breadcrumb.item>
    </x-ui.breadcrumb>
    <x-ui.breadcrumb wrapper="border-y py-2 px-4 border-border-strong" class="text-fg-muted">
        <x-ui.breadcrumb.item href="#">
            <span aria-hidden="true" class="flex iconify ph--house size-4 mr-1"></span>
            Home
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item href="#">
            <span aria-hidden="true" class="flex iconify ph--link-break size-4 mr-1"></span>
            Navigation
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item active>
            <span aria-hidden="true" class="flex iconify ph--link-simple-horizontal size-4 mr-1"></span>
            <span aria-current="page" class="flex">Current Page</span>
        </x-ui.breadcrumb.item>
    </x-ui.breadcrumb>
</div>
