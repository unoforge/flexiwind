@php
    $users = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
            'avatar' => '/defaultavatar.webp',
        ],
        [
            'id' => 2,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
            'avatar' => '/defaultavatar.webp',
        ],
        [
            'id' => 3,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
            'avatar' => '/defaultavatar.webp',
        ],
        [
            'id' => 4,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
            'avatar' => '/defaultavatar.webp',
        ],
    ];
@endphp

<x-ui.table noDivider wrapper="rounded-lg border border-border-strong/70 p-1">
    <x-ui.table.columns header-bg-style="gray" class="*:first:rounded-l-md *:last:rounded-r-md">
        <x-ui.table.column>
            <x-ui.checkbox />
        </x-ui.table.column>
        <x-ui.table.column>
            Name
        </x-ui.table.column>
        <x-ui.table.column>
            Title
        </x-ui.table.column>
        <x-ui.table.column />
    </x-ui.table.columns>
    <x-ui.table.rows>
        @foreach ($users as $user)
            <x-ui.table.row>
                <x-ui.table.cell class="w-7">
                    <x-ui.checkbox />
                </x-ui.table.cell>
                <x-ui.table.cell>
                    <div class="flex items-center gap-2">
                        <x-ui.avatar size="lg" src="{{ $user['avatar'] }}" alt="avatar for {{ $user['name'] }}"
                            width="300" height="300" />
                        <div class="flex-1 flex flex-col">
                            <span class="font-semibold text-fg-title">
                                {{ $user['name'] }}
                            </span>
                            <span class="text-xs text-fg-muted mt-px">
                                {{ $user['email'] }}
                            </span>
                        </div>
                    </div>
                </x-ui.table.cell>
                <x-ui.table.cell class="font-medium">
                    {{ $user['title'] }}
                </x-ui.table.cell>
                <x-ui.table.cell class="w-9">
                    <x-ui.button size="sm" iconOnly variant="outline" intent="gray">
                        <span aria-hidden="true" class="flex iconify ph--dots-three-vertical"></span>
                    </x-ui.button>
                </x-ui.table.cell>
            </x-ui.table.row>
        @endforeach
    </x-ui.table.rows>
</x-ui.table>
