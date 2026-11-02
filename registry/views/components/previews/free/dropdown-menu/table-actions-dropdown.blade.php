<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96 gap-4 flex-wrap">
    <x-ui.dropdown.trigger variant="outline" intent="gray" size="sm" dropdownId="actions-dropdown">
        Actions
    </x-ui.dropdown.trigger>
    <x-ui.dropdown id="actions-dropdown" placement="bottom-end" class="w-56">
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--eye" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>View Details</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--pencil" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Edit</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--copy" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Duplicate</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--archive" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Archive</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#" intent="destructive">
            <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--trash" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Delete</x-ui.dropdown.label>
        </x-ui.dropdown.item>
    </x-ui.dropdown>

    <x-ui.dropdown.trigger variant="ghost" intent="gray" size="sm" iconOnly dropdownId="dots-dropdown">
        <x-ui.icon name="ph--dots-three-vertical" class="size-4" />
    </x-ui.dropdown.trigger>
    <x-ui.dropdown id="dots-dropdown" placement="bottom-start" class="w-48">
        <x-ui.dropdown.section>
            <x-ui.dropdown.item href="#">
                <x-ui.dropdown.label>
                    Mark as paid
                </x-ui.dropdown.label>
            </x-ui.dropdown.item>
            <x-ui.dropdown.item href="#">
                <x-ui.dropdown.label>
                    Send reminder
                </x-ui.dropdown.label>
            </x-ui.dropdown.item>
            <x-ui.dropdown.item href="#">
                <x-ui.dropdown.label>
                    Download PDF
                </x-ui.dropdown.label>
            </x-ui.dropdown.item>
        </x-ui.dropdown.section>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item href="#" intent="destructive">
            <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--prohibit" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Void invoice</x-ui.dropdown.label>
        </x-ui.dropdown.item>
    </x-ui.dropdown>

    <x-ui.dropdown.trigger variant="soft" size="sm" intent="primary" dropdownId="bulk-dropdown">
        Bulk Actions
    </x-ui.dropdown.trigger>
    <x-ui.dropdown id="bulk-dropdown" placement="bottom" class="w-52">
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--check" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Mark as active</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--pause" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Suspend selected</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--envelope" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Send email</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item href="#" intent="destructive">
            <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--trash" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Delete selected</x-ui.dropdown.label>
        </x-ui.dropdown.item>
    </x-ui.dropdown>
</div>
