<div class="flex flex-col items-center gap-4">
    <x-ui.modal.trigger
        modal-id="cookbook-delete-project"
        variant="outline"
        intent="danger"
    >
        Delete project
    </x-ui.modal.trigger>

    <x-ui.modal id="cookbook-delete-project" class="items-center justify-center">
        <x-ui.modal.content size="sm" :closable="false" class="p-(--gutter) text-center">
            <div class="mx-auto flex size-11 items-center justify-center rounded-full ui-soft ui-soft-destructive">
                <span class="iconify ph--warning text-xl"></span>
            </div>

            <x-ui.modal.title class="mt-4">
                Delete this project?
            </x-ui.modal.title>

            <x-ui.modal.description class="mt-2">
                This action cannot be undone. All project data and activity history will be removed.
            </x-ui.modal.description>

            <div class="mt-6 flex justify-center gap-3">
                <x-ui.modal.close variant="outline" intent="gray">
                    Cancel
                </x-ui.modal.close>
                <x-ui.button intent="danger" wire:click="deleteProject">
                    Delete project
                </x-ui.button>
            </div>
        </x-ui.modal.content>
    </x-ui.modal>
</div>
