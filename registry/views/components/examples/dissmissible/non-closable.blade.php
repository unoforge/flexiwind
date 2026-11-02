<x-ui.alert dissmissible variant="soft" :closable="false" class="flex items-start gap-x-4">
    <div class="w-max">
        <x-ui.icon name="ph--warning" />
    </div>
    <div class="flex-1 space-y-3">
        <p class="text-muted-foreground">The data export you requested is ready!</p>
        <div class="flex items-center gap-2">
            <x-ui.button href="#" size="sm" intent="neutral" aria-label="Trigger Modal Show Data">
                View the Data
            </x-ui.button>
            <x-ui.dissmissible.close size="sm" variant="soft">
                Dissmiss
            </x-ui.dissmissible.close>
        </div>
    </div>
</x-ui.alert>
