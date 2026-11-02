<div class="w-full max-w-5xl mx-auto px-4 py-10">
    <x-ui.card class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-foreground">Project Overview</h3>
            <x-ui.badge variant="soft" intent="success" size="sm" class="flex items-center">
                <span class="size-1 rounded-full bg-current mr-1 inline-flex"></span>
                Active
            </x-ui.badge>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <div class="text-3xl font-bold text-foreground">12</div>
                <p class="mb-2 text-xs text-muted-foreground mt-1">Total Tasks</p>
                <x-ui.progress max="12" value="9" class="text-primary" />
            </div>
            <div>
                <div class="text-3xl font-bold text-foreground">8</div>
                <p class="mb-2 text-xs text-muted-foreground mt-1">Completed</p>
                <x-ui.progress max="9" value="6" class="text-success" />
            </div>
            <div>
                <div class="text-3xl font-bold text-foreground">3</div>
                <p class="pb-2 text-xs text-muted-foreground mt-1">In Progress</p>
                <x-ui.progress max="10" value="2.5" class="text-primary" />
            </div>
            <div>
                <div class="text-3xl font-bold text-foreground">1</div>
                <p class="mb-2 text-xs text-muted-foreground mt-1">Overdue</p>
                <x-ui.progress max="12" value="1" class="text-destructive" />
            </div>
        </div>
        <x-ui.divider class="my-6 border-muted" />
        <div class="flex items-center justify-between text-sm">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1.5">
                    <span class="size-2.5 rounded-full bg-primary"></span>
                    <span class="text-muted-foreground">Dev</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="size-2.5 rounded-full bg-accent"></span>
                    <span class="text-muted-foreground">Design</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="size-2.5 rounded-full bg-success"></span>
                    <span class="text-muted-foreground">Done</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex -space-x-1.5">
                    <x-ui.avatar src="/avatar2.webp" alt="" size="xs" radius="full" class="ring-2 ring-background" />
                    <x-ui.avatar-placeholder text="SM" size="xs" radius="full" class="ring-2 ring-background" variant="solid" intent="neutral" />
                    <x-ui.avatar-placeholder text="JD" size="xs" radius="full" class="ring-2 ring-background" variant="solid" intent="neutral" />
                    <x-ui.avatar-placeholder text="+" size="xs" radius="full" class="ring-2 ring-background text-xs" variant="soft" intent="gray" />
                </div>
                <span class="text-muted-foreground"> Due in 5d</span>
            </div>
        </div>
    </x-ui.card>
</div>