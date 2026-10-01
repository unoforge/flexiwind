<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96 gap-3">
    <x-ui.modal.trigger modal-id="confirm-delete-modal" intent="destructive">
        <x-ui.icon name="ph--trash" class="size-4 mr-1.5" />
        Delete Project
    </x-ui.modal.trigger>
    <x-ui.modal.trigger modal-id="confirm-archive-modal" variant="outline" intent="gray">
        <x-ui.icon name="ph--archive" class="size-4 mr-1.5" />
        Archive
    </x-ui.modal.trigger>

    <x-ui.modal id="confirm-delete-modal" static-backdrop>
        <x-ui.modal.content size="sm">
            <x-ui.modal.body class="flex flex-col items-center text-center py-8">
                <div class="size-14 ui-subtle ui-subtle-destructive rounded-full d-flex-place-center mb-4">
                    <x-ui.icon name="ph--warning" size="xl"/>
                </div>
                <x-ui.modal.title class="text-foreground text-lg">Delete Project "Atlas"?</x-ui.modal.title>
                <p class="text-sm text-muted-foreground mt-2 max-w-sm">
                    This action cannot be undone. All project data, tasks, and files will be permanently removed.
                </p>
                <x-ui.input type="text" placeholder="Type DELETE to confirm" class="mt-6 w-full" />
            </x-ui.modal.body>
            <x-ui.modal.footer justify="center" class="gap-3 pb-6 border-t border-border">
                <x-ui.modal.close size="sm" variant="outline" intent="gray" class="flex-1 justify-center">
                    Cancel
                </x-ui.modal.close>
                <x-ui.button size="sm" intent="destructive" class="flex-1 justify-center">
                    <x-ui.icon name="ph--trash" class="mr-1.5"/>
                    Delete
                </x-ui.button>
            </x-ui.modal.footer>
        </x-ui.modal.content>
    </x-ui.modal>

    <x-ui.modal id="confirm-archive-modal">
        <x-ui.modal.content size="sm">
            <x-ui.modal.body class="flex flex-col py-8">
                <div class="size-14 bg-warning/10 text-warning rounded-full d-flex-place-center mb-4">
                    <x-ui.icon name="ph--archive-box" class="size-7" />
                </div>
                <x-ui.modal.title class="text-lg text-foreground">Archive this project?</x-ui.modal.title>
                <p class="text-sm text-muted-foreground mt-2 max-w-xs">
                    The project will be moved to archive. You can restore it anytime from the archive section.
                </p>
            </x-ui.modal.body>
            <x-ui.modal.footer justify="end" class="gap-3 ">
                <x-ui.modal.close size="sm" variant="outline" intent="gray">Keep active</x-ui.modal.close>
                <x-ui.button size="sm" intent="warning">
                    <x-ui.icon name="ph--archive" class="size-4 mr-1.5" />
                    Archive
                </x-ui.button>
            </x-ui.modal.footer>
        </x-ui.modal.content>
    </x-ui.modal>
</div>