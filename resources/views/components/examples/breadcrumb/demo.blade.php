<div class="space-y-6 w-full flex flex-col items-center">
    <x-ui.breadcrumb>
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
    <x-ui.breadcrumb>
        <x-ui.breadcrumb.item href="#" text="Home"/>
        <x-ui.breadcrumb.item href="#" text="Navigation"/>
        <x-ui.breadcrumb.item active-class="text-primary font-semibold" text=" Current Page" active/>
    </x-ui.breadcrumb>
</div>
