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
    <x-ui.breadcrumbs wrapper="border-y py-2 px-4 border-border-strong" class="text-muted-foreground">
        <x-ui.breadcrumbs.item href="#">
            <x-ui.icon name="ph--house" class="flex size-4 mr-1" />
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#">
            <x-ui.icon name="ph--link-break" class="flex size-4 mr-1" />
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item active>
            <x-ui.icon name="ph--link-simple-horizontal" class="flex size-4 mr-1" />
            <span aria-current="page" class="flex">Current Page</span>
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>
</div>
