<div class="w-full max-w-5xl mx-auto px-4 py-10 d-flex-place-center min-h-96">
    <x-ui.slideover.trigger slideover-id="notif-prefs" variant="outline" intent="gray">
        <x-ui.icon name="ph--bell-ringing" class="size-4 mr-1.5" />
        Notification Preferences
    </x-ui.slideover.trigger>

    <x-ui.slideover id="notif-prefs" position="right" size="md">
        <x-ui.slideover.content class="border-l border-border">
            <x-ui.slideover.header title="Notification Preferences" description="Choose what updates you want to receive." />
            <x-ui.slideover.body class="space-y-1 border-y border-border divide-y divide-border">
                <div class="flex items-center justify-between py-4 first:pt-0">
                    <div>
                        <p class="text-sm font-medium text-foreground">Mentions</p>
                        <p class="text-xs text-muted-foreground">When someone mentions you</p>
                    </div>
                    <x-ui.switch id="pref-mentions" size="sm" bg="default" track="title" knob="bg" checked />
                </div>
                <div class="flex items-center justify-between py-4">
                    <div>
                        <p class="text-sm font-medium text-foreground">Comments</p>
                        <p class="text-xs text-muted-foreground">Replies to your comments</p>
                    </div>
                    <x-ui.switch id="pref-comments" size="sm" bg="default" track="title" knob="bg" checked />
                </div>
                <div class="flex items-center justify-between py-4">
                    <div>
                        <p class="text-sm font-medium text-foreground">Task updates</p>
                        <p class="text-xs text-muted-foreground">Status changes on assigned tasks</p>
                    </div>
                    <x-ui.switch id="pref-tasks" size="sm" bg="default" track="title" knob="bg" checked />
                </div>
                <div class="flex items-center justify-between py-4">
                    <div>
                        <p class="text-sm font-medium text-foreground">Weekly digest</p>
                        <p class="text-xs text-muted-foreground">Summary of weekly activity</p>
                    </div>
                    <x-ui.switch id="pref-digest" size="sm" bg="default" track="title" knob="bg" />
                </div>
                <div class="flex items-center justify-between py-4">
                    <div>
                        <p class="text-sm font-medium text-foreground">Marketing emails</p>
                        <p class="text-xs text-muted-foreground">Product updates and offers</p>
                    </div>
                    <x-ui.switch id="pref-marketing" size="sm" bg="default" track="title" knob="bg" />
                </div>
            </x-ui.slideover.body>
            <x-ui.slideover.footer justify="end" class="gap-3">
                <x-ui.slideover.close size="md" variant="outline" intent="gray">Reset</x-ui.slideover.close>
                <x-ui.button size="md">Save Preferences</x-ui.button>
            </x-ui.slideover.footer>
        </x-ui.slideover.content>
    </x-ui.slideover>
</div>