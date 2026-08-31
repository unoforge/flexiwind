<x-ui.dropdown.trigger variant="outline" intent="gray" size="sm" iconOnly dropdownId="dealDropdown-1">
    <x-ui.icon name="ph--dots-three-vertical" class="text-sm" />
</x-ui.dropdown.trigger>

<x-ui.dropdown class="w-46 font-medium" id="dealDropdown-1">
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <x-ui.icon name="ph--eye" />
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label>
            View deal
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <x-ui.icon name="ph--eyedropper" />
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Convert to Opportunity
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <x-ui.icon name="ph--archive" />
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Archive lead
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item intent="destructive">
        <x-ui.dropdown.icon class="text-current">
            <x-ui.icon name="ph--trash" />
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Delete
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
</x-ui.dropdown>