@php
    $users = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
        ],
        [
            'id' => 2,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
        ],
        [
            'id' => 3,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
        ],
        [
            'id' => 4,
            'name' => 'John Doe',
            'title' => 'Admin',
            'email' => 'johndow@gmail.com',
        ],
    ];
@endphp

<x-ui.table>
    <x-ui.table.columns>
        <x-ui.table.column>
            ID
        </x-ui.table.column>
        <x-ui.table.column>
            Name
        </x-ui.table.column>
        <x-ui.table.column>
            Title
        </x-ui.table.column>
        <x-ui.table.column>
            Email
        </x-ui.table.column>
    </x-ui.table.columns>
    <x-ui.table.rows striped>
        @foreach ($users as $user)
            <x-ui.table.row>
                <x-ui.table.cell white-space="nowrap">
                    {{ $user['id'] }}
                </x-ui.table.cell>
                <x-ui.table.cell>
                    {{ $user['name'] }}
                </x-ui.table.cell>
                <x-ui.table.cell>
                    {{ $user['title'] }}
                </x-ui.table.cell>
                <x-ui.table.cell>
                    {{ $user['email'] }}
                </x-ui.table.cell>
            </x-ui.table.row>
        @endforeach
    </x-ui.table.rows>
</x-ui.table>
