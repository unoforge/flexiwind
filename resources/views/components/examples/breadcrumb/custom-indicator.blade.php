<div class="flex flex-col w-full space-y-6">
    <x-ui.breadcrumb class=" text-fg-muted">
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle px-1.5 py-px border border-border rounded-full">
            Home
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle px-1.5 py-px border border-border rounded-full">
            Navigation
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item
            active active-class="px-1.5 py-px rounded-full border border-border-strong bg-bg-subtle text-fg-title font-semibold">
            Current Page
        </x-ui.breadcrumb.item>
    </x-ui.breadcrumb>
    <x-ui.breadcrumb class="text-fg-muted">
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle px-1.5 py-px border border-border rounded-full">
            Home
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle px-1.5 py-px border border-border rounded-full">
            Navigation
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item
            active active-class="px-1.5 py-px rounded-full border text-white bg-primary border-primary font-semibold">
            Current Page
        </x-ui.breadcrumb.item>
    </x-ui.breadcrumb>
    <x-ui.breadcrumb class="text-fg-muted">
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle gap-x-1.5 px-1.5 py-px rounded-full bg-bg-subtle hover:bg-bg-muted">
            <span aria-hidden="true" class="flex iconify ph--house text-xl"></span>
            Home
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item href="#"
            class="ease-linear hover:text-fg-subtitle gap-x-1.5 px-1.5 py-px rounded-full bg-bg-subtle hover:bg-bg-muted">
            <span aria-hidden="true" class="flex iconify ph--link-break text-xl"></span>
            Navigation
        </x-ui.breadcrumb.item>
        <x-ui.breadcrumb.item active
            active-class="gap-x-1.5 text-bg font-semibold px-1.5 py-px rounded-full bg-fg-title">
            <span aria-hidden="true" class="flex iconify ph--link-simple-horizontal"></span>
            Current Page
        </x-ui.breadcrumb.item>
    </x-ui.breadcrumb>

</div>
