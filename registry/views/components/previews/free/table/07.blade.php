@php
    $users = [
        ['name' => 'Alex Rivera', 'email' => 'alex@company.com', 'role' => 'Admin', 'status' => 'active', 'joined' => 'Jan 15, 2024', 'avatar' => '/avatar2.webp'],
        ['name' => 'Sarah Chen', 'email' => 'sarah@company.com', 'role' => 'Developer', 'status' => 'active', 'joined' => 'Mar 22, 2024', 'avatar' => ''],
        ['name' => 'Michael Johnson', 'email' => 'michael@company.com', 'role' => 'Designer', 'status' => 'active', 'joined' => 'Apr 10, 2024', 'avatar' => ''],
        ['name' => 'Emily Davis', 'email' => 'emily@company.com', 'role' => 'Manager', 'status' => 'pending', 'joined' => 'Jun 05, 2024', 'avatar' => ''],
        ['name' => 'David Kim', 'email' => 'david@company.com', 'role' => 'Developer', 'status' => 'inactive', 'joined' => 'Aug 18, 2023', 'avatar' => ''],
        ['name' => 'Lisa Martinez', 'email' => 'lisa@company.com', 'role' => 'Developer', 'status' => 'active', 'joined' => 'Sep 01, 2024', 'avatar' => ''],
        ['name' => 'James Wilson', 'email' => 'james@company.com', 'role' => 'Support', 'status' => 'pending', 'joined' => 'Oct 12, 2024', 'avatar' => ''],
        ['name' => 'Anna Thompson', 'email' => 'anna@company.com', 'role' => 'Admin', 'status' => 'active', 'joined' => 'Nov 30, 2023', 'avatar' => ''],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <x-ui.card size="custom" class="[--card-padding:0px]">
        <div class="p-4 flex items-center justify-between gap-4 border-b border-border">
            <x-ui.input.group class="flex-1 max-w-xs md:h-9">
                <x-ui.input.leading absolute>
                    <x-ui.icon name="ph--magnifying-glass" />
                </x-ui.input.leading>
                <x-ui.input variant="unstyled" placeholder="Search users..." class="ps-10" />
            </x-ui.input.group>
            <div class="flex items-center gap-2">
                <x-ui.button size="none" variant="outline" class="gap-1 sm:btn-sm">
                    <x-ui.icon size="sm" name="ph--funnel" />
                    <span class="hidden sm:inline">Filter</span>
                </x-ui.button>
                <x-ui.select size="sm" class="w-32">
                    <x-ui.select.option value="all" label="All Roles" selected />
                    <x-ui.select.option value="admin" label="Admin" />
                    <x-ui.select.option value="developer" label="Developer" />
                    <x-ui.select.option value="designer" label="Designer" />
                    <x-ui.select.option value="manager" label="Manager" />
                </x-ui.select>
            </div>
        </div>

        <x-ui.table class="text-left">
            <x-ui.table.columns wrapper="bg-card [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                <x-ui.table.column class="pr-0 text-xs uppercase tracking-wider w-8">
                    <x-ui.checkbox id="select-all" />
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">User</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider hidden sm:table-cell">Role</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider hidden md:table-cell">Status</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider hidden lg:table-cell">Joined</x-ui.table.column>
                <x-ui.table.column class="w-10"></x-ui.table.column>
            </x-ui.table.columns>
            <x-ui.table.rows class="divide-y divide-border [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                @foreach ($users as $user)
                    <x-ui.table.row>
                        <x-ui.table.cell class="pr-0">
                            <x-ui.checkbox id="select-{{ $loop->index }}" />
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <div class="flex items-center gap-3">
                                @if ($user['avatar'])
                                    <x-ui.avatar size="sm" radius="full" src="{{ $user['avatar'] }}" alt="" />
                                @else
                                    <x-ui.avatar-placeholder size="sm" radius="full" text="{{ substr($user['name'], 0, 2) }}" variant="solid" intent="neutral" />
                                @endif
                                <div>
                                    <p class="font-medium text-foreground text-sm">{{ $user['name'] }}</p>
                                    <p class="text-xs text-muted-foreground">{{ $user['email'] }}</p>
                                </div>
                            </div>
                        </x-ui.table.cell>
                        <x-ui.table.cell class="hidden sm:table-cell">
                            <span class="text-foreground text-sm">{{ $user['role'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell class="hidden md:table-cell">
                            @if ($user['status'] === 'active')
                                <x-ui.badge variant="soft" intent="success" size="sm" class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-1.5 rounded-full bg-current"></span>
                                    Active
                                </x-ui.badge>
                            @elseif($user['status'] === 'pending')
                                <x-ui.badge variant="soft" intent="warning" size="sm" class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-1.5 rounded-full bg-current"></span>
                                    Pending
                                </x-ui.badge>
                            @else
                                <x-ui.badge variant="soft" intent="destructive" size="sm" class="inline-flex items-center gap-x-1 font-medium">
                                    <span class="size-1.5 rounded-full bg-current"></span>
                                    Inactive
                                </x-ui.badge>
                            @endif
                        </x-ui.table.cell>
                        <x-ui.table.cell class="hidden lg:table-cell">
                            <span class="text-muted-foreground text-sm">{{ $user['joined'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <x-ui.dropdown.trigger variant="ghost" size="xs" icon-only dropdown-id="actions-{{ $loop->index }}">
                                <x-ui.icon name="ph--dots-three-vertical" />
                            </x-ui.dropdown.trigger>
                            <x-ui.dropdown id="actions-{{ $loop->index }}" placement="bottom-end" class="w-40">
                                <x-ui.dropdown.item href="#">
                                    <x-ui.dropdown.icon><x-ui.icon name="ph--pencil" /></x-ui.dropdown.icon>
                                    <x-ui.dropdown.label>Edit</x-ui.dropdown.label>
                                </x-ui.dropdown.item>
                                <x-ui.dropdown.item href="#">
                                    <x-ui.dropdown.icon><x-ui.icon name="ph--prohibit" /></x-ui.dropdown.icon>
                                    <x-ui.dropdown.label>Suspend</x-ui.dropdown.label>
                                </x-ui.dropdown.item>
                                <x-ui.dropdown.separator />
                                <x-ui.dropdown.item href="#" intent="destructive">
                                    <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--trash" /></x-ui.dropdown.icon>
                                    <x-ui.dropdown.label>Delete</x-ui.dropdown.label>
                                </x-ui.dropdown.item>
                            </x-ui.dropdown>
                        </x-ui.table.cell>
                    </x-ui.table.row>
                @endforeach
            </x-ui.table.rows>
        </x-ui.table>

        <div class="p-4 flex items-center justify-between border-t border-border">
            <span class="text-sm text-muted-foreground">Showing 1 to {{ count($users) }} of {{ count($users) }} users</span>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Previous" class="border border-input" disabled>
                    <x-ui.icon name="ph--caret-left" class="size-3.5" />
                </x-ui.button>
                <x-ui.button size="sm" variant="solid" intent="neutral" class="min-w-8">1</x-ui.button>
                <x-ui.button size="sm" variant="ghost" class="min-w-8 border border-input">2</x-ui.button>
                <x-ui.button size="sm" variant="ghost" class="min-w-8 border border-input">3</x-ui.button>
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Next" class="border border-input">
                    <x-ui.icon name="ph--caret-right" class="size-3.5" />
                </x-ui.button>
            </div>
        </div>
    </x-ui.card>
</div>
