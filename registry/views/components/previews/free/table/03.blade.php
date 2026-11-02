@php
    $organizations = [
        [
            'id' => 1,
            'name' => 'TechCorp Solutions',
            'industry' => 'Technology',
            'contact' => 'John Smith',
            'email' => 'john@techcorp.com',
            'phone' => '+1 (555) 123-4567',
            'status' => 'active',
            'revenue' => '$2.5M',
            'employees' => 150,
            'initials' => 'TC',
            'industryIcon' => 'ph--cpu',
            'lastActivity' => '2 hours ago',
        ],
        [
            'id' => 2,
            'name' => 'Global Marketing Inc',
            'industry' => 'Marketing',
            'contact' => 'Sarah Johnson',
            'email' => 'sarah@globalmarketing.com',
            'phone' => '+1 (555) 234-5678',
            'status' => 'prospect',
            'revenue' => '$1.2M',
            'employees' => 45,
            'initials' => 'GM',
            'industryIcon' => 'ph--megaphone',
            'lastActivity' => '1 day ago',
        ],
        [
            'id' => 3,
            'name' => 'FinanceHub LLC',
            'industry' => 'Finance',
            'contact' => 'Michael Chen',
            'email' => 'michael@financehub.com',
            'phone' => '+1 (555) 345-6789',
            'status' => 'active',
            'revenue' => '$5.8M',
            'employees' => 200,
            'initials' => 'FH',
            'industryIcon' => 'ph--bank',
            'lastActivity' => '5 hours ago',
        ],
        [
            'id' => 4,
            'name' => 'Healthcare Plus',
            'industry' => 'Healthcare',
            'contact' => 'Emily Davis',
            'email' => 'emily@healthcareplus.com',
            'phone' => '+1 (555) 456-7890',
            'status' => 'churned',
            'revenue' => '$800K',
            'employees' => 25,
            'initials' => 'HP',
            'industryIcon' => 'ph--heart',
            'lastActivity' => '1 week ago',
        ],
        [
            'id' => 5,
            'name' => 'Retail Dynamics',
            'industry' => 'Retail',
            'contact' => 'Robert Wilson',
            'email' => 'robert@retaildynamics.com',
            'phone' => '+1 (555) 567-8901',
            'status' => 'active',
            'revenue' => '$3.2M',
            'employees' => 85,
            'initials' => 'RD',
            'industryIcon' => 'ph--shopping-bag',
            'lastActivity' => '3 hours ago',
        ],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <x-ui.card size="none" class="rounded-ui">
        <!-- Header with Search and Filter -->
        <div class="p-4 flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-foreground mb-1">Organizations</h2>
                <p class="text-muted-foreground text-sm">Manage your customer relationships and track organization details.</p>
            </div>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm">
                    New organization
                </x-ui.button>
            </div>
        </div>

        <x-ui.table class="text-left">
            <x-ui.table.columns
                wrapper="bg-card border-y border-input/60 [--gutter-x:--spacing(4)] [--gutter-y:--spacing(4)]">
                <x-ui.table.column class="pr-0 text-xs uppercase tracking-wider w-8">
                    <x-ui.checkbox />
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider min-w-48">
                    Organization
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Industry
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider min-w-40">
                    Contact
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Status
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Revenue
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Employees
                </x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">
                    Last Activity
                </x-ui.table.column>
                <x-ui.table.column class="w-10"></x-ui.table.column>
            </x-ui.table.columns>
            <x-ui.table.rows class="divide-y divide-border [--gutter-x:--spacing(4)] [--gutter-y:--spacing(4)]">
                @foreach ($organizations as $organization)
                    <x-ui.table.row hoverable class="group">
                        <x-ui.table.cell class="pr-0">
                            <x-ui.checkbox />
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <div class="flex items-center gap-3">
                                <x-ui.avatar-placeholder size="sm" text="{{ $organization['initials'] }}"
                                    variant="solid" intent="neutral" />
                                <div>
                                    <div class="font-medium text-foreground">{{ $organization['name'] }}</div>
                                    <div class="text-xs text-muted-foreground">{{ $organization['email'] }}</div>
                                </div>
                            </div>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <div class="flex items-center gap-2">
                                <x-ui.icon name="{{ $organization['industryIcon'] }}" size="sm"
                                    class="text-muted-foreground" />
                                <span class="text-sm text-foreground">{{ $organization['industry'] }}</span>
                            </div>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <div>
                                <div class="text-sm font-medium text-foreground">{{ $organization['contact'] }}</div>
                                <div class="text-xs text-muted-foreground">{{ $organization['phone'] }}</div>
                            </div>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            @if ($organization['status'] === 'active')
                                <span
                                    class="ui-soft ui-soft-success inline-flex items-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium">
                                    <span class="size-2 rounded-full bg-success"></span>
                                    Active
                                </span>
                            @elseif($organization['status'] === 'prospect')
                                <span
                                    class="ui-soft ui-soft-warning inline-flex items-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium">
                                    <span class="size-2 rounded-full bg-warning"></span>
                                    Prospect
                                </span>
                            @else
                                <span
                                    class="ui-soft ui-soft-destructive inline-flex items-center gap-x-1 rounded-md px-2 py-1 text-xs font-medium">
                                    <span class="size-2 rounded-full bg-danger"></span>
                                    Churned
                                </span>
                            @endif
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-sm font-semibold text-foreground">{{ $organization['revenue'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-sm text-foreground">{{ $organization['employees'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <span class="text-xs text-muted-foreground">{{ $organization['lastActivity'] }}</span>
                        </x-ui.table.cell>
                        <x-ui.table.cell>
                            <x-ui.button size="sm" variant="ghost" icon-only>
                                <x-ui.icon name="ph--dots-three-vertical" />
                            </x-ui.button>
                        </x-ui.table.cell>
                    </x-ui.table.row>
                @endforeach
            </x-ui.table.rows>
        </x-ui.table>

        <div class="p-4 flex items-center md:justify-between border-t border-border">
            <div class="text-sm text-muted-foreground">
                Showing 1 to {{ count($organizations) }} of {{ count($organizations) }} organizations
            </div>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Go prev"
                    class="border border-input" disabled>
                    <x-ui.icon name="ph--caret-left" />
                </x-ui.button>
                <x-ui.button size="sm" variant="ghost" icon-only aria-label="Go next"
                    class="border border-input">
                    <x-ui.icon name="ph--caret-right" />
                </x-ui.button>
            </div>
        </div>
    </x-ui.card>
</div>
