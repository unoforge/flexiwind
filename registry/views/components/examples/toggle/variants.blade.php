<div class="flex flex-col gap-4">
    @foreach (['ghost', 'outline', 'primary'] as $variant)
        <div class="flex items-center gap-3">
            <span class="w-16 text-xs text-muted-foreground">{{ ucfirst($variant) }}</span>
            <x-ui.toggle :variant="$variant" icon-only size="sm" aria-label="Bold, small"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only pressed aria-label="Bold"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only size="lg" aria-label="Bold, large"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
            <x-ui.toggle :variant="$variant" icon-only disabled aria-label="Bold, disabled"><x-ui.icon name="ph--text-b" /></x-ui.toggle>
        </div>
    @endforeach
</div>
