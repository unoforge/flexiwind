<div class="max-w-2xl w-full p-4 mx-auto">
    <div class="bg-background border border-border-strong/40 ring-2 ring-border rounded-lg">
        <div class="p-6 border-b border-border bg-surface">
            <h4 class="text-lg font-semibold text-title-foreground ">
                Notification Preferences
            </h4>
            <p class="text-sm text-foreground">
                Choose how you want to be notified about activity
            </p>
        </div>
        <div class="p-6 grid gap-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border border-border-strong/40 rounded-lg">
                    <div class="space-y-1">
                        <h5 class="font-medium text-title-foreground ">Email Notifications</h5>
                        <p class="text-sm text-muted-foreground">
                            Receive notifications via email
                        </p>
                    </div>
                    <x-ui.switch name="email_notif" id="email_notif"
                        class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>

                <div class="flex items-center justify-between p-4 border border-border-strong/40 rounded-lg">
                    <div class="space-y-1 flex-1">
                        <h5 class="font-medium text-title-foreground ">Push Notifications</h5>
                        <p class="text-sm text-muted-foreground">
                            Receive push notifications on your devices
                        </p>
                    </div>
                    <x-ui.switch name="email_notif" id="email_notif"
                        class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>

                <div class="flex items-center justify-between p-4 border border-border-strong/40 rounded-lg">
                    <div class="space-y-1 flex-1">
                        <h5 class="font-medium text-title-foreground ">SMS Notifications</h5>
                        <p class="text-sm text-muted-foreground">
                            Receive notifications via text message
                        </p>
                    </div>
                    <x-ui.switch name="email_notif" id="email_notif"
                        class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>

                <div class="flex items-center justify-between p-4 border border-border-strong/40 rounded-lg">
                    <div class="space-y-1 flex-1">
                        <h5 class="font-medium text-title-foreground ">Marketing Updates</h5>
                        <p class="text-sm text-muted-foreground">
                            Receive updates about new features and promotions
                        </p>
                    </div>
                    <x-ui.switch name="email_notif" id="email_notif"
                        class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t border-border col-span-full">
                <x-ui.button variant="outline" size="sm">
                    Cancel
                </x-ui.button>
                <x-ui.button size="sm">
                    Save Changes
                </x-ui.button>
            </div>
        </div>
    </div>
</div>
