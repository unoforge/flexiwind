<div class="w-full flex flex-col gap-2">
    <x-ui.alert>
        <h3 class="font-semibold text-fg-title">
            Alert with title : default
        </h3>
        <p>
            You can add components to your app using our CLI.
        </p>
    </x-ui.alert>
    <x-ui.alert class="flex items-start gap-x-4">
        <div class="w-max">
            <span aria-hidden="true" class="flex iconify ph--info text-xl"></span>
        </div>
        <div class="flex-1">
            <h3 class="font-semibold text-fg-title">
                Alert with title & Icon
            </h3>
            <p>
                You can add components to your app using our CLI.
            </p>
        </div>
    </x-ui.alert>
    <x-ui.alert class="p-4 flex items-start gap-x-4">
        <span aria-hidden="true" class="flex iconify ph--info text-xl"></span>
        <div class="flex-1 flex flex-col">
            <h3 class="font-semibold text-fg-title">
                Alert with title & Icon : default Reverse
            </h3>
            <p>
                You can add components to your app using our CLI.
            </p>
        </div>
    </x-ui.alert>
</div>
