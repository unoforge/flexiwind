<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96">
    <x-ui.button data-modal-id="create-user-modal" data-modal-trigger>
        <x-ui.icon name="ph--plus" class="size-4 mr-1.5" />
        Create User
    </x-ui.button>

    <x-ui.modal id="create-user-modal">
        <x-ui.modal.content size="lg">
            <x-ui.modal.header title="Create User" description="Fill in the details to add a new team member." />
            <x-ui.modal.body class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-ui.field label="First Name" for="create-user-first-name">
                        <x-ui.input type="text" id="create-user-first-name" placeholder="John" />
                    </x-ui.field>
                    <x-ui.field label="Last Name" for="create-user-last-name">
                        <x-ui.input type="text" id="create-user-last-name" placeholder="Doe" />
                    </x-ui.field>
                </div>
                <x-ui.field label="Email" for="create-user-email">
                    <x-ui.input type="email" id="create-user-email" placeholder="john.doe@company.com" />
                </x-ui.field>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-ui.field label="Role" for="create-user-role">
                        <x-ui.select id="create-user-role">
                            <x-ui.select.option value="" selected disabled>Select role</x-ui.select.option>
                            <x-ui.select.option value="admin" label="Admin" />
                            <x-ui.select.option value="manager" label="Manager" />
                            <x-ui.select.option value="developer" label="Developer" />
                            <x-ui.select.option value="viewer" label="Viewer" />
                        </x-ui.select>
                    </x-ui.field>
                    <x-ui.field label="Department" for="create-user-dept">
                        <x-ui.select id="create-user-dept">
                            <x-ui.select.option value="" selected disabled>Select department</x-ui.select.option>
                            <x-ui.select.option value="engineering" label="Engineering" />
                            <x-ui.select.option value="design" label="Design" />
                            <x-ui.select.option value="marketing" label="Marketing" />
                            <x-ui.select.option value="sales" label="Sales" />
                        </x-ui.select>
                    </x-ui.field>
                </div>
                <x-ui.checkbox id="create-user-welcome" label="Send welcome email" checked />
            </x-ui.modal.body>
            <x-ui.modal.footer justify="end" class="gap-3">
                <x-ui.modal.close size="md" variant="outline" intent="gray">Cancel</x-ui.modal.close>
                <x-ui.button size="md" variant="solid" intent="primary">Create User</x-ui.button>
            </x-ui.modal.footer>
        </x-ui.modal.content>
    </x-ui.modal>
</div>