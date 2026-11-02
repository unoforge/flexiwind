<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96">
    <x-ui.dropdown.trigger variant="ghost" size="none" dropdownId="user-menu"
        class="flex items-center gap-3 p-1.5 pr-3 rounded-ui border border-border">
        <x-ui.avatar src="/avatar2.webp" alt="User" size="sm" radius="full" />
        <div class="text-left hidden sm:block">
            <p class="text-sm font-medium text-foreground leading-tight">Alex Rivera</p>
            <p class="text-xs text-muted-foreground leading-tight">alex@company.com</p>
        </div>
        <x-ui.icon name="ph--caret-down" class="text-muted-foreground size-3.5" />
    </x-ui.dropdown.trigger>
    <x-ui.dropdown id="user-menu" placement="bottom-end" class="w-56">
        <x-ui.dropdown.header>
            <div class="flex items-center gap-3">
                <x-ui.avatar src="/avatar2.webp" alt="User" size="sm" radius="full" />
                <div>
                    <p class="text-sm font-medium text-foreground">Alex Rivera</p>
                    <p class="text-xs text-muted-foreground">alex@example.com</p>
                </div>
            </div>
        </x-ui.dropdown.header>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--user" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>My Profile</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--credit-card" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Billing</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--gear" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Settings</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.separator />
        <x-ui.dropdown.item href="#">
            <x-ui.dropdown.icon><x-ui.icon name="ph--users-three" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Switch Team</x-ui.dropdown.label>
        </x-ui.dropdown.item>
        <x-ui.dropdown.item href="#" intent="destructive">
            <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--sign-out" /></x-ui.dropdown.icon>
            <x-ui.dropdown.label>Sign Out</x-ui.dropdown.label>
        </x-ui.dropdown.item>
    </x-ui.dropdown>
</div>
