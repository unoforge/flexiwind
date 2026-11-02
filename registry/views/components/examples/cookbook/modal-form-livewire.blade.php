<div class="flex flex-col items-center gap-4">
    <x-ui.modal.trigger modal-id="cookbook-livewire-modal">
        Open Livewire form
    </x-ui.modal.trigger>

    <x-ui.modal id="cookbook-livewire-modal">
        <x-ui.modal.content size="lg" static-backdrop>
            <x-ui.modal.header
                title="Create project"
                description="A Livewire-friendly structure with validation, loading state, and clear actions."
            />

            <form wire:submit="createProject">
                <x-ui.modal.body class="gap-5">
                    <div class="grid gap-2">
                        <x-ui.label for="livewire-project-name">Project name</x-ui.label>
                        <x-ui.input
                            id="livewire-project-name"
                            wire:model.blur="form.name"
                            autocomplete="off"
                            placeholder="Acme dashboard"
                        />
                        <p class="text-sm text-muted-foreground">
                            Use a name that is easy to recognize in lists and notifications.
                        </p>
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label for="livewire-project-description">Description</x-ui.label>
                        <x-ui.textarea
                            id="livewire-project-description"
                            wire:model.blur="form.description"
                            placeholder="Internal tool for customer operations"
                        />
                    </div>
                </x-ui.modal.body>

                <x-ui.modal.footer justify="end">
                    <x-ui.modal.close variant="outline" intent="gray" wire:loading.attr="disabled">
                        Cancel
                    </x-ui.modal.close>
                    <x-ui.button type="submit" wire:loading.attr="disabled">
                        <span wire:loading.remove>Create project</span>
                        <span wire:loading>Creating...</span>
                    </x-ui.button>
                </x-ui.modal.footer>
            </form>
        </x-ui.modal.content>
    </x-ui.modal>
</div>
