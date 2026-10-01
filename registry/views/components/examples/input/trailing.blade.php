<form class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="email" placeholder="johndoe" class="pe-9 px-3" />
        <x-ui.input.trailing absolute class="text-foreground">
            <x-ui.icon name="ph--at" class="flex size-4" />
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="24" class="pe-11 px-3" />
        <x-ui.input.trailing absolute class="text-sm text-foreground">
            CDF
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="Your email here" class="pe-16 px-3" />
        <x-ui.input.trailing absolute class="text-sm text-foreground">
            @gmail.com    
        </x-ui.input.trailing>
    </x-ui.input.group>
    <x-ui.input.group>
        <x-ui.input variant="unstyled" type="text" placeholder="jackdoe" class="rounded-r-ui px-3 flex-1" />
        <x-ui.input.trailing class="px-3 text-foreground bg-muted/80 rounded-r-ui">
            <x-ui.icon name="ph--at" class="flex size-4" />
        </x-ui.input.trailing>
    </x-ui.input.group>
</form>
