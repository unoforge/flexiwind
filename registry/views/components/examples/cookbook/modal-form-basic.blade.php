<div class="flex flex-col items-center gap-4">
    <x-ui.modal.trigger modal-id="cookbook-basic-modal" variant="outline" intent="gray">
        Open basic modal form
    </x-ui.modal.trigger>

    <x-ui.modal id="cookbook-basic-modal">
        <x-ui.modal.content size="lg">
            <x-ui.modal.header
                title="Invite teammate"
                description="Send an invitation to join this workspace."
            />

            <form method="POST" action="#">
                @csrf

                <x-ui.modal.body class="gap-5">
                    <div class="grid gap-2">
                        <x-ui.label for="basic-name">Name</x-ui.label>
                        <x-ui.input id="basic-name" name="name" autocomplete="name" />
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label for="basic-email">Email address</x-ui.label>
                        <x-ui.input id="basic-email" name="email" type="email" autocomplete="email" />
                        <p class="text-sm text-muted-foreground">
                            The invite link will be sent to this address.
                        </p>
                    </div>
                </x-ui.modal.body>

                <x-ui.modal.footer justify="end">
                    <x-ui.modal.close variant="outline" intent="gray">
                        Cancel
                    </x-ui.modal.close>
                    <x-ui.button type="submit">
                        Send invite
                    </x-ui.button>
                </x-ui.modal.footer>
            </form>
        </x-ui.modal.content>
    </x-ui.modal>
</div>
