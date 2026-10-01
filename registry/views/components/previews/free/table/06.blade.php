@php
    $products = [
        ['name' => 'Wireless Headphones', 'sku' => 'WH-1000', 'price' => '$349', 'stock' => 42, 'status' => 'active', 'sales' => 1289],
        ['name' => 'Smart Watch Pro', 'sku' => 'SW-PRO', 'price' => '$599', 'stock' => 18, 'status' => 'active', 'sales' => 2453],
        ['name' => 'Bluetooth Speaker', 'sku' => 'BS-200', 'price' => '$129', 'stock' => 0, 'status' => 'out-of-stock', 'sales' => 897],
        ['name' => 'USB-C Hub 7in1', 'sku' => 'UC-7IN1', 'price' => '$79', 'stock' => 156, 'status' => 'active', 'sales' => 3421],
        ['name' => 'Laptop Stand', 'sku' => 'LS-001A', 'price' => '$89', 'stock' => 5, 'status' => 'low-stock', 'sales' => 567],
        ['name' => 'Ergonomic Mouse', 'sku' => 'EM-200', 'price' => '$149', 'stock' => 0, 'status' => 'discontinued', 'sales' => 1234],
        ['name' => 'Mechanical Keyboard', 'sku' => 'MK-87', 'price' => '$199', 'stock' => 28, 'status' => 'active', 'sales' => 1876],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <x-ui.card size="none" class="rounded-ui">
        <div class="p-4 flex items-center justify-between gap-4">
            <x-ui.input.group class="flex-1 max-w-xs">
                <x-ui.input.leading absolute>
                    <x-ui.icon name="ph--magnifying-glass" class="text-muted-foreground size-4" />
                </x-ui.input.leading>
                <x-ui.input variant="unstyled" placeholder="Search products..." class="ps-10" />
            </x-ui.input.group>
            <div class="flex items-center gap-2">
                <x-ui.button size="none" variant="outline" class="gap-1.5 sm:btn-sm max-sm:btn-icon-sm">
                    <x-ui.icon name="ph--funnel" class="size-4" />
                    <span class="hidden sm:inline text-sm">Filters</span>
                </x-ui.button>
                <x-ui.button size="sm">
                    <x-ui.icon name="ph--plus" class="size-4 mr-1" />
                    Add product
                </x-ui.button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-y border-border bg-card">
                        <th class="py-3 px-4 pr-0 text-xs uppercase tracking-wider text-muted-foreground w-8"><x-ui.checkbox /></th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground min-w-40">Product</th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground hidden sm:table-cell">SKU</th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground">Price</th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground">Stock</th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground hidden md:table-cell">Status</th>
                        <th class="py-3 px-4 text-xs uppercase tracking-wider text-muted-foreground hidden lg:table-cell">Sales</th>
                        <th class="py-3 px-4 w-10"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @foreach ($products as $p)
                        <tr class="hover:bg-muted/30 transition-colors">
                            <td class="py-3 px-4 pr-0"><x-ui.checkbox /></td>
                            <td class="py-3 px-4 font-medium text-sm text-foreground">{{ $p['name'] }}</td>
                            <td class="py-3 px-4 text-sm text-muted-foreground hidden sm:table-cell">{{ $p['sku'] }}</td>
                            <td class="py-3 px-4 text-sm font-semibold text-foreground">{{ $p['price'] }}</td>
                            <td class="py-3 px-4">
                                <span class="text-sm {{ $p['stock'] === 0 ? 'text-destructive' : ($p['stock'] < 10 ? 'text-warning' : 'text-foreground') }}">
                                    {{ $p['stock'] }}
                                </span>
                            </td>
                            <td class="py-3 px-4 hidden md:table-cell">
                                @php
                                    $statuses = [
                                        'active' => ['class' => 'ui-soft ui-soft-success', 'icon' => 'ph--check'],
                                        'out-of-stock' => ['class' => 'ui-soft ui-soft-destructive', 'icon' => 'ph--x'],
                                        'low-stock' => ['class' => 'ui-soft ui-soft-warning', 'icon' => 'ph--warning'],
                                        'discontinued' => ['class' => 'ui-soft ui-soft-gray', 'icon' => 'ph--prohibit'],
                                    ];
                                    $s = $statuses[$p['status']];
                                @endphp
                                <span class="{{ $s['class'] }} text-xs font-medium px-2 py-1 rounded-md inline-flex items-center gap-1">
                                    <x-ui.icon name="{{ $s['icon'] }}" class="size-3" />
                                    {{ ucfirst(str_replace('-', ' ', $p['status'])) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-sm text-muted-foreground hidden lg:table-cell">{{ number_format($p['sales']) }}</td>
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
            <p class="text-sm text-muted-foreground">{{ count($products) }} products</p>
            <div class="flex items-center gap-2">
                <x-ui.button size="sm" variant="ghost" iconOnly class="border border-input" disabled>
                    <x-ui.icon name="ph--caret-left" class="size-3.5" />
                </x-ui.button>
                <x-ui.button size="sm" variant="ghost" iconOnly class="border border-input">
                    <x-ui.icon name="ph--caret-right" class="size-3.5" />
                </x-ui.button>
            </div>
        </div>
    </x-ui.card>
</div>