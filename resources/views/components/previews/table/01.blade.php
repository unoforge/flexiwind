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
        ],
    ];
@endphp

<div class="rounded-ui border border-border">
    <div class="p-4 border-b border-border-input/60">
        <h2 class="text-xl font-semibold text-fg-title mb-1">Organizations</h2>
        <p class="text-fg-muted text-sm">Manage your customer relationships and track organization details.</p>
    </div>
    
    <x-ui.table class="text-left">
        <x-ui.table.columns
            wrapper="bg-bg-surface border-y border-border-input/60 [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider w-8">
                <x-ui.checkbox />
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Organization
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Industry
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Contact Person
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Status
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Revenue
            </x-ui.table.column>
            <x-ui.table.column class="text-xs font-medium text-fg-muted uppercase tracking-wider">
                Employees
            </x-ui.table.column>
            <x-ui.table.column class="w-10"></x-ui.table.column>
        </x-ui.table.columns>
        <x-ui.table.rows class="divide-y divide-border [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
            @foreach ($organizations as $organization)
                <x-ui.table.row hoverable class="group">
                    <x-ui.table.cell>
                        <x-ui.checkbox />
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <div>
                            <div class="text-sm font-medium text-fg-title">{{ $organization['name'] }}</div>
                            <div class="text-xs text-fg-muted">{{ $organization['email'] }}</div>
                        </div>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <span class="text-sm text-fg">{{ $organization['industry'] }}</span>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <div>
                            <div class="text-sm text-fg-title">{{ $organization['contact'] }}</div>
                            <div class="text-xs text-fg-muted">{{ $organization['phone'] }}</div>
                        </div>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        @php
                            $statusColors = [
                                'active' => 'success',
                                'prospect' => 'warning',
                                'churned' => 'danger'
                            ];
                            $statusIntent = $statusColors[$organization['status']] ?? 'neutral';
                        @endphp
                        <x-ui.badge variant="soft" intent="{{ $statusIntent }}" size="sm">
                            {{ ucfirst($organization['status']) }}
                        </x-ui.badge>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <span class="text-sm font-medium text-fg-title">{{ $organization['revenue'] }}</span>
                    </x-ui.table.cell>
                    <x-ui.table.cell>
                        <span class="text-sm text-fg">{{ $organization['employees'] }}</span>
                    </x-ui.table.cell>
                    <x-ui.table.cell class="text-right">
                        <x-ui.button size="sm" icon-only variant="ghost">
                            <span aria-hidden="true" class="iconify ph--dots-three"></span>
                        </x-ui.button>
                    </x-ui.table.cell>
                </x-ui.table.row>
            @endforeach
        </x-ui.table.rows>
    </x-ui.table>
    
    <div class="p-4 flex items-center justify-between border-t border-border">
        <div class="text-sm text-fg-muted">
            Showing <span class="font-medium text-fg-title">{{ count($organizations) }}</span> organizations
        </div>
        <div class="flex items-center gap-2">
            <x-ui.button size="sm" variant="ghost" class="border border-border pl-2" disabled>
                <span aria-hidden="true" class="iconify size-3.5 mr-1 ph--caret-left"></span>
                Previous
            </x-ui.button>
            <x-ui.button size="sm" variant="ghost" class="border border-border pr-2">
                Next
                <span aria-hidden="true" class="iconify size-3.5 ml-1 ph--caret-right"></span>
            </x-ui.button>
        </div>
    </div>
</div>
