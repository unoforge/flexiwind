<x-ui.card size="none" class="rounded-ui">
    <div class="p-4 border-b border-border">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold text-foreground">Notifications</h3>
            <x-ui.badge variant="soft" intent="primary" size="sm">3 new</x-ui.badge>
        </div>
    </div>
    <div class="divide-y divide-border">
        <div class="flex items-start gap-3 p-4 hover:bg-muted/30 transition-colors">
            <div class="size-9 bg-primary/10 text-primary rounded-lg d-flex-place-center shrink-0">
                <x-ui.icon name="ph--user-check" class="size-4" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-foreground">
                    <span class="font-medium">Lisa Park</span>
                    <span class="text-muted-foreground">joined your team</span>
                </p>
                <p class="text-xs text-muted-foreground mt-0.5">3 minutes ago</p>
            </div>
            <span class="size-2 rounded-full bg-primary shrink-0 mt-1.5"></span>
        </div>
        <div class="flex items-start gap-3 p-4 hover:bg-muted/30 transition-colors">
            <div class="size-8 bg-success/10 text-success rounded-lg d-flex-place-center shrink-0">
                <x-ui.icon name="ph--check" class="size-4" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-foreground">
                    <span class="font-medium">Task completed</span>
                    <span class="text-muted-foreground">— Design review finished</span>
                </p>
                <p class="text-xs text-muted-foreground mt-0.5">12 minutes ago</p>
            </div>
        </div>
        <div class="flex items-start gap-3 p-4 hover:bg-muted/30 transition-colors">
            <div class="size-8 bg-warning/10 text-warning rounded-lg d-flex-place-center shrink-0">
                <x-ui.icon name="ph--clock" class="size-4" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-foreground">
                    <span class="font-medium">Deadline approaching</span>
                    <span class="text-muted-foreground">for Project Atlas</span>
                </p>
                <p class="text-xs text-muted-foreground mt-0.5">1 hour ago</p>
            </div>
        </div>
        <div class="flex items-start gap-3 p-4 hover:bg-muted/30 transition-colors">
            <div class="size-8 bg-accent/10 text-accent rounded-lg d-flex-place-center shrink-0">
                <x-ui.icon name="ph--chat-text" class="size-4" />
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm text-foreground">
                    <span class="font-medium">Alex Rivera</span>
                    <span class="text-muted-foreground">mentioned you in a comment</span>
                </p>
                <p class="text-xs text-muted-foreground mt-0.5">2 hours ago</p>
            </div>
        </div>
    </div>
    <div class="p-3 text-center border-t border-border">
        <x-ui.link href="#" class="text-sm font-medium">View all notifications</x-ui.link>
    </div>
</x-ui.card>