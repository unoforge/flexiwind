<div class="w-full flex flex-col gap-2">
    <x-ui.alert>
        <h3 class="font-semibold text-foreground">
            Alert with title : default
        </h3>
        <p>
            You can add components to your app using our CLI.
        </p>
    </x-ui.alert>
    <x-ui.alert class="flex items-start gap-x-4">
        <div class="w-max">
            <x-ui.icon name="ph--info" class="flex text-xl" />
        </div>
        <div class="flex-1">
            <h3 class="font-semibold text-foreground">
                Alert with title & Icon
            </h3>
            <p>
                You can add components to your app using our CLI.
            </p>
        </div>
    </x-ui.alert>
    <x-ui.alert class="p-4 flex items-start gap-x-4">
        <x-ui.icon name="ph--info" class="flex text-xl" />
        <div class="flex-1 flex flex-col">
            <h3 class="font-semibold text-foreground">
                Alert with title & Icon : default Reverse
            </h3>
            <p>
                You can add components to your app using our CLI.
            </p>
        </div>
    </x-ui.alert>
</div>
