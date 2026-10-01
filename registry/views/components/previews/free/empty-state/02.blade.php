<div class="px-4 py-6 md:px-6 mx-auto max-w-5xl">
    <div class="flex flex-col items-center text-center rounded-ui border-2 border-dashed border-border px-6 py-12 sm:py-16">
        <div class="size-16 bg-card rounded-full d-flex-place-center mb-4">
            <x-ui.icon name="ph--folder-open" class="size-8 text-muted-foreground/50" />
        </div>
        <h2 class="text-foreground text-xl font-semibold">No projects yet</h2>
        <p class="text-muted-foreground text-sm mt-2 max-w-sm">
            Get started by creating your first project. You can invite team members and collaborate in real-time.
        </p>
        <div class="flex items-center gap-3 mt-8">
            <x-ui.button size="sm">
                <x-ui.icon name="ph--plus" class="size-4 mr-1.5" />
                Create project
            </x-ui.button>
            <x-ui.button variant="outline" intent="gray" size="sm">
                <x-ui.icon name="ph--upload-simple" class="size-4 mr-1.5" />
                Import
            </x-ui.button>
        </div>
        <p class="text-xs text-muted-foreground/60 mt-4">
            Or drag and drop files here to get started
        </p>
    </div>
</div>