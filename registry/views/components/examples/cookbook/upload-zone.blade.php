{{--
    Déposer ou parcourir, puis une ligne par fichier. Un fichier refusé dit
    pourquoi et quoi faire. Avec wire:model à la place de `name`, chaque
    fichier montre sa progression d'envoi, et Livewire valide à nouveau
    (`mimes:pdf,png,jpg`, `max:10240`).
--}}
<form x-on:submit.prevent class="mx-auto flex w-full max-w-md flex-col gap-4">
    <x-ui.dropzone name="attachments" label="Attachments" multiple accept=".pdf,.png,.jpg,.jpeg" max-size="10MB" :max-files="5"
        hint="PDF, PNG or JPG · up to 10 MB each"
        :texts="[
            'type' => 'Only PDF, PNG or JPG. Export it to one of these first.',
            'size' => 'Over :max. Compress it or share a link instead.',
            'count' => 'Five files at most. Remove one to add another.',
        ]" />

    <div class="flex items-center justify-between gap-3">
        <p class="text-xs text-muted-foreground">Files are checked before they leave your browser.</p>
        <x-ui.button type="submit" size="sm">Upload</x-ui.button>
    </div>
</form>
