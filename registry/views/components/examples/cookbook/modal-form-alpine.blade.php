<div x-data="{ open: false, saved: false }" class="flex flex-col items-center gap-4">
    <x-ui.button variant="outline" intent="gray" x-on:click="open = true; saved = false">
        Open Alpine form
    </x-ui.button>

    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-80 flex items-center justify-center bg-gray-800/60 p-4 backdrop-blur-xs"
        role="dialog"
        aria-modal="true"
        aria-labelledby="cookbook-alpine-title"
    >
        <div
            x-on:click.outside="open = false"
            class="w-full max-w-lg rounded-ui border border-border bg-background shadow-sm"
        >
            <div class="border-b border-border p-6">
                <h2 id="cookbook-alpine-title" class="text-lg font-semibold text-title-foreground ">
                    Quick note
                </h2>
                <p class="mt-1 text-sm text-muted-foreground">
                    Alpine works well for small local UI state that does not need the server.
                </p>
            </div>

            <form x-on:submit.prevent="saved = true; setTimeout(() => open = false, 700)">
                <div class="grid gap-5 p-6">
                    <div class="grid gap-2">
                        <x-ui.label for="alpine-note-title">Title</x-ui.label>
                        <x-ui.input id="alpine-note-title" placeholder="Follow up with client" />
                    </div>

                    <div class="grid gap-2">
                        <x-ui.label for="alpine-note-body">Note</x-ui.label>
                        <x-ui.textarea id="alpine-note-body" placeholder="Add context for the next action" />
                    </div>

                    <p x-show="saved" class="rounded-ui border border-success-200 bg-success-50 px-3 py-2 text-sm text-success-700">
                        Saved locally. Closing modal...
                    </p>
                </div>

                <div class="flex justify-end gap-3 border-t border-border p-6">
                    <x-ui.button type="button" variant="outline" intent="gray" x-on:click="open = false">
                        Cancel
                    </x-ui.button>
                    <x-ui.button type="submit">
                        Save note
                    </x-ui.button>
                </div>
            </form>
        </div>
    </div>
</div>
