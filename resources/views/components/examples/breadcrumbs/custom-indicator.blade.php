<div class="flex flex-col w-full space-y-6">
    <x-ui.breadcrumbs class=" text-muted-foreground">
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground px-1.5 py-px border border-border rounded-full">
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground px-1.5 py-px border border-border rounded-full">
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item
            active active-class="px-1.5 py-px rounded-full border border-border-strong bg-muted text-foreground font-semibold">
            Current Page
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>
    <x-ui.breadcrumbs class="text-muted-foreground">
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground px-1.5 py-px border border-border rounded-full">
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground px-1.5 py-px border border-border rounded-full">
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item
            active active-class="px-1.5 py-px rounded-full border text-white bg-primary border-primary font-semibold">
            Current Page
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>
    <x-ui.breadcrumbs class="text-muted-foreground">
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground gap-x-1.5 px-1.5 py-px rounded-full bg-muted hover:bg-muted">
            <x-ui.icon name="ph--house" class="flex size-4 mr-1" />
            Home
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item href="#"
            class="ease-linear hover:text-foreground gap-x-1.5 px-1.5 py-px rounded-full bg-muted hover:bg-muted">
            <x-ui.icon name="ph--link-break" class="flex size-4 mr-1" />
            Navigation
        </x-ui.breadcrumbs.item>
        <x-ui.breadcrumbs.item active
            active-class="gap-x-1.5 text-background font-semibold px-1.5 py-px rounded-full bg-foreground">
            <x-ui.icon name="ph--link-simple-horizontal" class="flex size-4" />
            Current Page
        </x-ui.breadcrumbs.item>
    </x-ui.breadcrumbs>

</div>
