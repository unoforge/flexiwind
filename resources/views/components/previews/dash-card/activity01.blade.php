<x-ui.card size="none" class="rounded-ui">
    <div class="flex items-center justify-between p-4 pb-4">
        <h4 class="text-lg font-semibold">Recent Activity</h4>
        <button class="btn btn-icon-sm btn-ghost btn-ghost-gray rounded-md">
            <span aria-hidden="true" class="iconify ph--dots-three-vertical"></span>
        </button>
    </div>
    <div class="px-6 pb-6 space-y-4">
        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-bg-bg-subtle/50 transition-colors">
            <div class="size-8 rounded-full overflow-hidden">
                <img src="/defaultavatar.webp" alt="Sarah Chen" class="w-full h-full object-cover" />
            </div>
            <div class="flex-1 space-y-1">
                <div class="flex items-center space-x-2">
                    <span aria-hidden="true" class="iconify ph--chat-dots text-sm text-primary"></span>
                    <p class="text-sm">
                        <span class="font-medium text-fg">Sarah Chen</span>
                        <span class="text-fg-muted ml-1">commented on your post</span>
                    </p>
                </div>
                <p class="text-sm text-fg-muted bg-bg-subtle p-2 rounded border-l-2 border-primary">
                    Great insights on the latest design trends! Really helpful
                    for our upcoming project.
                </p>
                <p class="text-xs text-fg-muted">2 minutes ago</p>
            </div>
        </div>

        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-bg-subtle/50 transition-colors">
            <div class="size-8 rounded-full overflow-hidden">
                <img src="/defaultavatar.webp" alt="Sarah Chen" class="w-full h-full object-cover" />
            </div>
            <div class="flex-1 space-y-1">
                <div class="flex items-center space-x-2">
                    <span aria-hidden="true" class="iconify ph--user text-sm text-primary"></span>
                    <p class="text-sm">
                        <span class="font-medium text-fg">Mike Johnson</span>
                        <span class="text-fg-muted ml-1">liked your article</span>
                    </p>
                </div>
                <p class="text-sm text-fg-muted bg-bg-subtle p-2 rounded border-l-2 border-primary">
                    Building Modern Dashboard Components
                </p>
                <p class="text-xs text-fg-muted">15 minutes ago</p>
            </div>
        </div>

        <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-bg-subtle/50 transition-colors">
            <div class="size-8 rounded-full overflow-hidden">
                <img src="/defaultavatar.webp" alt="Sarah Chen" class="w-full h-full object-cover" />
            </div>
            <div class="flex-1 space-y-1">
                <div class="flex items-center space-x-2">
                    <span aria-hidden="true" class="iconify ph--share text-sm text-primary"></span>
                    <p class="text-sm">
                        <span class="font-medium text-fg">Emma Wilson</span>
                        <span class="text-fg-muted ml-1">shared your post</span>
                    </p>
                </div>
                <p class="text-sm text-fg-muted bg-bg-subtle p-2 rounded border-l-2 border-primary">
                    UI/UX Best Practices for 2024
                </p>
                <p class="text-xs text-fg-muted">1 hour ago</p>
            </div>
        </div>
    </div>
</x-ui.card>
