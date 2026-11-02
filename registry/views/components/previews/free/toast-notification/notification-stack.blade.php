<div class="w-full max-w-2xl mx-auto px-4 py-10">
    <div class="fixed top-4 right-4 w-80 space-y-2 z-100">
        <x-ui.alert variant="solid" intent="success" class="flex items-start gap-3 shadow-lg">
            <x-ui.icon name="ph--check-circle"/>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium">File uploaded</p>
                <p class="text-xs truncate">design-mockup-v3.fig</p>
            </div>
            <button type="button" class="size-5 d-flex-place-center text-muted-foreground hover:text-foreground cursor-pointer shrink-0">
                <x-ui.icon name="ph--x" class="size-3.5" />
            </button>
        </x-ui.alert>

        <x-ui.alert variant="solid" intent="destructive" class="flex items-start gap-4 shadow-sm">
             <x-ui.icon name="ph--warning"/>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium">Build failed</p>
                <p class="text-xs">main &middot; 3 minutes ago</p>
            </div>
            <button type="button" class="size-5 d-flex-place-center text-gray-300 hover:text-foreground cursor-pointer shrink-0">
                <x-ui.icon name="ph--x" class="size-3.5" />
            </button>
        </x-ui.alert>

        <x-ui.alert variant="solid" intent="primary" class="flex items-start gap-4 shadow-sm">
            <x-ui.icon name="ph--bell-ringing" class="size-5 shrink-0 mt-0.5" />
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium">New comment</p>
                <p class="text-xs truncate">Jordan mentioned you in Design Review</p>
            </div>
            <button type="button" class="size-5 d-flex-place-center text-gray-300 hover:text-foreground cursor-pointer shrink-0">
                <x-ui.icon name="ph--x" class="size-3.5" />
            </button>
        </x-ui.alert>
    </div>

    <div class="text-center pt-20">
        <span class="text-xs">Floating notification stack in top-right corner</span>
    </div>
</div>