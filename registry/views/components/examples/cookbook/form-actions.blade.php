<div class="mx-auto w-full max-w-md rounded-ui border border-border bg-surface p-5">
    <div class="grid gap-2">
        <h3 class="font-medium text-title-foreground ">Profile details</h3>
        <p class="text-sm text-muted-foreground">
            Keep actions predictable and comfortable on mobile and desktop.
        </p>
    </div>

    <div class="mt-5 flex flex-col-reverse gap-3 border-t border-border pt-5 sm:flex-row sm:justify-end">
        <x-ui.button variant="outline" intent="gray" type="button">
            Cancel
        </x-ui.button>

        <x-ui.button type="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>Save changes</span>
            <span wire:loading>Saving...</span>
        </x-ui.button>
    </div>
</div>
