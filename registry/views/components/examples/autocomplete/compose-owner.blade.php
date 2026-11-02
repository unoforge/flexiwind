@php
    $owners = [
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'role' => 'Product designer', 'initials' => 'BS', 'badge' => 'background-color:#fecdd3;color:#881337'],
        ['id' => 'david', 'name' => 'David Kim', 'role' => 'Frontend engineer', 'initials' => 'DK', 'badge' => 'background-color:#ddd6fe;color:#4c1d95'],
        ['id' => 'nina', 'name' => 'Nina Lopez', 'role' => 'Data analyst', 'initials' => 'NL', 'badge' => 'background-color:#bbf7d0;color:#14532d'],
    ];
@endphp

<x-ui.autocomplete name="owner" class="max-w-xs">
    <x-ui.label>Pick an owner</x-ui.label>
    <x-ui.autocomplete.input placeholder="Search owners" />

    <x-ui.listbox.value mode="single" class="flex-none">
        <span class="inline-flex items-center gap-2 rounded-lg bg-muted py-1 ps-1 pe-2.5 text-sm text-foreground">
            <span class="inline-flex size-6 items-center justify-center rounded-full text-[10px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
            <span data-bind="label"></span>
        </span>
        <x-slot:placeholder class="text-sm">No owner selected</x-slot:placeholder>
    </x-ui.listbox.value>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($owners as $owner)
                <x-ui.listbox.item :value="$owner['id']" :data-initials="$owner['initials']" :data-badge="$owner['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$owner['badge']">{{ $owner['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label class="font-medium">{{ $owner['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $owner['role'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No owner found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.autocomplete>
