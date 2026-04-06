<div class="space-y-6 w-full flex flex-col items-center">
    <x-ui.breadcrumbs>
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
    <x-ui.breadcrumbs>
        <x-ui.breadcrumbs.item href="#" text="Home"/>
        <x-ui.breadcrumbs.item href="#" text="Navigation"/>
        <x-ui.breadcrumbs.item active-class="text-primary font-semibold" text=" Current Page" active/>
    </x-ui.breadcrumbs>
</div>
