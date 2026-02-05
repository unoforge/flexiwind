<x-ui.callout variant="soft" type="important" radius="none" class="border-l-2 border-danger">
    <x-ui.callout.title text="There was a problem with your submission"/>
    <x-ui.callout.description>
        <p>
            Must include at least 1 number
        </p>
        <p>
            Must include at least 2 uppercase letters
        </p>
    </x-ui.callout.description>
    <div class="pt-1">
        <x-ui.button variant="outline" intent="gray" size="sm">
            <span class="iconify ph--arrows-clockwise mr-2"></span>
            Try again
        </x-ui.button>
    </div>
</x-ui.callout>