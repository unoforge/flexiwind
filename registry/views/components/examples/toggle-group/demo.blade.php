<div x-data="{ marks: ['bold'], align: 'left' }" class="flex flex-col items-center gap-4">
    <div role="toolbar" aria-label="Text formatting" class="flex items-center gap-2">
        <x-ui.toggle-group type="multiple" label="Text style" x-model="marks">
            <x-ui.toggle-group.item value="bold" aria-label="Bold"><x-ui.icon name="ph--text-b" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="italic" aria-label="Italic"><x-ui.icon name="ph--text-italic" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="underline" aria-label="Underline"><x-ui.icon name="ph--text-underline" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="strike" aria-label="Strikethrough"><x-ui.icon name="ph--text-strikethrough" /></x-ui.toggle-group.item>
        </x-ui.toggle-group>
        <x-ui.toggle-group label="Alignment" required x-model="align">
            <x-ui.toggle-group.item value="left" aria-label="Align left"><x-ui.icon name="ph--text-align-left" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="center" aria-label="Align center"><x-ui.icon name="ph--text-align-center" /></x-ui.toggle-group.item>
            <x-ui.toggle-group.item value="right" aria-label="Align right"><x-ui.icon name="ph--text-align-right" /></x-ui.toggle-group.item>
        </x-ui.toggle-group>
    </div>
    <p class="w-72 rounded-ui border border-dashed border-border-strong bg-background px-3.5 py-3 text-title-foreground"
        :style="{ fontWeight: marks.includes('bold') ? 650 : 400, fontStyle: marks.includes('italic') ? 'italic' : 'normal', textDecoration: [marks.includes('underline') && 'underline', marks.includes('strike') && 'line-through'].filter(Boolean).join(' ') || 'none', textAlign: align }">
        Ship components, not configuration.
    </p>
</div>
