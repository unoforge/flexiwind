<x-ui.file-trigger name="invoice" accept=".pdf,application/pdf" max-size="10MB" class="w-full max-w-sm">
    <div class="flex items-center gap-3">
        <x-ui.button variant="outline" size="sm" class="gap-2"><x-ui.icon name="ph--upload-simple" /> Upload file</x-ui.button>
        <span class="text-xs text-muted-foreground">PDF, up to 10 MB</span>
    </div>
</x-ui.file-trigger>
