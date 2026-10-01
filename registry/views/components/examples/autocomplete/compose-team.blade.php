@php
    $members = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'email' => 'alice@flexiwind.dev', 'initials' => 'AJ', 'badge' => 'background-color:#fde68a;color:#78350f'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'email' => 'marc@flexiwind.dev', 'initials' => 'MD', 'badge' => 'background-color:#bae6fd;color:#0c4a6e'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'email' => 'nina@flexiwind.dev', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'email' => 'sarah@flexiwind.dev', 'initials' => 'SC', 'badge' => 'background-color:#bae6fd;color:#155e75'],
    ];
@endphp

<x-ui.autocomplete name="assignees" :value="['alice', 'nina']" multiple class="max-w-sm">
    <div class="flex items-center justify-between">
        <x-ui.label>Assign team members</x-ui.label>
        <x-ui.listbox.clear />
    </div>
    <x-ui.autocomplete.input placeholder="Type a name or email" />

    <x-ui.listbox.value mode="chips">
        <span class="inline-flex h-7 items-center gap-1.5 rounded-full bg-muted ps-1 pe-1 text-[13px] text-foreground">
            <span class="inline-flex size-5 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
            <span data-bind="label"></span>
            <button type="button" data-select-remove class="flex size-5 items-center justify-center rounded-full text-muted-foreground hover:bg-background hover:text-foreground">
                <span aria-hidden="true" class="iconify ph--x-bold size-3"></span>
            </button>
        </span>
        <x-slot:placeholder class="text-sm">No one selected</x-slot:placeholder>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($members as $member)
                <x-ui.listbox.item :value="$member['id']" :data-initials="$member['initials']" :data-badge="$member['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$member['badge']">{{ $member['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label>{{ $member['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $member['email'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No team member found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
