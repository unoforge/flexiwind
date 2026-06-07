@php
    $users = [
        [
            'name' => 'John Doe',
            'email' => 'john.doe@company.com',
            'role' => 'Admin',
            'department' => 'Engineering',
            'status' => 'active',
            'joined' => 'Jan 15, 2026',
            'initials' => 'JD',
        ],
        [
            'name' => 'Sarah Martinez',
            'email' => 'sarah.martinez@company.com',
            'role' => 'Manager',
            'department' => 'Product',
            'status' => 'active',
            'joined' => 'Dec 20, 2025',
            'initials' => 'SM',
        ],
        [
            'name' => 'Emily Wilson',
            'email' => 'emily.wilson@company.com',
            'role' => 'Developer',
            'department' => 'Engineering',
            'status' => 'active',
            'joined' => 'Mar 10, 2025',
            'initials' => 'EW',
        ],
        [
            'name' => 'Michael Johnson',
            'email' => 'michael.j@company.com',
            'role' => 'Analyst',
            'department' => 'Analytics',
            'status' => 'pending',
            'joined' => 'Feb 01, 2025',
            'initials' => 'MJ',
        ],
        [
            'name' => 'Amanda Lee',
            'email' => 'amanda.lee@company.com',
            'role' => 'Designer',
            'department' => 'Design',
            'status' => 'inactive',
            'joined' => 'Dec 05, 2023',
            'initials' => 'AL',
        ],
        [
            'name' => 'David Chen',
            'email' => 'david.chen@company.com',
            'role' => 'Developer',
            'department' => 'Engineering',
            'status' => 'active',
            'joined' => 'May 12, 2024',
            'initials' => 'DC',
        ],
        [
            'name' => 'Lisa Rodriguez',
            'email' => 'lisa.rodriguez@company.com',
            'role' => 'Manager',
            'department' => 'Marketing',
            'status' => 'active',
            'joined' => 'Jun 08, 2024',
            'initials' => 'LR',
        ],
        [
            'name' => 'Robert Kim',
            'email' => 'robert.kim@company.com',
            'role' => 'Support',
            'department' => 'Customer Success',
            'status' => 'pending',
            'joined' => 'Jul 15, 2024',
            'initials' => 'RK',
        ],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <x-ui.card size="custom" class="[--card-padding:0px]">
        <div class="p-4 flex items-center justify-between gap-4">
            <x-ui.input.group class="flex-1 max-w-xs md:h-9">
                <x-ui.input.leading absolute>
                    <x-ui.icon name="ph--magnifying-glass" />
                </x-ui.input.leading>
                <x-ui.input variant="unstyled" placeholder="Search users..." class="ps-10" />
            </x-ui.input.group>
            <div class="flex items-center gap-2">
                <x-ui.button size="none" variant="outline" class="gap-1 sm:btn-md max-sm:btn-icon-sm">
                    <x-ui.icon size="sm" name="ph--funnel" />
                    <span class="hidden sm:inline">Filter</span>
                </x-ui.button>
                <x-ui.button size="sm" class="sm:btn-md">
                    <x-ui.icon size="xs" name="ph--plus" class="mr-1" />
                    New user
                </x-ui.button>
            </div>
        </div>

        <x-ui.table class="text-left">
            <x-ui.table.columns
                wrapper="bg-bg-surface border-y border-border-input/60 [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                <x-ui.table.column class="pr-0 text-xs uppercase tracking-wider w-8">
                    <x-ui.checkbox />
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Name
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Email
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Role
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Department
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Status
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Joined
                </x-ui.table.column>
                <x-ui.table.column class="w-10"></x-ui.table.column>
            </x-ui.table.columns>
            <x-ui.table.rows class="divide-y divide-border [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                @foreach ($users as $user)
                    <x-ui.table.row>
                        <x-ui.table.cell class="pr-0">
                            <x-ui.checkbox />
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <div class="flex items-center gap-3">
                                <x-ui.avatar-placeholder size="sm" text="{{ $user['initials'] }}" variant="solid"
                                    intent="neutral" />
                                <span class="font-medium text-fg">{{ $user['name'] }}</span>
                            </div>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-fg-muted">{{ $user['email'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-fg">{{ $user['role'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-fg-muted">{{ $user['department'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            @if ($user['status'] === 'active')
                                <x-ui.badge variant="soft" intent="success" size="sm"
                                    class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-2 rounded-full bg-current"></span>
                                    Active
                                </x-ui.badge>
                            @elseif($user['status'] === 'pending')
                                <x-ui.badge variant="soft" intent="warning" size="sm"
                                    class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-2 rounded-full bg-current"></span>
                                    Pending
                                </x-ui.badge>
                            @else
                                <x-ui.badge variant="soft" intent="danger" size="sm"
                                    class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-2 rounded-full bg-current"></span>
                                    Inactive
                                </x-ui.badge>
                            @endif
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-fg-muted text-sm">{{ $user['joined'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <x-ui.button size="xs" variant="ghost" icon-only>
                                <span aria-hidden="true" class="iconify ph--dots-three-vertical"></span>
                            </x-ui.button>
                        </x-ui.table.cell>
                    </x-ui.table.row>
                @endforeach
            </x-ui.table.rows>
        </x-ui.table>

        <div class="p-4 flex items-center md:justify-between border-t border-border">
            <div class="text-sm text-fg-muted">
                Showing 1 to {{ count($users) }} of {{ count($users) }} users
            </div>
            <div class="flex-1 md:justify-center flex">
                <x-ui.input.group class="sm:max-w-38">
                    <x-ui.input.leading class="text-xs text-fg-muted px-3 border-r border-border-input">
                        Per Page
                    </x-ui.input.leading>
                    <x-ui.select class="ps-3 pe-4" variant="unstyled" :indicator="false">
                        <x-ui.select.option value="10" selected label="10" />
                        <x-ui.select.option value="20" selected label="20" />
                        <x-ui.select.option value="50" selected label="50" />
                        <x-ui.select.option value="100" selected label="100" />
                        <x-ui.select.option value="200" selected label="200" />
                    </x-ui.select>
                    <x-ui.input.trailing absolute>
                        <span class="flex iconify ph--caret-up-down text-sm"></span>
                    </x-ui.input.trailing>
                </x-ui.input.group>
            </div>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Go prev"
                    class="border border-border-input" disabled>
                    <span aria-hidden="true" class="iconify size-3.5 ph--caret-left"></span>
                </x-ui.button>
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Go next"
                    class="border border-border-input">
                    <span aria-hidden="true" class="iconify size-3.5 ph--caret-right"></span>
                </x-ui.button>
            </div>
        </div>
    </x-ui.card>
</div>
