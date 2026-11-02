<div class="max-w-3xl w-full p-4 mx-auto">
    <div class="bg-background rounded-lg shadow border border-border-strong/70 p-5 sm:p-8 lg:p-10">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-title-foreground ">Account Settings</h2>
            <p class="text-muted-foreground text-sm mt-1">
                Manage your account preferences and notification settings.
            </p>
        </div>
        <form class="space-y-8">
            <div class="space-y-4">
                <h3 class="font-medium text-title-foreground  border-b border-border pb-2">
                    Profile Information
                </h3>
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="flex flex-col space-y-2">
                        <x-ui.label for="name">Display Name</x-ui.label>
                        <x-ui.input id="name" value="John Doe" />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <x-ui.label for="username">Username</x-ui.label>
                        <x-ui.input id="username" value="johndoe" />
                    </div>
                </div>
                <div class="flex flex-col space-y-2">
                    <x-ui.label for="bio">Bio</x-ui.label>
                    <x-ui.textarea id="bio" placeholder="Tell us about yourself..."></x-ui.textarea>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="space-y-4">
                <h3 class="font-medium text-title-foreground  border-b border-border pb-2">
                    Notification Preferences
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-ui.label for="email_notif">Email Notifications</x-ui.label>
                            <p class="text-xs text-muted-foreground">
                                Receive email updates about your account
                            </p>
                        </div>
                        <x-ui.switch outlined size="sm" id="email_notif" name="email_notif"
                            class="text-primary [--knob-bg:var(--color-white)] bg-muted/60" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <x-ui.label for="push_notification">Push Notifications</x-ui.label>
                            <p class="text-xs text-muted-foreground">
                                Receive push notifications on your device
                            </p>
                        </div>
                        <x-ui.switch outlined size="sm" id="push_notification" name="push_notification"
                            class="text-primary [--knob-bg:var(--color-white)] bg-muted/60" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <x-ui.label for="marketing_email">Marketing Emails</x-ui.label>
                            <p class="text-xs text-muted-foreground">
                                Receive promotional emails and updates
                            </p>
                        </div>
                        <x-ui.switch outlined size="sm" id="marketing_email" name="marketing_email"
                            class="text-primary [--knob-bg:var(--color-white)] bg-muted/60" />
                    </div>
                </div>
            </div>

            <!-- Privacy Settings -->
            <div class="space-y-4">
                <h3 class="font-medium text-title-foreground  border-b border-border pb-2">
                    Privacy Settings
                </h3>
                <div class="space-y-4">
                    <div class="flex flex-col space-y-2">
                        <label class="text-sm text-foreground">Profile Visibility</label>
                        <x-ui.select class="max-w-xs">
                            <option>Public</option>
                            <option>Friends Only</option>
                            <option>Private</option>
                        </x-ui.select>
                    </div>
                    <div class="flex items-center">
                        <x-ui.checkbox id="allow_search" label="Allow search engines to index my profile" checked />
                    </div>
                    <div class="flex items-center">
                        <x-ui.checkbox id="show_presence" label="Show my online status to other users" />
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-2.5 pt-6 border-t border-border">
                <x-ui.button type="button" variant="outline">
                    Cancel
                </x-ui.button>
                <x-ui.button type="submit">
                    Save Changes
                </x-ui.button>
            </div>
        </form>
    </div>
</div>