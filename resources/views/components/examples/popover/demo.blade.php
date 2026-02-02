<x-ui.popover.trigger size="sm" variant="outline" intent="gray" popover-id="filter">
    Show Popover
</x-ui.popover.trigger>
<x-ui.popover id="filter" class="w-80">
    <div class="grid gap-4">
        <div class="space-y-2">
            <h4 class="font-medium leading-none">
                Dimensions
            </h4>
            <p class="text-sm text-fg-muted">
                Set the dimensions for the layer.
            </p>
        </div>
        <div class="grid gap-2">
            <div class="grid grid-cols-3 items-center gap-4">
                <x-ui.label for="width">Width</x-ui.label>
                <x-ui.input id="width" type="text" value="100%" class="col-span-2" />
            </div>
            <div class="grid grid-cols-3 items-center gap-4">
                <x-ui.label for="maxWidth">Max. width</x-ui.label>
                <x-ui.input id="maxWidth" type="text" value="300px" class="col-span-2" />
            </div>
            <div class="grid grid-cols-3 items-center gap-4">
                <x-ui.label for="height">Height</x-ui.label>
                <x-ui.input id="height" type="text" value="25px" class="col-span-2" />
            </div>
            <div class="grid grid-cols-3 items-center gap-4">
                <x-ui.label for="maxHeight">Max. height</x-ui.label>
                <x-ui.input id="maxHeight" type="text" value="none" class="col-span-2" />
            </div>
        </div>
    </div>
</x-ui.popover>
