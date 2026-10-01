@php
    $statuses = [
        'todo' => ['Todo', 'background-color: var(--color-muted-foreground)'],
        'progress' => ['In progress', 'background-color: var(--color-warning)'],
        'review' => ['In review', 'background-color: var(--color-info)'],
        'done' => ['Done', 'background-color: var(--color-success)'],
    ];
@endphp

<x-ui.listbox name="status" value="progress" class="max-w-60">
    <x-ui.label>Status</x-ui.label>

    <x-ui.listbox.trigger size="sm">
        <x-ui.listbox.value placeholder="Set a status">
            <span class="flex items-center gap-2">
                <span class="size-2 shrink-0 rounded-full" data-bind-style="dot"></span>
                <span data-bind="label"></span>
            </span>
        </x-ui.listbox.value>
    </x-ui.listbox.trigger>

    <x-ui.listbox.content>
        <x-ui.listbox.list>
            @foreach ($statuses as $value => [$label, $dot])
                <x-ui.listbox.item :value="$value" :data-dot="$dot">
                    <x-ui.listbox.avatar size="xs" class="size-2! bg-transparent" :style="$dot" />
                    <x-ui.listbox.label>{{ $label }}</x-ui.listbox.label>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox.list>
    </x-ui.listbox.content>
</x-ui.listbox>
