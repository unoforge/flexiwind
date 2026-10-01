@php
    $products = [
        ['name' => 'Pro Plan Annual', 'revenue' => '$12,450', 'sales' => 43, 'trend' => 'up'],
        ['name' => 'Team Bundle', 'revenue' => '$8,910', 'sales' => 90, 'trend' => 'up'],
        ['name' => 'Pro Plan Monthly', 'revenue' => '$4,350', 'sales' => 150, 'trend' => 'up'],
        ['name' => 'Starter Plan', 'revenue' => '$2,160', 'sales' => 240, 'trend' => 'down'],
        ['name' => 'Enterprise Add-on', 'revenue' => '$1,800', 'sales' => 6, 'trend' => 'up'],
    ];
@endphp

<div class="w-full max-w-sm mx-auto px-4 py-10">
    <x-ui.card>
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-semibold text-foreground">Top Products</h3>
            <x-ui.button size="xs" variant="outline">View All</x-ui.button>
        </div>
        <div class="divide-y divide-border-input">
            @foreach ($products as $product)
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
