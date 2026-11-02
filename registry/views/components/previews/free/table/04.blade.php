@php
    $invoices = [
        ['id' => '#INV-001', 'client' => 'Acme Corp', 'amount' => '$2,400', 'status' => 'paid', 'due' => 'Jan 15, 2026', 'initials' => 'AC'],
        ['id' => '#INV-002', 'client' => 'Globex Inc', 'amount' => '$5,800', 'status' => 'pending', 'due' => 'Feb 01, 2026', 'initials' => 'GI'],
        ['id' => '#INV-003', 'client' => 'Initech', 'amount' => '$1,200', 'status' => 'overdue', 'due' => 'Dec 20, 2025', 'initials' => 'IN'],
        ['id' => '#INV-004', 'client' => 'Umbrella Co', 'amount' => '$3,650', 'status' => 'paid', 'due' => 'Jan 10, 2026', 'initials' => 'UC'],
        ['id' => '#INV-005', 'client' => 'Stark Ind', 'amount' => '$9,200', 'status' => 'draft', 'due' => 'Feb 15, 2026', 'initials' => 'SI'],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <x-ui.card size="none" class="rounded-ui">
        <div class="p-4 flex items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-semibold text-foreground">Invoices</h2>
                <p class="text-sm text-muted-foreground">{{ count($invoices) }} total invoices</p>
            </div>
            <div class="flex items-center gap-2">
                <x-ui.button variant="outline" size="sm">
                    <x-ui.icon name="ph--download" class="size-4 mr-1.5" />
                    Export
                </x-ui.button>
                <x-ui.button size="sm">
                    <x-ui.icon name="ph--plus" class="size-4 mr-1.5" />
                    New invoice
                </x-ui.button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-t border-border bg-card">
                        <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Invoice</th>
                        <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Client</th>
                        <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Amount</th>
                        <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Status</th>
                        <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Due Date</th>
                        <th class="py-3 px-4 w-10"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @foreach ($invoices as $inv)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="py-3 px-4 text-sm font-medium text-primary">{{ $inv['id'] }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-3">
                                    <x-ui.avatar-placeholder size="sm" text="{{ $inv['initials'] }}" variant="solid" intent="neutral" />
                                    <span class="text-sm font-medium text-foreground">{{ $inv['client'] }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-sm font-semibold text-foreground">{{ $inv['amount'] }}</td>
                            <td class="py-3 px-4">
                                @php
                                    $statusClasses = [
                                        'paid' => 'ui-soft ui-soft-success text-xs font-medium px-2 py-1 rounded-md',
                                        'pending' => 'ui-soft ui-soft-warning text-xs font-medium px-2 py-1 rounded-md',
                                        'overdue' => 'ui-soft ui-soft-destructive text-xs font-medium px-2 py-1 rounded-md',
                                        'draft' => 'ui-soft ui-soft-gray text-xs font-medium px-2 py-1 rounded-md',
                                    ];
                                    $statusIcons = [
                                        'paid' => 'ph--check',
                                        'pending' => 'ph--clock',
                                        'overdue' => 'ph--warning',
                                        'draft' => 'ph--file',
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$inv['status']] }} inline-flex items-center gap-1.5">
                                    <x-ui.icon name="{{ $statusIcons[$inv['status']] }}" class="size-3" />
                                    {{ ucfirst($inv['status']) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-sm text-muted-foreground">{{ $inv['due'] }}</td>
                            <td class="py-3 px-4">
                                <x-ui.button size="xs" variant="ghost" icon-only>
                                    <x-ui.icon name="ph--dots-three-vertical" class="size-4" />
                                </x-ui.button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 flex items-center justify-between border-t border-border">
            <p class="text-sm text-muted-foreground">Showing 1 to {{ count($invoices) }} of {{ count($invoices) }} invoices</p>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm" variant="ghost" icon-only class="border border-input" disabled>
                    <x-ui.icon name="ph--caret-left" class="size-3.5" />
                </x-ui.button>
                <x-ui.button size="sm" variant="ghost" icon-only class="border border-input">
                    <x-ui.icon name="ph--caret-right" class="size-3.5" />
                </x-ui.button>
            </div>
        </div>
    </x-ui.card>
</div>