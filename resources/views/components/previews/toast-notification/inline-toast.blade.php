<div class="w-full max-w-2xl mx-auto px-4 py-10 space-y-4">
    <x-ui.callout type="update">
        <x-ui.callout.title text="Project published successfully" />
        <x-ui.callout.description>All team members have been notified.</x-ui.callout.description>
    </x-ui.callout>

    <x-ui.callout variant="subtle" type="important">
        <x-ui.callout.title text="Deployment failed" />
        <x-ui.callout.description>
            <span>The build process encountered an error. Check the logs for details.</span>
            <div class="flex gap-2 mt-3">
                <x-ui.button size="sm" intent="destructive">View logs</x-ui.button>
                <x-ui.button size="sm" variant="outline" intent="gray">Retry</x-ui.button>
            </div>
        </x-ui.callout.description>
    </x-ui.callout>

    <x-ui.callout type="warning">
        <x-ui.callout.title text="SSL certificate expiring" />
        <x-ui.callout.description>Your SSL certificate will expire in 14 days. Renew now to avoid disruption.</x-ui.callout.description>
    </x-ui.callout>

    <x-ui.callout type="note">
        <x-ui.callout.title text="New update available" />
        <x-ui.callout.description>Version 3.2.0 includes performance improvements and bug fixes.</x-ui.callout.description>
    </x-ui.callout>
</div>