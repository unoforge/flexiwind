<form class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.input unStyled type="email" placeholder="jackdoe" class="ps-9 px-3" />
        <x-ui.input.leading absolute class="text-fg text-sm">
            <span class="flex size-4 iconify ph--at"></span>
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input unStyled type="text" placeholder="24" class="ps-11 px-3" />
        <x-ui.input.leading absolute
            class="text-sm text-fg">
            CDF
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input unStyled type="text" placeholder="my-website.com" class="ps-16" />
        <x-ui.input.leading absolute
            class="text-sm text-fg">
            https://
        </x-ui.input.leading>
    </x-ui.input.group>
    <x-ui.input.group class="flex">
        <x-ui.input.leading aria-hidden="true"
            class="px-3 text-fg bg-bg-muted/80 rounded-l-ui">
            <span class="flex size-4 iconify ph--at"></span>
        </x-ui.input.leading>
        <x-ui.input unStyled type="text" placeholder="johndoe" class="rounded-r-ui px-3" />
    </x-ui.input.group>
</form>
