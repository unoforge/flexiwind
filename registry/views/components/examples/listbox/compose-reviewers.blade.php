@php
    $reviewers = [
        ['id' => 'brenda', 'name' => 'Brenda Stone', 'role' => 'Product designer', 'initials' => 'BS', 'badge' => 'background-color:#fecdd3;color:#881337'],
        ['id' => 'david', 'name' => 'David Kim', 'role' => 'Frontend engineer', 'initials' => 'DK', 'badge' => 'background-color:#ddd6fe;color:#4c1d95'],
        ['id' => 'sarah', 'name' => 'Sarah Chen', 'role' => 'Documentation lead', 'initials' => 'SC', 'badge' => 'background-color:#bae6fd;color:#155e75'],
        ['id' => 'tom', 'name' => 'Tom Rivera', 'role' => 'Backend engineer', 'initials' => 'TR', 'badge' => 'background-color:#fed7aa;color:#7c2d12'],
    ];
@endphp

<x-ui.listbox name="reviewers" :value="['brenda', 'sarah']" multiple class="max-w-xs">
    <x-ui.label>Reviewers</x-ui.label>

    <x-ui.listbox.trigger>
        <span class="flex-1 truncate text-muted-foreground">Assign reviewers</span>
    </x-ui.listbox.trigger>

    <div class="flex flex-wrap items-center gap-1.5">
        <x-ui.listbox.value mode="chips" class="contents">
            <span class="inline-flex h-7 items-center gap-1.5 rounded-full bg-muted ps-1 pe-1 text-[13px] text-foreground">
                <span class="inline-flex size-5 items-center justify-center rounded-full text-[9px] font-semibold" data-bind-style="badge" data-bind="initials"></span>
                <span data-bind="label"></span>
                <button type="button" data-select-remove class="flex size-5 items-center justify-center rounded-full text-muted-foreground hover:bg-background hover:text-foreground">
                    <span aria-hidden="true" class="iconify ph--x-bold size-3"></span>
                </button>
            </span>
            <x-slot:placeholder class="text-sm">No reviewer selected</x-slot:placeholder>
        </x-ui.listbox.value>
        <x-ui.listbox.clear class="ms-1" />
    </div>

    <x-ui.listbox.content>
        <x-ui.listbox.search placeholder="Filter reviewers" />
        <x-ui.listbox.list>
            @foreach ($reviewers as $reviewer)
                <x-ui.listbox.item :value="$reviewer['id']" :data-initials="$reviewer['initials']" :data-badge="$reviewer['badge']">
                    <x-ui.listbox.avatar size="lg" :style="$reviewer['badge']">{{ $reviewer['initials'] }}</x-ui.listbox.avatar>
                    <x-ui.listbox.label>{{ $reviewer['name'] }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $reviewer['role'] }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
        <x-ui.listbox.empty>No reviewer found for “<x-ui.listbox.query />”</x-ui.listbox.empty>
    </x-ui.listbox.content>
</x-ui.listbox>
