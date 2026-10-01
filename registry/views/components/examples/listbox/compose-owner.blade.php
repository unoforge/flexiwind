@php
    $owners = [
        ['id' => 'alice', 'name' => 'Alice Johnson', 'email' => 'alice@flexiwind.dev', 'initials' => 'AJ', 'badge' => 'background-color:#fde68a;color:#78350f'],
        ['id' => 'marc', 'name' => 'Marc Dupont', 'email' => 'marc@flexiwind.dev', 'initials' => 'MD', 'badge' => 'background-color:#bae6fd;color:#0c4a6e'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'email' => 'nina@flexiwind.dev', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
    ];
@endphp

<x-ui.listbox name="owner" class="max-w-xs">
    <div class="flex items-center justify-between">
        <x-ui.label>Owner</x-ui.label>
        <x-ui.listbox.clear>Clear</x-ui.listbox.clear>
    </div>

    <x-ui.listbox.trigger>
        <x-ui.listbox.value>
            <span class="flex min-w-0 items-center gap-2">
                <span class="inline-flex size-5 shrink-0 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
                <span class="truncate" data-bind="label"></span>
            </span>
            <x-slot:placeholder>Choose an owner</x-slot:placeholder>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Search team members" />
        <x-ui.listbox.list>
            @foreach ($owners as $owner)
                <x-ui.listbox.item :value="$owner['id']" :data-initials="$owner['initials']" :data-badge="$owner['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$owner['badge']">{{ $owner['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label class="font-medium">{{ $owner['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $owner['email'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No team member found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
