@php
    $recentOrders = [
        ['id' => '#ORD-001', 'customer' => 'Alex Rivera', 'product' => 'Pro Plan Monthly', 'amount' => '$29.00', 'status' => 'completed', 'date' => '2 min ago'],
        ['id' => '#ORD-002', 'customer' => 'Sarah Chen', 'product' => 'Team Bundle', 'amount' => '$99.00', 'status' => 'completed', 'date' => '15 min ago'],
        ['id' => '#ORD-003', 'customer' => 'Michael Johnson', 'product' => 'Pro Plan Annual', 'amount' => '$290.00', 'status' => 'processing', 'date' => '1 hour ago'],
        ['id' => '#ORD-004', 'customer' => 'Emily Davis', 'product' => 'Starter Plan', 'amount' => '$9.00', 'status' => 'completed', 'date' => '3 hours ago'],
        ['id' => '#ORD-005', 'customer' => 'David Kim', 'product' => 'Team Bundle', 'amount' => '$99.00', 'status' => 'failed', 'date' => '5 hours ago'],
    ];

    $topProducts = [
        ['name' => 'Pro Plan Annual', 'revenue' => '$12,450', 'sales' => 43, 'trend' => 'up'],
        ['name' => 'Team Bundle', 'revenue' => '$8,910', 'sales' => 90, 'trend' => 'up'],
        ['name' => 'Pro Plan Monthly', 'revenue' => '$4,350', 'sales' => 150, 'trend' => 'up'],
        ['name' => 'Starter Plan', 'revenue' => '$2,160', 'sales' => 240, 'trend' => 'down'],
        ['name' => 'Enterprise Add-on', 'revenue' => '$1,800', 'sales' => 6, 'trend' => 'up'],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-foreground">Dashboard</h2>
        <p class="text-sm text-muted-foreground mt-0.5">Overview of your business performance.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <x-ui.card>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-muted-foreground">Total Revenue</p>
                    <p class="text-2xl font-bold text-foreground mt-1">$54,390</p>
                </div>
                <div class="size-10 rounded-ui ui-subtle ui-subtle-primary flex items-center justify-center">
                    <x-ui.icon name="ph--currency-dollar" class="text-xl text-primary" />
                </div>
            </div>
            <div class="flex items-center gap-1.5 mt-4 text-xs">
                <span class="flex items-center text-success"><x-ui.icon name="ph--trend-up" class="mr-0.5" />12.5%</span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-muted-foreground">Total Users</p>
                    <p class="text-2xl font-bold text-foreground mt-1">2,841</p>
                </div>
                <div class="size-10 rounded-ui ui-subtle ui-subtle-accent flex items-center justify-center">
                    <x-ui.icon name="ph--users" class="text-xl text-accent" />
                </div>
            </div>
            <div class="flex items-center gap-1.5 mt-4 text-xs">
                <span class="flex items-center text-success"><x-ui.icon name="ph--trend-up" class="mr-0.5" />8.2%</span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-muted-foreground">Active Orders</p>
                    <p class="text-2xl font-bold text-foreground mt-1">342</p>
                </div>
                <div class="size-10 rounded-ui ui-subtle ui-subtle-success flex items-center justify-center">
                    <x-ui.icon name="ph--shopping-cart" class="text-xl text-success" />
                </div>
            </div>
            <div class="flex items-center gap-1.5 mt-4 text-xs">
                <span class="flex items-center text-success"><x-ui.icon name="ph--trend-up" class="mr-0.5" />3.1%</span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-muted-foreground">Growth Rate</p>
                    <p class="text-2xl font-bold text-foreground mt-1">+18.7%</p>
                </div>
                <div class="size-10 rounded-ui ui-subtle ui-subtle-warning flex items-center justify-center">
                    <x-ui.icon name="ph--chart-line-up" class="text-xl text-warning" />
                </div>
            </div>
            <div class="flex items-center gap-1.5 mt-4 text-xs">
                <span class="flex items-center text-destructive"><x-ui.icon name="ph--trend-down" class="mr-0.5" />2.1%</span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
        </x-ui.card>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <x-ui.card class="lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-foreground">Revenue Overview</h3>
                <x-ui.select size="sm" class="w-28">
                    <x-ui.select.option value="7d" label="7 days" />
                    <x-ui.select.option value="30d" label="30 days" selected />
                    <x-ui.select.option value="90d" label="90 days" />
                </x-ui.select>
            </div>
            <div class="h-48 sm:h-64 rounded-ui bg-card border border-border flex items-center justify-center">
                <div class="text-center">
                    <x-ui.icon name="ph--chart-bar" class="text-4xl text-muted-foreground" />
                    <p class="text-sm text-muted-foreground mt-2">Chart area — integrate with your preferred chart library</p>
                </div>
            </div>
        </x-ui.card>

        <x-ui.card>
            <h3 class="text-sm font-semibold text-foreground mb-4">Top Products</h3>
            <div class="divide-y divide-border-input">
                @foreach ($topProducts as $product)
                    <div class="flex items-center justify-between py-3 first:pt-0 last:pb-0">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-foreground truncate">{{ $product['name'] }}</p>
                            <p class="text-xs text-muted-foreground">{{ $product['sales'] }} sales</p>
                        </div>
                        <div class="text-right ml-4">
                            <p class="text-sm font-semibold text-foreground">{{ $product['revenue'] }}</p>
                            <span class="inline-flex items-center text-xs {{ $product['trend'] === 'up' ? 'text-success' : 'text-destructive' }}">
                                <x-ui.icon name="{{ $product['trend'] === 'up' ? 'ph--trend-up' : 'ph--trend-down' }}" class="mr-0.5" />
                                {{ $product['trend'] === 'up' ? '+12%' : '-3%' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>

    <x-ui.card size="custom" class="[--card-padding:0px]">
        <div class="px-4 py-3 border-b border-border flex items-center justify-between">
            <h3 class="text-sm font-semibold text-foreground">Recent Orders</h3>
            <x-ui.button size="xs" variant="outline">View All</x-ui.button>
        </div>
        <x-ui.table class="text-left">
            <x-ui.table.columns wrapper="bg-card [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                <x-ui.table.column class="text-xs uppercase tracking-wider">Order</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">Customer</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider hidden sm:table-cell">Product</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider hidden md:table-cell">Date</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">Amount</x-ui.table.column>
                <x-ui.table.column class="text-xs uppercase tracking-wider">Status</x-ui.table.column>
            </x-ui.table.columns>
            <x-ui.table.rows class="divide-y divide-border [--gutter-x:--spacing(4)] [--gutter-y:--spacing(3)]">
                @foreach ($recentOrders as $order)
                    <x-ui.table.row>
                        <x-ui.table.cell><span class="text-sm font-medium text-foreground">{{ $order['id'] }}</span></x-ui.table.cell>
                        <x-ui.table.cell><span class="text-sm text-foreground">{{ $order['customer'] }}</span></x-ui.table.cell>
                        <x-ui.table.cell class="hidden sm:table-cell"><span class="text-sm text-muted-foreground">{{ $order['product'] }}</span></x-ui.table.cell>
                        <x-ui.table.cell class="hidden md:table-cell"><span class="text-sm text-muted-foreground">{{ $order['date'] }}</span></x-ui.table.cell>
                        <x-ui.table.cell><span class="text-sm font-medium text-foreground">{{ $order['amount'] }}</span></x-ui.table.cell>
                        <x-ui.table.cell>
                            @if ($order['status'] === 'completed')
                                <x-ui.badge variant="soft" intent="success" size="sm">Completed</x-ui.badge>
                            @elseif ($order['status'] === 'processing')
                                <x-ui.badge variant="soft" intent="warning" size="sm">Processing</x-ui.badge>
                            @else
                                <x-ui.badge variant="soft" intent="destructive" size="sm">Failed</x-ui.badge>
                            @endif
                        </x-ui.table.cell>
                    </x-ui.table.row>
                @endforeach
            </x-ui.table.rows>
        </x-ui.table>
    </x-ui.card>
</div>
