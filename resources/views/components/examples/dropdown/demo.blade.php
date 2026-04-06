<x-ui.dropdown.trigger variant="outline" intent="gray" size="sm" iconOnly dropdownId="dealDropdown-1">
    <span class="iconify ph--dots-three-vertical text-sm"></span>
</x-ui.dropdown.trigger>

<x-ui.dropdown class="w-46 font-medium" id="dealDropdown-1">
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <span aria-hidden="true" class="iconify ph--eye"></span>
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label>
            View deal
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <span aria-hidden="true" class="iconify ph--eyedropper"></span>
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Convert to Opportunity
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item>
        <x-ui.dropdown.icon>
            <span aria-hidden="true" class="iconify ph--archive"></span>
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Archive lead
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
    <x-ui.dropdown.item intent="danger">
        <x-ui.dropdown.icon class="text-current">
            <span aria-hidden="true" class="iconify ph--trash"></span>
        </x-ui.dropdown.icon>
        <x-ui.dropdown.label class="truncate">
            Delete
        </x-ui.dropdown.label>
    </x-ui.dropdown.item>
</x-ui.dropdown>