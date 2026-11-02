<x-ui.command-menu shortcut="mod+j">
    <x-slot:trigger>
        <x-ui.command-menu.trigger placeholder="Search or run a command…" />
    </x-slot:trigger>

    <x-ui.command-menu.group heading="Suggestions">
        <x-ui.command-menu.item href="/docs/introduction" icon="ph--book-open" keywords="documentation guide">Search docs</x-ui.command-menu.item>
        <x-ui.command-menu.item icon="ph--folder-plus" shortcut="mod+n" x-on:click="$toast.success('Project created')">Create project</x-ui.command-menu.item>
        <x-ui.command-menu.item icon="ph--user-plus" shortcut="mod+i" x-on:click="$toast('Invitation sent')">Invite member</x-ui.command-menu.item>
    </x-ui.command-menu.group>

    <x-ui.command-menu.group heading="Components">
        <x-ui.command-menu.item href="/components/listbox" icon="ph--caret-up-down" keywords="select">Listbox</x-ui.command-menu.item>
        <x-ui.command-menu.item href="/components/autocomplete" icon="ph--text-aa" keywords="combobox search">Autocomplete</x-ui.command-menu.item>
        <x-ui.command-menu.item href="/components/toast" icon="ph--chat-centered-text" keywords="notification">Toast</x-ui.command-menu.item>
    </x-ui.command-menu.group>

    <x-ui.command-menu.group heading="Settings">
        <x-ui.command-menu.item page="theme" icon="ph--palette" keywords="dark light appearance">Change theme…</x-ui.command-menu.item>
        <x-ui.command-menu.item href="/account/tokens" icon="ph--key">API tokens</x-ui.command-menu.item>
    </x-ui.command-menu.group>

    <x-ui.command-menu.page name="theme" label="Theme">
        <x-ui.command-menu.group>
            <x-ui.command-menu.item icon="ph--sun" x-on:click="$toast('Light theme')">Light</x-ui.command-menu.item>
            <x-ui.command-menu.item icon="ph--moon" x-on:click="$toast('Dark theme')">Dark</x-ui.command-menu.item>
            <x-ui.command-menu.item icon="ph--monitor" x-on:click="$toast('System theme')">System</x-ui.command-menu.item>
        </x-ui.command-menu.group>
    </x-ui.command-menu.page>
</x-ui.command-menu>
