<div class="flex flex-wrap items-center justify-center gap-2">
    <x-ui.button variant="outline" intent="gray" size="sm"
        x-on:click="$toast('3 files deleted', { action: { label: 'Undo', onClick: () => $toast.success('Files restored') } })">With action</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm"
        x-on:click="$toast.promise(new Promise((resolve) => setTimeout(resolve, 1600)), { loading: 'Publishing…', success: 'Published', error: 'Could not publish' })">Promise</x-ui.button>
    <x-ui.button variant="outline" intent="gray" size="sm" x-on:click="$toast.dismiss()">Dismiss all</x-ui.button>
</div>
