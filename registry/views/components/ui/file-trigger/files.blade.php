{{--
    La liste des fichiers choisis : nom, taille, progression Livewire,
    refus expliqués. Les noms viennent des fichiers et sont écrits en texte.
--}}
<ul data-slot="file-list" wire:ignore x-show="files.length" x-cloak role="list" aria-live="polite"
    {{ $attributes->class(['flex flex-col gap-1.5']) }}>
    <template x-for="file in files" :key="file.id">
        <li class="[--file-row-padding:--spacing(1.5)] flex min-w-0 items-center gap-2.5 rounded-[calc(var(--radius-ui)+var(--file-row-padding))] border border-border bg-background p-(--file-row-padding) pe-1">
            <span class="relative flex size-8 shrink-0 items-center justify-center overflow-hidden rounded-ui bg-muted text-muted-foreground"
                :class="{ 'bg-destructive/10 text-destructive': file.rejected || file.status === 'error', 'bg-success/12 text-success': file.status === 'done' }">
                <template x-if="file.preview && !file.rejected">
                    <img :src="file.preview" alt="" class="absolute inset-0 size-full object-cover">
                </template>
                <span aria-hidden="true" class="flex size-4 iconify"
                    :class="file.rejected || file.status === 'error' ? 'ph--warning-circle' : (file.status === 'done' ? 'ph--check-bold' : 'ph--file')"></span>
            </span>
            <span class="flex min-w-0 grow flex-col">
                <span class="truncate text-[13.5px] font-medium text-title-foreground" x-text="file.name"></span>
                <span class="text-xs tabular-nums" :class="file.rejected || file.status === 'error' ? 'text-destructive' : 'text-muted-foreground'" x-text="meta(file)"></span>
                <span x-show="file.status === 'uploading'" class="mt-1.5 h-1 overflow-hidden rounded-full bg-muted" role="progressbar"
                    :aria-label="file.name" aria-valuemin="0" aria-valuemax="100" :aria-valuenow="file.progress">
                    <span class="block h-full rounded-full bg-primary transition-[width] duration-300" :style="`width: ${file.progress}%`"></span>
                </span>
            </span>
            <button type="button" x-on:click="remove(file)" :aria-label="removeLabel(file)"
                class="flex size-7 shrink-0 items-center justify-center rounded-[calc(var(--radius-ui)-var(--spacing)*0.5)] text-muted-foreground transition-colors hover:bg-muted hover:text-title-foreground focus-visible:outline-2 focus-visible:outline-(--ui-input-focus-outline)">
                <span aria-hidden="true" class="flex size-3.5 iconify ph--x-bold"></span>
            </button>
        </li>
    </template>
</ul>
