<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96">
    <x-ui.slideover.trigger slideover-id="settings-panel" variant="outline" intent="gray">
        <x-ui.icon name="ph--gear" class="size-4 mr-1.5" />
        Open Settings
    </x-ui.slideover.trigger>

    <x-ui.slideover id="settings-panel" position="right" size="lg">
        <x-ui.slideover.content class="border-l border-border">
            <x-ui.slideover.header title="Workspace Settings" description="Configure your workspace preferences and team permissions." />
            <x-ui.slideover.body class="space-y-6 border-y border-border">
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-foreground uppercase tracking-wider">General</h4>
                    <x-ui.input type="text" label="Workspace Name" placeholder="Acme Corp" />
                    <x-ui.textarea label="Description" placeholder="A short description of your workspace..." rows="3" />
                    <x-ui.select label="Default Language">
                        <x-ui.select.option value="en" label="English" selected />
                        <x-ui.select.option value="fr" label="French" />
                        <x-ui.select.option value="de" label="German" />
                        <x-ui.select.option value="es" label="Spanish" />
                    </x-ui.select>
                </div>
                <x-ui.divider class="before:bg-muted" />
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-foreground uppercase tracking-wider">Notifications</h4>
                    <div class="space-y-3">
                        <x-ui.switch id="settings-email" label="Email notifications" checked />
                        <x-ui.switch id="settings-push" label="Push notifications" checked />
                        <x-ui.switch id="settings-slack" label="Slack integration" />
                    </div>
                </div>
            </x-ui.slideover.body>
            <x-ui.slideover.footer justify="end" class="gap-3">
                <x-ui.slideover.close size="md" variant="outline" intent="gray">Cancel</x-ui.slideover.close>
                <x-ui.button size="md">Save Changes</x-ui.button>
            </x-ui.slideover.footer>
        </x-ui.slideover.content>
    </x-ui.slideover>
</div>