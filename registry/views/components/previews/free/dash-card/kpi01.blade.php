<div class="max-w-7xl px-4 mx-auto">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-ui.card>
            <div class="flex items-center">
                <div class="size-8 text-white flex items-center justify-center rounded-full bg-accent" role="img"
                    aria-label="Total Users icon">
                    <x-ui.icon name="ph--users" />
                </div>
                <h3 class="flex-1 flex text-muted-foreground ml-3">Total Users</h3>
            </div>
            <div class="py-3 flex text-center justify-center font-semibold text-3xl text-foreground">12,543</div>
            <div class="flex justify-between items-center">
                <p class="text-xs text-muted-foreground flex-1 line-clamp-1">Total registered users</p>
                <div class="size-6 text-white text-sm rounded-full flex items-center justify-center bg-success"
                    role="img" aria-label="Trend indicator">
                    <x-ui.icon name="ph--trend-up" />
                </div>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center">
                <div class="size-8 text-white flex items-center justify-center rounded-full bg-primary" role="img"
                    aria-label="New Signups icon">
                    <x-ui.icon name="ph--user-plus" />
                </div>
                <h3 class="flex-1 flex text-muted-foreground ml-3">New Signups</h3>
            </div>
            <div class="py-3 flex text-center justify-center font-semibold text-3xl text-foreground">342</div>
            <div class="flex justify-between items-center">
                <p class="text-xs text-muted-foreground flex-1 line-clamp-1">New signups this month</p>
                <div class="size-6 text-white text-sm rounded-full flex items-center justify-center bg-success"
                    role="img" aria-label="Trend indicator">
                    <x-ui.icon name="ph--trend-up" />
                </div>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center">
                <div class="size-8 text-white flex items-center justify-center rounded-full bg-success" role="img"
                    aria-label="Active Users icon">
                    <x-ui.icon name="ph--users" />
                </div>
                <h3 class="flex-1 flex text-muted-foreground ml-3">Active Users</h3>
            </div>
            <div class="py-3 flex text-center justify-center font-semibold text-3xl text-foreground">8,921</div>
            <div class="flex justify-between items-center">
                <p class="text-xs text-muted-foreground flex-1 line-clamp-1">Currently active users</p>
                <div class="size-6 text-white text-sm rounded-full flex items-center justify-center bg-success"
                    role="img" aria-label="Trend indicator">
                    <x-ui.icon name="ph--trend-up" />
                </div>
            </div>
        </x-ui.card>
        <x-ui.card>
            <div class="flex items-center">
                <div class="size-8 text-white flex items-center justify-center rounded-full bg-warning" role="img"
                    aria-label="Churn Rate icon">
                    <x-ui.icon name="ph--chart-line-down" />
                </div>
                <h3 class="flex-1 flex text-muted-foreground ml-3">Churn Rate</h3>
            </div>
            <div class="py-3 flex text-center justify-center font-semibold text-3xl text-foreground">2.3%</div>
            <div class="flex justify-between items-center">
                <p class="text-xs text-muted-foreground flex-1 line-clamp-1">Monthly churn rate</p>
                <div class="size-6 text-white text-sm rounded-full flex items-center justify-center bg-danger"
                    role="img" aria-label="Trend indicator">
                    <x-ui.icon name="ph--trend-down" />
                </div>
            </div>
        </x-ui.card>
    </div>
</div>
