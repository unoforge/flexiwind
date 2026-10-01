<div class="max-w-7xl px-4 mx-auto w-full">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <x-ui.card size="none" class="rounded-ui p-5 border-l-4 border-l-primary">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total Revenue</p>
                    <p class="text-3xl font-bold text-foreground mt-1">$84,250</p>
                </div>
                <x-ui.icon name="ph--currency-circle-dollar" class="size-7 text-primary/60" />
            </div>
            <div class="flex items-center gap-2 mt-4 text-xs">
                <span class="flex items-center gap-0.5 text-success font-medium">
                    <x-ui.icon name="ph--trend-up" />
                    +$3,420
                </span>
                <span class="text-muted-foreground">from last month</span>
            </div>
        </x-ui.card>
        <x-ui.card size="none" class="rounded-ui p-6 border-l-4 border-l-accent">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Total Orders</p>
                    <p class="text-3xl font-bold text-foreground mt-1">1,892</p>
                </div>
                <x-ui.icon name="ph--shopping-bag" class="size-4 text-accent/60" />
            </div>
            <div class="flex items-center gap-2 mt-4 text-xs">
                <span class="flex items-center gap-0.5 text-success font-medium">
                    <x-ui.icon name="ph--trend-up" />
                    +12.5%
                </span>
                <span class="text-muted-foreground">this week</span>
            </div>
        </x-ui.card>
        <x-ui.card size="none" class="rounded-ui p-6 border-l-4 border-l-success">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Conversion</p>
                    <p class="text-3xl font-bold text-foreground mt-1">4.8%</p>
                </div>
                <x-ui.icon name="ph--target" class="size-4 text-success/60" />
            </div>
            <div class="flex items-center gap-2 mt-4 text-xs">
                <span class="flex items-center gap-0.5 text-success font-medium">
                    <x-ui.icon name="ph--trend-up" />
                    +0.8%
                </span>
                <span class="text-muted-foreground">improvement</span>
            </div>
        </x-ui.card>
        <x-ui.card size="none" class="rounded-ui p-6 border-l-4 border-l-warning">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-muted-foreground">Avg Order Value</p>
                    <p class="text-3xl font-bold text-foreground mt-1">$44.52</p>
                </div>
                <x-ui.icon name="ph--receipt" class="size-4 text-warning/60" />
            </div>
            <div class="flex items-center gap-2 mt-4 text-xs">
                <span class="flex items-center gap-0.5 text-destructive font-medium">
                    <x-ui.icon name="ph--trend-down" />
                    -2.1%
                </span>
                <span class="text-muted-foreground">decline</span>
            </div>
        </x-ui.card>
    </div>
</div>