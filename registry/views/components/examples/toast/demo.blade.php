<div class="flex flex-wrap items-center justify-center gap-2">
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast('Draft saved')">Message</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast.success('Invoice sent', { description: 'Acme will be reminded in 7 days.' })">Success</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast.error('Payment failed', { description: 'The card was declined.' })">Error</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast.warning('Storage almost full', { description: '92% of 10 GB used.' })">Warning</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast.info('New version available', { description: 'Reload to get 2.4.' })">Info</x-ui.button>
</div>
